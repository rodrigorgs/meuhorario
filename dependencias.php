<?php

require_once('curso.php');
require_once('util.php');
require_once('config.php');

cabecalho("Arvore de pre-requisitos", false);

if (!$_REQUEST['materia']) {
	echo "Erro: nenhuma mat&eacute;ria foi fornecida. $voltar";
    rodape();
	exit(1);
}

function iniciaMateria($codigo) {
	echo '<ul><li><tt><span class="bullet" onclick="javascript: alternaArvore(' .
			"'" . $codigo . "'" . ', this); return 0;">&ndash;</span></tt>' . 
			" $codigo<div class=\"ramo\" id=\"$codigo\">\n";
}


function geraArvoreRecursiva(&$materia) {
	if (count($materia->listaDePreRequisitos) == 0) {
		echo "<ul><li><tt>&nbsp;</tt> $materia->codigo</li></ul>\n";
	}
	else {
		iniciaMateria($materia->codigo);
		
		foreach ($materia->listaDePreRequisitos as $i => $preRequisito) {
			geraArvoreRecursiva(&$materia->listaDePreRequisitos[$i]);
		}
		echo "</div></li></ul>\n";
	}
}

function mostramaterias(&$curso) {
	foreach ($curso->listaDeMaterias as $materia)
		echo $materia->codigo. ', ';
	echo "<br/>\n";
}

$curso =& new Curso();
$curso->processaGrade('112');

$materiaEscolhida =& $curso->getMateria($_REQUEST['materia']);

if (!is_null($materiaEscolhida))
	geraArvoreRecursiva($materiaEscolhida);
else
	echo "NULL";

rodape();
?>
