<?php

class Aula {
	var $listaDeDocentes;
	var $dia;
	var $horaini;
	var $horafim;

	function Aula() {
		$this->listaDeDocentes = array();
		$this->horaini = 25;
		$this->horafim = -1;
	}
	
	// Horario eh uma string como 08:00 às 10:00
	function setHorario($horario) {
		if (trim($horario) != "") {
			$hi = (int)substr($horario, 0, 2);
			$hf = (int)substr($horario, 9, 2);

			if ($hi < $this->horaini)
				$this->horaini = $hi;

			if ($hf > $this->horafim)
				$this->horafim = $hf;
		}
	}
}

?>
