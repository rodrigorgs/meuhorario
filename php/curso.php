<?php

require_once('materia.php');
require_once('turma.php');
require_once('aula.php');

class Curso {
	var $nome;
	var $semestre;
	var $listaDeMaterias;

	var $REGEX_CURSO;
	var $REGEX_LINHA;
	var $REGEX_LINHA_UNIDADE;

	// Significado: $destino tem $origem como pre-requisito
	function insereDependencia(&$origem, &$destino) {
		$destino->listaDePreRequisitos[] =& $origem;
		$origem->listaDeAdjacencias[] =& $destino;
	}

	function &getMateria($codigo) {
		$ret = NULL;
		foreach ($this->listaDeMaterias as $i => $materia) {
			if ($materia->codigo === $codigo) {
				$ret =& $this->listaDeMaterias[$i];
				break;
			}
		}
		return $ret;
	}

	function &createMateria($codigo, $nome = '') {
		$codigo = trim($codigo);
		$ret =& $this->getMateria($codigo);
		if (is_null($ret)) {
			$ret =& new Materia();
			$ret->codigo = $codigo;
			$ret->nome = $nome;
			$this->listaDeMaterias[] =& $ret;
		}
		return $ret;
	}

	function processaGrade($cursoCod) {
		$file = fopen("teste/$cursoCod", 'r');
		if (!$file) {
			echo "Erro lendo $cursoCod\n";
			exit;
		}

		while (!feof ($file)) {
			$line = trim(fgets($file, 100));
			$materia =& $this->createMateria($line);
			if ($line == "")
				echo "!!DEBUG!!";
			
			$line = trim(fgets($file, 100));
			$materia->nome = $line;
			
			$line = trim(fgets($file, 100));
			$materia->cargaHoraria = (int)$line;
			
			$line = trim(fgets($file, 100));
			$materia->creditos = (int)$line;
			
			$line = trim(fgets($file, 100));
			$materia->tipo = $line;
			
			$line = fgets($file, 100);
			$lista = $this->listaDeCodigos($line);
			if (count($lista) > 0) {
				foreach ($lista as $i => $cod) {
					$this->insereDependencia(
							$this->createMateria($cod),
							$this->createMateria($materia->codigo));
				}
			}
			
			$line = fgets($file, 100);
		}

		fclose($file);
	}

	function listaDeCodigos($str) {
		if (trim($str) != '-') {
			$ret = preg_split('/[ -]+/', $str);
//            if ($ret === "")
//                return trim($str);
//            else
				return $ret;
		}
		else
			return array();
	}

	function Curso() {
		$this->REGEX_LINHA = '/<tr><td><FONT SIZE=2>(.*?)'.  // materia (1)
				'<td><FONT SIZE=2>(.*?)'. // turma (2)
				'<td><FONT SIZE=2>(.*?)'. // vagas (3)
				'<td><FONT SIZE=2>(.*?)'. // dia da semana (4)
				'<td><FONT SIZE=2>(.*?)'. // horario (5)
				'<td><FONT SIZE=2>(.*)$/'; // docente (6)
		$this->REGEX_LINHA_UNIDADE = '/<tr><td><FONT SIZE=2>(.*?)'.  // materia (1)
				'<td><FONT SIZE=2>(.*?)'. // turma (2)
				'<td><FONT SIZE=2>(.*?)'. // coelgiado (3)
				'<td><FONT SIZE=2>(.*?)'. // vagas (4)
				'<td><FONT SIZE=2>(.*?)'. // dia da semana (5)
				'<td><FONT SIZE=2>(.*?)'. // horario (6)
				'<td><FONT SIZE=2>(.*)$/'; // docente (7)
		$this->REGEX_CURSO = '/<P ALIGN="CENTER"><th ALIGN=center><FONT SIZE=4>' .
				'UNIVERSIDADE FEDERAL DA BAHIA - MATR.CULA (.*?)<br>' .
				'<FONT SIZE=4>CURSO: (.*?)<hr/';
		$this->listaDeMaterias = array();
	}

