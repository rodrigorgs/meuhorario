<?php

# expressao regular pra achar debugs nao comentados (no vim):
# ^[^/]*DEBUG

require_once('curso.php');
require_once('tabela.php');
require_once('materia.php');
require_once('turma.php');
require_once('config.php');

require_once('util.php');
require_once('mixpanel.php');

cabecalho("Hor&aacute;rios", false);

class GeraHorarios {
	var $curso;
	var $tabela;
	var $mostraConflito;
	var $carrascos;

	var $horariosGerados = 0;
	var $materiasSelecionadas = 0;

	function GeraHorarios() {
		global $voltar;
		global $MENSAGEM_SEM_RESULTADOS;
		
		if (!key_exists('curso', $_REQUEST)) {
			echo 'Erro: nenhum curso foi fornecido $voltar';
            rodape();
			exit(1);
		}
		
		if (key_exists('mostraConflito', $_REQUEST))
			$this->mostraConflito = True;
		else
			$this->mostraConflito = False;

		$this->curso = new Curso();
		$this->curso->processaMatricula($_REQUEST['curso']);

		// echo "<h1>" . $this->curso->nome . "</h1>\n";

		$this->selecionaMateriasETurmas();
		$this->adicionaEletivas();
		
		$this->restricoesDeDocente();
		$this->restricoesDeHorario();

		$this->removeMateriasSemTurmas();
		
		if (count($this->curso->listaDeMaterias) == 0) {
			echo $MENSAGEM_SEM_RESULTADOS;
            rodape();
			exit(0);
		}
	}
		
	function adicionaEletivas() {
		$qtd = 5;

		for ($i = 0; $i < $qtd; $i++) {
			if (key_exists("elt$i", $_REQUEST)) {
				$codigo = strtoupper(trim($_REQUEST["elt$i"]));
					if ($codigo != "") {
					if (key_exists("apelt$i", $_REQUEST) && trim($_REQUEST["apelt$i"]) != "")
						$apelido = $_REQUEST["apelt$i"];
					else
						$apelido = $codigo;
					$unidade = $_REQUEST["und$i"];
					$ret =& $this->curso->processaEletiva($unidade, $codigo);

					if (!is_null($ret)) {
						$ret->apelido = $apelido;
					}
					else {
						echo "A mat&eacute;ria eletiva/optativa $apelido " .
						"n&atilde;o foi encontrada na unidade especificada " .
						"e ser&aacute; ignorada. Por favor, verifique " . 
						"o c&oacute;digo e a unidade.<br/>\n";
					}
				}
			}
		}
	}

	function removeMateriasSemTurmas() {
		foreach ($this->curso->listaDeMaterias as $i => $materia) {
			if (count($materia->listaDeTurmas) == 0)
				unset ($this->curso->listaDeMaterias[$i]);
		}
	}

	function selecionaMateriasETurmas() {
		global $MAX_MATERIAS_SELECIONADAS;
		// retira todas as materias que nao foram selecionadas pelo usuario
		foreach ($this->curso->listaDeMaterias as $i => $materia) {
			// retira materia
			if (!key_exists($materia->codigo, $_REQUEST) ||
					$_REQUEST[$materia->codigo] != 'on') {
				unset($this->curso->listaDeMaterias[$i]);
			}
			else {
				$this->materiasSelecionadas++;
				if ($this->materiasSelecionadas > $MAX_MATERIAS_SELECIONADAS) {
					echo "Foram selecionadas muitas mat&eacute;rias. ";
					echo "Escolha no m&aacute;ximo ".
							$MAX_MATERIAS_SELECIONADAS.
							" mat&eacute;rias.";
					rodape();
					exit(0);
				}
				else {
					// pega o apelido
					if ($_REQUEST['ap' . $materia->codigo]) {
						$this->curso->listaDeMaterias[$i]->apelido = 
								$_REQUEST['ap' . $materia->codigo];
					}
					// assume codigo como apelido
					else {
						$this->curso->listaDeMaterias[$i]->apelido = 
								$materia->codigo;
					}
				}
			}

			// agora, vamos selecionar as turmas
			foreach ($materia->listaDeTurmas as $j => $turma) {
				if (!key_exists($materia->codigo . '-' . 
						$turma->codigo, $_REQUEST) ||
						$_REQUEST[$materia->codigo . '-' . 
						$turma->codigo] != 'on') {
					unset($this->curso->listaDeMaterias[$i]->listaDeTurmas[$j]);
				}
			}
		}

	}
	

