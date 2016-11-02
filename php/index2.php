<?php
require_once('util.php');
require_once('mixpanel.php');

cabecalho("Escolha seu curso", false);

/* expressao regular (VIM):
%s/\(\d\d\d\) \(.*\)/<a href="mostramaterias.php?curso=\1">\2<\/a><br\/>/g
*/
?>

<table align="top" cellpadding="10" valign="top" width="90%">
<h1>Sobre este site</h1>

<p>
Este site fornece aos alunos da UFBA (Universidade Federal da Bahia)
novos recursos para o planejamento da matr&iacute;cula.<br/>
Aqui, voc&ecirc; escolhe as mat&eacute;rias, imp&otilde;e
restri&ccedil;&otilde;es e, no final, s&atilde;o mostradas
v&aacute;rias op&ccedil;&otilde;es de hor&aacute;rio.
</p>
<p>
Todas as informações sobre as matérias foram tiradas do 
site da <a href="http://www.supac.ufba.br/">SUPAC</a>. Alguns dados
podem ter sido alterados pelos respectivos departamentos após a 
disponibilização na Internet das informações.
</p>

<h2>Atenção - Matrícula WEB</h2>
<p>
<b>Este site NÃO tem nenhuma relação com a
<a id="anchorSiac" href="http://www.siac.ufba.br">Matrícula WEB</a>!</b><br/>
A Matrícula WEB é a maneira oficial de se efetuar a matrícula para
alguns cursos da UFBA.<br/>
Este site apenas oferece
aos alunos uma forma de visualizar opções de horário e não tem nenhuma
influência na matrícula do aluno.
</p>

<h1>Escolha seu curso</h1>

<tr>
<td class="par">
<?php include 'listacursos.htm' ;?>
</td>
</tr>
</table>

<p>
O c&oacute;digo fonte do meuhorario est&aacute; dispon&iacute;vel em um
<a href="https://github.com/rodrigorgs/meuhorario">reposit&oacute;rio no GitHub</a>.
</p>

<?php

mixpanel_footer();
track_home();
track_siac();
rodape();

?>
