<?php

require_once('curso.php');

$curso = new Curso();
$curso->processaGrade('112');

foreach ($curso->listaDeMaterias as $i => $j) {
	echo "$j->codigo - \n";
	foreach ($j->listaDePreRequisitos as $k => $l)
		echo "[$l->codigo]";
	echo "<br/>\n";
}

?>