	/*
	 * carrascos eh uma array de arrays. Cada elemento de carrascos
	 * representa um docente, e cada docente eh representado
	 * por uma array contendo seus nomes.
	 */
	function processaListaDeCarrascos() {
		$textarea = $_REQUEST['carrascos'];
		if (trim($textarea) == "")
			$this->carrascos == null;
		else {
			$this->carrascos = array();
			
			$nomes = explode("\n", $textarea);

			foreach ($nomes as $k => $v) {
				$this->carrascos[] = explode(" ", $v);
				// elimina espacos
				$this->carrascos = trim_array($this->carrascos);
			}
		}

		// DEBUG
		/*
		foreach ($this->carrascos as $i => $docente) {
			foreach ($docente as $j => $parte)
				echo "[$parte]";
			echo "<br/>";
		}
		*/
	}

	/*
	 * Elimina as turmas em que aparece um docente carrasco
	 */
	function restricoesDeDocente() {
		$this->processaListaDeCarrascos();
		$ehCarrasco = False;
		
		foreach ($this->curso->listaDeMaterias as $i => $materia) {
			foreach ($materia->listaDeTurmas as $j => $turma) {
				// echo "DEBUG: $materia->apelido -> ". count($materia->listaDeTurmas) . "<br/>\n";
				foreach ($turma->listaDeAulas as $k => $aula) {
					foreach ($aula->listaDeDocentes as $l => $docente) {
						if ($this->docenteEhCarrasco($docente)) {
							unset($this->curso->listaDeMaterias[$i]->listaDeTurmas[$j]);
							$ehCarrasco = True;
							echo "A turma $turma->codigo da mat&eacute;ria $materia->apelido foi ignorada " .
									"pois tem $docente como professor(a).<br/>\n";
							break;
						}
					}
					if ($ehCarrasco)
						break;
				}
				if ($ehCarrasco) {
					$ehCarrasco = False;
					if (count($this->curso->listaDeMaterias[$i]->listaDeTurmas) == 0) {
						unset($this->curso->listaDeMaterias[$i]);
						echo "N&atilde;o sobrou nenhuma turma na mat&eacute;ria $materia->apelido.<br/>\n";
					}
				}
			}
		}
	}

	function docenteEhCarrasco($docente) {
		$ehCarrasco = True;

		if ($this->carrascos == null)
			return False;

		foreach ($this->carrascos as $i => $carr) {
			$nomeCasa = True;
			foreach ($carr as $j => $parte) {
				if ($parte != "" && !@stristr($docente, $parte)) {
					$nomeCasa = False;
					break;
				}				
			}
			if ($nomeCasa) {
				// echo "DEBUG: $docente eh carrasco!<br/>\n";
				return true;
			}
		}

		return false;
	}

	/*
	 * Elimina as turmas em que existe uma aula em horario que o aluno
	 * nao pode pegar
	 */
	function restricoesDeHorario() {
		$naoPodePegar = False;
		
		foreach ($this->curso->listaDeMaterias as $i => $materia) {
			foreach ($materia->listaDeTurmas as $j => $turma) {
				foreach ($turma->listaDeAulas as $k => $aula) {
					for ($hora = $aula->horaini; $hora < $aula->horafim; $hora++) {
						if (key_exists($aula->dia . $hora, $_REQUEST) &&
								$_REQUEST[$aula->dia . $hora] == "on") {
							unset($this->curso->listaDeMaterias[$i]->listaDeTurmas[$j]);
							$naoPodePegar = True;
							echo "A turma $turma->codigo da mat&eacute;ria $materia->apelido foi ignorada " .
									"pois possui aula $aula->dia &agrave;s ${hora}h.<br/>\n";
							break;
						}
					}
					if ($naoPodePegar)
						break;
				}
				if ($naoPodePegar) {
					$naoPodePegar = False;					
					if (count($this->curso->listaDeMaterias[$i]->listaDeTurmas) == 0) {
						unset($this->curso->listaDeMaterias[$i]);
						echo "N&atilde;o sobrou nenhuma turma na mat&eacute;ria $materia->apelido.<br/>\n";
					}
				}
			}
		}
	}

