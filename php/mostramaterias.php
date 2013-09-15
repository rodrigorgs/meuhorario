<?php

require_once('curso.php');
require_once('util.php');
require_once('estatistica.php');
require_once('config.php');

cabecalho("Escolha as m&aacute;terias", true);

if (!$_REQUEST['curso']) {
	echo "Erro: nenhum curso foi fornecido. $voltar";
    rodape();
	exit(1);
}

gravaEstatistica($_REQUEST['curso']);

?>

<form name="formulario" action="gerahorarios.php" method="post">
<table class="materias" border="0" cellpadding="2">

<?php
	$curso = new Curso();
	$curso->processaMatricula($_REQUEST['curso']);

	echo "<h2>$curso->nome - $curso->semestre</h2>\n";
	echo '<input type="hidden" name="curso" value="' . $_REQUEST['curso'] .'"/>';

	echo '<p>Veja tamb&eacute;m o <a target="_blank" href="' . 
			'https://twiki.ufba.br/twiki/pub/SUPAC/GradGuiaAreaI/' . $_REQUEST['curso'] .
			'.html">guia de matr&iacute;cula no site da SUPAC</a>.</p>'
?>

<tr>
	<th></th><th>Matéria</th><th>Apelido</th>
</tr>
<?php

$num = 0;
$corClick = '#c00';
$corOver = '#3c3';
$corOver = '#4d4';
foreach ($curso->listaDeMaterias as $i => $materia) {
	$num++;
	$classe = ($num % 2) ? "impar" : "par";
	$cor = ($num % 2) ? '#ddd' : '#eee';
	$checkcode = "switchMateria('$materia->codigo', " . 
			"'" . $materia->getTurmasStringList() . "'" . ", " .
			count($materia->listaDeTurmas) . ")";
	echo <<<END
	<tr class="$classe">
		<td>
			<input type="checkbox" name="$materia->codigo"
			id="$materia->codigo" onclick="$checkcode;"/> <!-- era down -->
		</td>
		<td>
			<tt>
			<span class="alterna2"
			onclick="javascript: alternaTurma('materia$num', this);">
			[+]</span></tt>
		<!-- </td> -->
		<!-- <td> -->
			<span class="linkfalso"
		onmouseover="this.style.background = '$corOver';"
		onmouseout="this.style.background = '$cor';"
		onclick="switchCheck('$materia->codigo');$checkcode;" 
			><!-- era down -->
			<tt>$materia->codigo</tt> - $materia->nome
			</span>
END;
	echo '<div id="materia' . $num . '" class="turmas">';
	// echo '<table border="1" id="materia' . $num . '" class="turmas">';
	echo '<table border="1">';
	foreach ($materia->listaDeTurmas as $j => $turma) {
		echo "<tr><td>" . 
				"<input id=\"$materia->codigo-$turma->codigo\" " .
				"name=\"$materia->codigo-$turma->codigo\" " .
				"onclick=\"javascript: atualizarMateria(this, " .
				"'$materia->codigo');\" " .
				"type=\"checkbox\"/>" .
				"$turma->codigo</td>\n";
		echo "<td>$turma->vagas vagas</td>\n";
		foreach ($turma->listaDeAulas as $k => $aula) {
			echo "<td>$aula->dia</td>";
			echo "<td>$aula->horaini" . ':00 &agrave;s ' .
					"$aula->horafim" . ':00</td>';
			echo "<td>";
			foreach ($aula->listaDeDocentes as $l => $docente)
				echo $docente . '<br/>';
			echo "</td></tr><tr>\n";
			echo "<td></td><td></td>";
		}
		echo "<td></td><td></td><td></td>\n";
		echo "</tr>";
	}
	echo "</table>\n";
	echo "</div>\n";
echo <<<END
		</td>
		<td>
			<input type="text" name="ap$materia->codigo" id="ap$materia->codigo" size="20" class="apelido"/>
		</td>
	</tr>
END;

}
?>
	<tr>
		<td></td>
		<td colspan="2">
			<br/>
			<input type="checkbox" name="impressao" />Vers&atilde;o para impress&atilde;o<br/>
			<input type="checkbox" name="mostraConflito" />Mostrar conflitos de hor&aacute;rio<br/>
			<input type="checkbox" name="subconjuntos"/>Mostrar subconjuntos com pelo menos
			<input type="text" size="3" name="minimoTurmas" value="4"/> turmas.<br/>
			<br/>
			<input type="submit" value="Gerar Hor&aacute;rios" /> 
			<input type="reset" value="Limpar" />
		</td>
	</tr>
</table>

<h2>Mat&eacute;rias Eletivas e Optativas</h2>
<p>
Escolha aqui as mat&eacute;rias eletivas ou optativas que voc&ecirc; deseja pegar e
n&atilde;o apareceram na listagem acima.<br/>
&Eacute; necess&aacute;rio fornecer o c&oacute;digo da mat&eacute;ria e a
unidade da UFBA que fornece esta mat&eacute;ria.<br/>
Para escolher e ver os c&oacute;digos das mat&eacute;rias, veja o 
<a target="_blank" href="http://www.supac.ufba.br/GUIA2.htm">Guia
por Unidade (SUPAC)</a>.
</p>

<table border="0">
<tr>
<th>C&oacute;digo da<br/> mat&eacute;ria</th>
<th>Apelido</th>
<th>Unidade</th>
</tr>

<?php
	$qtd = 5;

	for ($i = 0; $i < $qtd; $i++) {
		echo "<tr>\n";
		echo "<td><input name=\"elt$i\" type=\"text\" size=\"8\" /></td>\n";
		echo "<td><input name=\"apelt$i\" type=\"text\" size=\"20\" /></td>\n";
		echo "<td><select name=\"und$i\">\n";
		include('option_curso.inc');
		echo "</select></td>\n";
		echo "</tr>\n";
	}
?>

</table>
<p><input type="submit" value="Gerar Hor&aacute;rios" /></p>

<h2>Restri&ccedil;&otilde;es de hor&aacute;rio</h2>
<p>
Marque arqui os hor&aacute;rios em que voc&ecirc; <em>n&atilde;o</em> pode
pegar mat&eacute;rias:
</p>

<table border="0">

<?php

global $diasDaSemana;

echo '<tr><th></th>';
foreach ($diasDaSemana as $i => $dia)
	echo "<th>$dia</th>";
echo "</tr>\n";

for ($hora = 7; $hora <= 23; $hora++) {
	$proxhora = $hora + 1;
	echo "<tr><th>${hora}-${proxhora}h</th>\n";
	foreach ($diasDaSemana as $i => $dia) {
		echo '<td align="center"><input type="checkbox" name="' . $dia . $hora . '"/></td>';
	}
	echo "</tr>\n";
}

?>

</table>

<p><input type="submit" value="Gerar Hor&aacute;rios" /></p>

<h2>Restri&ccedil;&otilde;es de professor</h2>
<p>
Escreva aqui os nomes dos professores que voc&ecirc; <em>n&atilde;o</em>
quer pegar (um nome em cada linha; n&atilde;o use acentos):
</p>

<textarea cols="40" rows="5" name="carrascos"></textarea>
<br/>
			
<p><input type="submit" value="Gerar Hor&aacute;rios" /></p>
</form>

<?php
rodape();

#onmouseout="setPointer(this, $num, 'out', '$cor', '$corOver', '$corClick');"
#onmousedown="setPointer(this, $num, 'click', '$cor', '$corOver', '$corClick');"
#onmouseover="setPointer(this, $num, 'over', '$cor', '$corOver', '$corClick');"
?>
