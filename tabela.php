<?php

require_once('tabela.php');
require_once('materia.php');
require_once('turma.php');
require_once('config.php');

#function unset_by_val($needle,&$haystack) { 
#	while(($gotcha = array_search($needle,$haystack)) > -1) 
#		unset($haystack[$gotcha]);
#}

class Tabela {
	var $tabela;
	var $conflito;
	var $listaDeTurmas;
	var $cores;
	var $colorida = false;

	function Tabela() {
		global $horasDoDia;
		global $diasDaSemana;
		
		$this->conflito = 0;
		
		$this->tabela = array();
		foreach ($diasDaSemana as $i => $dia) {
			$this->tabela[$dia] = array();
			foreach ($horasDoDia as $j => $hora)
				$this->tabela[$dia][$hora] = array();
		}

		$this->listaDeTurmas = array();

		$this->cores = array('#6cf', '#ff0', '#f96', '#6fc', 
				'#fc0', '#fcc', '#ccf', '#cfc', '#ffc', '#cff');
	}

	function qtdDeTurmas() {
		return count($this->listaDeTurmas);
	}
	
	function insereTurma($turma) {
		foreach ($turma->listaDeAulas as $k => $aula) {
			if ($aula->dia != 'CMB') { // ignora CMB
				for ($hora = $aula->horaini; $hora < $aula->horafim; $hora++) {
					if (count($this->tabela[$aula->dia][$hora]) == 1)
						$this->conflito++;
					$this->tabela[$aula->dia][$hora][] = $turma;
				}
			}
		}
		$this->listaDeTurmas[] = $turma;
	}
	
	function retiraTurma($turma) {
		foreach ($turma->listaDeAulas as $i => $aula) {
			if ($aula->dia != 'CMB') { // ignora CMB
				for ($hora = $aula->horaini; $hora < $aula->horafim; $hora++) {
					foreach ($this->tabela[$aula->dia][$hora] as $j => $tur) {
						if ($tur->materia->codigo == $turma->materia->codigo &&
								$tur->codigo == $turma->codigo) {
							unset($this->tabela[$aula->dia][$hora][$j]);
							if (count($this->tabela[$aula->dia][$hora]) == 1)
								$this->conflito--;
						}
					}
				}
			}
		}

		// apaga a entrada da turma na lista de turmas
		foreach ($this->listaDeTurmas as $key => $value) {
			if ($value->codigo == $turma->codigo && 
					$value->materia->codigo == $turma->materia->codigo)
				unset($this->listaDeTurmas[$key]);
		}
	}

	function exibeHTML() {
		global $diasDaSemana;
		// identifica os horarios extremos
		$min = 23;
		$max = 6;		
		foreach ($this->listaDeTurmas as $i => $turma) {
			foreach ($turma->listaDeAulas as $j => $aula) {
				if ($aula->dia != 'CMB') {
					if ($aula->horaini < $min)
						$min = $aula->horaini;
					if ($aula->horafim > $max)
						$max = $aula->horafim;
				}
			}
		}

		// reindexa lista de turmas
		$this->listaDeTurmas = array_values($this->listaDeTurmas);
	
		// echo "DEBUG: conflitos: " . $this->conflito;
		echo '<table class="horario" cellpadding="2" cellspacing="0" border="1">';
		echo '<tr><th></th>';

		// dias da semana
		foreach ($diasDaSemana as $i => $dia)
			echo "<th>$dia</th>";
	
		echo '</tr>';
		
		for ($hora = $min; $hora < $max; $hora++) {
			echo "<tr><th>$hora-". ($hora + 1)."h</th>";
			foreach ($diasDaSemana as $j => $dia) {
				if (count($this->tabela[$dia][$hora]) >= 2)
					echo '<td class="conflito">';
				else
					echo '<td>';
			
				if (count($this->tabela[$dia][$hora]) > 0) {
					foreach ($this->tabela[$dia][$hora] as $k => $turma) {
				
						if ($this->colorida) {
							$indice = 'indefinido';

							foreach ($this->listaDeTurmas as $l => $t) {
								if ($t->codigo === $turma->codigo &&
										$t->materia->codigo === $turma->materia->codigo) {
									$indice = $l;
									break;
								}
							}
							
							if ($indice === 'indefinido') 
								echo "Erro 293";
							else {
								$indice = (int)$indice % count($this->cores);
								$cor = $this->cores[$indice];
								echo "<span style=\"background: $cor;\">" . $turma->materia->apelido . "</span><br/>\n";
							}
						}
						else
							echo $turma->materia->apelido . "<br/>\n";
					}
				}
				else
					echo "&nbsp;";
	
				echo "</td>";
			}
			echo "</tr>";
		}
		echo "</table>";

		echo "<table class=\"info\" border=\"1\">\n";
		foreach ($this->listaDeTurmas as $i => $turma) {
			echo "<tr><td>";
			
			if ($turma->materia->codigo != $turma->materia->apelido)
				echo $turma->materia->codigo . " - ";

			echo $turma->materia->apelido . "</td>" .
					'<td>(' . $turma->codigo . ')</td>' .
					'<td>' . $turma->vagas . " vagas</td>";

			echo '<td>' . implode("<br/>", $this->docentesDeUmaTurma($turma)) . '</td>';

			echo "</tr>\n";
		}
		echo "</table>\n";
	
		// echo '<br/>';
	}
	
	/*
	 * Retorna uma array com os docentes de uma turma
	 */
	function docentesDeUmaTurma($turma) {
		$profs = array();

		foreach ($turma->listaDeAulas as $i => $aula)
			foreach ($aula->listaDeDocentes as $j => $docente)
				$profs[$docente] = 1;

		return array_keys($profs);
	}

}

?>
