<?php
require_once('util.php');

cabecalho("Escolha seu curso", false);

/* expressao regular (VIM):
%s/\(\d\d\d\) \(.*\)/<a href="mostramaterias.php?curso=\1">\2<\/a><br\/>/g
*/
?>

<table align="top" cellpadding="10" valign="top">
<h1>Sobre este site</h1>
<p>
Este site fornece aos alunos da UFBA (Universidade Federal da Bahia)
novos recursos para o planejamento da matr&iacute;cula.<br/>
Aqui, voc&ecirc; escolhe as mat&eacute;rias, imp&otilde;e
restri&ccedil;&otilde;es e, no final, s&atilde;o mostradas
v&aacute;rias op&ccedil;&otilde;es de hor&aacute;rio.
</p>



<h1>Escolha seu curso</h1>

<tr>
<td class="impar">
	<h2>&Aacute;rea I</h2>
	<a href="mostramaterias.php?curso=112">CI&Ecirc;NCIA DA COMPUTA&Ccedil;&Atilde;O</a><br/>
</td>
</tr>
</table>

<p>
(Guia de matr&iacute;cula atualizado no dia 14 de setembro de 2013)<br/>
(Novos recursos adicionados no dia 3 de mar&ccedil;o de 2005)
</p>

<?php

rodape();

?>
