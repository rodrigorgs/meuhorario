<?php

class Materia {
	var $nome;
	var $codigo;
	var $apelido;
	
	var $listaDeTurmas;	

	var $cargaHoraria;
	var $creditos;
	var $tipo;  // CM, OP, EL...	
	var $listaDePreRequisitos = array();
	var $listaDeAdjacencias = array();

	function Materia() {
		$this->listaDeTurmas = array();
	}

	function getTurmasStringList() {
		$str = '';
		foreach ($this->listaDeTurmas as $i => $turma)
			$str .= ",$turma->codigo";
		return substr($str, 1);
	}
}

?>