	function &processaMatricula($endereco, $materiaEscolhida = "") {
		if (!preg_match('/.../', $endereco, $matches)) {
			echo "C&oacute;digo de curso inv&aacute;lido.";
			exit(0);
		}
		$file = fopen ('guia/' . $endereco . '.html', "r");
		if (!$file) {
			echo "<p>Unable to open remote file.\n";
			exit;
		}

		// Pega nome e semestre
		$line = fgets($file, 2048);
		$line = fgets($file, 2048);
		$line = fgets($file, 2048);
		if (preg_match($this->REGEX_CURSO, $line, $matches)) {
			if ($matches[1])
				$this->semestre = $matches[1];
			if ($matches[2])
				$this->nome = $matches[2];
		}

		$lastMateria = "";
		
		while (!feof ($file)) {
			$line = fgets ($file, 2048);
			if (preg_match ($this->REGEX_LINHA, $line, $matches)) {

				// Surgiu uma nova materia
				if ($matches[1] && ($materiaEscolhida == "" || substr($matches[1], 0, 6) == $materiaEscolhida)) {
					if ($lastMateria == "")
						$lastMateria = substr($matches[1], 0, 6);
					else if ($materiaEscolhida != "")
						return $materia;
					$materia =& new Materia();
					$materia->codigo = substr($matches[1], 0, 6);
					$materia->nome = substr($matches[1], 9);
					$this->listaDeMaterias[] =& $materia;  
				}

				if ($materiaEscolhida == "" || $lastMateria == $materiaEscolhida) { 
					// Nova turma da mesma materia
					if ($matches[2]) {
						$turma =& new Turma();
						$turma->codigo = $matches[2];
						$turma->vagas = $matches[3];
						$turma->materia =& $materia; // DEBUG: debugar isso
						$materia->listaDeTurmas[] =& $turma;
					}

					// novo dia de aula
					if ($matches[4]) {
						$dia = $matches[4];

						$aula =& new Aula();
						$aula->dia = $dia;
						$turma->listaDeAulas[] =& $aula;
					}
					
					// sempre ha hora
					$aula->setHorario($matches[5]);

					// sempre ha professor
					$aula->listaDeDocentes[] = $matches[6];
				}
			} 
		}
		fclose($file);

		return NULL;
	}


	function &processaEletiva($endereco, $eletiva) {
		if (!preg_match('/.../', $endereco, $matches)) {
			echo "C&oacute;digo de curso inv&aacute;lido.";
			exit(0);
		}
		$file = fopen ('guia/' . $endereco . '.html', "r");
		if (!$file) {
			echo "<p>Unable to open remote file.\n";
			exit;
		}

		// Pega nome e semestre
		$line = fgets($file, 2048);
		$line = fgets($file, 2048);
		$line = fgets($file, 2048);
		if (preg_match($this->REGEX_CURSO, $line, $matches)) {
			if ($matches[1])
				$this->semestre = $matches[1];
			if ($matches[2])
				$this->nome = $matches[2];
		}

		$lastMateria = "";
		
		while (!feof ($file)) {
			$line = fgets ($file, 2048);
			if (preg_match ($this->REGEX_LINHA_UNIDADE, $line, $matches)) {

				// Surgiu uma nova materia
				if ($matches[1]) {
					if ($eletiva == "" || substr($matches[1], 0, 6) == $eletiva) {
						if ($lastMateria == "")
							$lastMateria = substr($matches[1], 0, 6);
						$materia =& new Materia();
						$materia->codigo = substr($matches[1], 0, 6);
						$materia->nome = substr($matches[1], 9);
						$this->listaDeMaterias[] =& $materia;
					}
					else if ($lastMateria != "")
						return $materia;
				}

				if ($eletiva == "" || $lastMateria == $eletiva) { 
					// Nova turma da mesma materia
					if ($matches[2]) {
						$turma =& new Turma();
						$turma->codigo = $matches[2];
						$turma->vagas = 0; // (int)$matches[4];
						$turma->materia =& $materia; // DEBUG: debugar isso
						$materia->listaDeTurmas[] =& $turma;
					}

					// novo dia de aula
					if ($matches[5]) {
						$dia = $matches[5];

						$aula =& new Aula();
						$aula->dia = $dia;
						$turma->listaDeAulas[] =& $aula;
					}
					
					// sempre ha hora
					$aula->setHorario($matches[6]);
					$turma->vagas += (int)$matches[4];

					// sempre ha professor
					$aula->listaDeDocentes[] = $matches[7];
				}
			} 
		}
		fclose($file);

//		return NULL;
	}
}


/************ Programa TESTE ****************/
/*
$curso = new Curso();
$curso->processaMatricula("112.html");

foreach ($curso->listaDeMaterias as $i => $materia) {
	echo '<b>'.$materia->codigo.'</b> - '.$materia->nome.' (<font color="red">';
	foreach ($materia->listaDeTurmas as $j => $turma) {
		foreach ($turma->listaDeAulas as $k => $aula) {
			echo "$aula->docente";
			break;
		}
		break;
	}
	echo '</font>)<br/>';
}
*/

?>