	function gera2($listaDeMaterias) {
		$materia = $listaDeMaterias[0];

		// echo "DEBUG: nivel recursivo<br/>\n";

		foreach ($materia->listaDeTurmas as $i => $turma) {
			$this->tabela->insereTurma($turma);

			if (count($listaDeMaterias) == 1) {
				if ($this->restricoesSatisfeitas(0))
					$this->exibeTabela();
			}
			else
				$this->gera2(array_slice($listaDeMaterias, 1));
			
			$this->tabela->retiraTurma($turma);
		}
	}
	
	function gera() {
		$this->tabela = new Tabela();
		if (key_exists('impressao', $_REQUEST) && $_REQUEST['impressao'] === 'on')
			$this->tabela->colorida = false;
		else
			$this->tabela->colorida = true;

		$this->gera2(array_slice($this->curso->listaDeMaterias, 0));
	}

	function geraSubconjunto($min) {
		$this->tabela = new Tabela();
		if (key_exists('impressao', $_REQUEST) && $_REQUEST['impressao'] === 'on')
			$this->tabela->colorida = false;
		else
			$this->tabela->colorida = true;

		$this->geraSubconjunto2(array_slice($this->curso->listaDeMaterias, 0), $min);
	}
	
	function geraSubconjunto2($listaDeMaterias, $min) {
		$materia = $listaDeMaterias[0];

		foreach ($materia->listaDeTurmas as $i => $turma) {
			$this->tabela->insereTurma($turma);

			if (count($listaDeMaterias) == 1) {
				if ($this->restricoesSatisfeitas($min))
					$this->exibeTabela();
			}
			else
				$this->geraSubconjunto2(array_slice($listaDeMaterias, 1), $min);
			
			$this->tabela->retiraTurma($turma);
			
			if (count($listaDeMaterias) == 1) {
				if ($this->restricoesSatisfeitas($min))
					$this->exibeTabela();
			}
			else
				$this->geraSubconjunto2(array_slice($listaDeMaterias, 1), $min);
		}
	}

	function restricoesSatisfeitas($min) {
		global $MAX_HORARIOS_GERADOS;
		return (($this->mostraConflito || !$this->tabela->conflito) &&
			$this->tabela->qtdDeTurmas() >= $min) &&
			$this->horariosGerados < $MAX_HORARIOS_GERADOS;
	}

	function exibeTabela() {
		$id = 'horario' . $this->horariosGerados;
		echo '<tt><span class="alterna" onclick="javascript: alterna(\'' . 
				$id . '\', this);">[-]' . "</span></tt>" .
				" Op&ccedil;&atilde;o " . ($this->horariosGerados + 1) . "\n";
		echo "<div class=\"arvore\" id=\"$id\">\n";
		$this->tabela->exibeHTML();
		echo "<br/>\n";
		echo "</div>\n";
		echo "<br/>\n";
		
		$this->horariosGerados++;
	}
}

global $MAX_HORARIOS_GERADOS;
global $MENSAGEM_SEM_RESULTADOS;

$g = new GeraHorarios();
if (key_exists('subconjuntos', $_REQUEST) && $_REQUEST['subconjuntos'] == 'on')
	$g->geraSubconjunto((int)$_REQUEST['minimoTurmas']); 
else
	$g->gera();

if ($g->horariosGerados == 0) {
	echo $MENSAGEM_SEM_RESULTADOS;
}
else if ($g->horariosGerados >= $MAX_HORARIOS_GERADOS) {
	echo "(Apenas os primeiros " . $g->horariosGerados . " hor&aacute;rios ";
	echo "foram mostrados)";
}

/*
foreach ($_REQUEST as $k => $v)
	echo "$k = $v<br/>\n";
*/

track_gerou_horario($_REQUEST, $g->curso);
rodape();

?>
