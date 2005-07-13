<?php
require_once('util.php');

cabecalho("Escolha seu curso", false);

/* expressao regular (VIM):
%s/\(\d\d\d\) \(.*\)/<a href="mostramaterias.php?curso=\1">\2<\/a><br\/>/g
*/
?>

<table align="top" cellpadding="10" valign="top">
<h1>Matr&iacute;cula 2005.2</h1>
<p>
Este site fornece aos alunos da UFBA (Universidade Federal da Bahia)
novos recursos para o planejamento da matr&iacute;cula.<br/>
Aqui, voc&ecirc; escolhe as mat&eacute;rias, imp&otilde;e
restri&ccedil;&otilde;es e, no final, s&atilde;o mostradas
v&aacute;rias op&ccedil;&otilde;es de hor&aacute;rio.<br/>
Todas as informações sobre as matérias foram tiradas do 
site da <a href="http://www.supac.ufba.br/">SUPAC</a>. Alguns dados
podem ter sido alterados pelos respectivos departamentos após a 
disponibilização na Internet das informações.
</p>

<h2>Novos cursos dispon&iacute;veis</h2>
Oceanografia, Zootecnia, Engenharia Florestal, Engenharia de Pesca,
Pedagogia (Irec&ecirc;), Hist&oacute;ria - licenciaturas especiais, 
Letras Vern&aacute;culas com L&iacute;ngua Estrangeira, 
L&iacute;ngua estrangeira.


<h1>Escolha seu curso</h1>

<tr>
<td class="impar">
	<h2>&Aacute;rea I</h2>
	<a href="mostramaterias.php?curso=101">ARQUITETURA</a><br/>
	<a href="mostramaterias.php?curso=102">ENGENHARIA CIVIL</a><br/>
	<a href="mostramaterias.php?curso=103">ENGENHARIA DE MINAS</a><br/>
	<a href="mostramaterias.php?curso=104">ENGENHARIA EL&Eacute;TRICA</a><br/>
	<a href="mostramaterias.php?curso=105">ENGENHARIA MEC&Acirc;NICA</a><br/>
	<a href="mostramaterias.php?curso=106">ENGENHARIA QU&Iacute;MICA</a><br/>
	<a href="mostramaterias.php?curso=107">ENGENHARIA SANIT&Aacute;RIA</a><br/>
	<a href="mostramaterias.php?curso=108">F&Iacute;SICA</a><br/>
	<a href="mostramaterias.php?curso=109">GEOGRAFIA</a><br/>
	<a href="mostramaterias.php?curso=110">GEOLOGIA</a><br/>
	<a href="mostramaterias.php?curso=111">MATEM&Aacute;TICA</a><br/>
	<a href="mostramaterias.php?curso=112">CI&Ecirc;NCIA DA COMPUTA&Ccedil;&Atilde;O</a><br/>
	<a href="mostramaterias.php?curso=113">QU&Iacute;MICA</a><br/>
	<a href="mostramaterias.php?curso=116">ESTAT&Iacute;STICA</a><br/>
	<a href="mostramaterias.php?curso=118">GEOF&Iacute;SICA</a><br/>
	<a href="mostramaterias.php?curso=119">OCEANOGRAFIA</a><br/>
	<a href="mostramaterias.php?curso=181">F&Iacute;SICA NOTURNO</a><br/>
</td>
<td class="par">
	<h2>&Aacute;rea II</h2>
	<a href="mostramaterias.php?curso=201">AGRONOMIA</a><br/>
	<a href="mostramaterias.php?curso=202">CI&Ecirc;NCIAS BIOL&Oacute;GICAS</a><br/>
	<a href="mostramaterias.php?curso=203">ENFERMAGEM</a><br/>
	<a href="mostramaterias.php?curso=204">FARM&Aacute;CIA</a><br/>
	<a href="mostramaterias.php?curso=205">MEDICINA</a><br/>
	<a href="mostramaterias.php?curso=206">MEDICINA VETERIN&Aacute;RIA</a><br/>
	<a href="mostramaterias.php?curso=207">NUTRI&Ccedil;&Atilde;O</a><br/>
	<a href="mostramaterias.php?curso=208">ODONTOLOGIA</a><br/>
	<a href="mostramaterias.php?curso=209">CI&Ecirc;NCIAS NATURAIS</a><br/>
	<a href="mostramaterias.php?curso=210">FONOAUDIOLOGIA</a><br/>
	<a href="mostramaterias.php?curso=211">ZOOTECNIA</a><br/>
	<a href="mostramaterias.php?curso=212">ENGENHARIA FLORESTAL</a><br/>
	<a href="mostramaterias.php?curso=213">ENGENHARIA DE PESCA</a><br/>
</td>
</tr>
<tr>
<td class="par">
	<h2>&Aacute;rea III</h2>
	<a href="mostramaterias.php?curso=303">BIBLIOTECONOMIA E DOCUMENTA&Ccedil;&Atilde;O</a><br/>
	<a href="mostramaterias.php?curso=304">CI&Ecirc;NCIAS CONT&Aacute;BEIS</a><br/>
	<a href="mostramaterias.php?curso=305">CI&Ecirc;NCIAS ECON&Ocirc;MICAS</a><br/>
	<a href="mostramaterias.php?curso=306">CI&Ecirc;NCIAS SOCIAIS</a><br/>
	<a href="mostramaterias.php?curso=307">COMUNICA&Ccedil;&Atilde;O</a><br/>
	<a href="mostramaterias.php?curso=308">DIREITO </a><br/>
	<a href="mostramaterias.php?curso=309">FILOSOFIA</a><br/>
	<a href="mostramaterias.php?curso=310">HISTORIA</a><br/>
	<a href="mostramaterias.php?curso=311">MUSEOLOGIA</a><br/>
	<a href="mostramaterias.php?curso=312">PEDAGOGIA (SALVADOR)</a><br/>
	<a href="mostramaterias.php?curso=313">PSICOLOGIA</a><br/>
	<a href="mostramaterias.php?curso=314">SECRETARIADO</a><br/>
	<a href="mostramaterias.php?curso=315">EDUCA&Ccedil;&Atilde;O F&Iacute;SICA</a><br/>
	<a href="mostramaterias.php?curso=301">BACHARELADO EM ADMINISTRA&Ccedil;&Atilde;O</a><br/>
	<a href="mostramaterias.php?curso=317">ARQUIVOLOGIA</a><br/>
	<a href="mostramaterias.php?curso=319">PEDAGOGIA (IRECE)</a><br/>
	<a href="mostramaterias.php?curso=320">HISTORIA - LICENCIATURAS ESPECIAIS</a><br/>
</td>
<td class="impar">
	<h2>&Aacute;rea IV</h2>
	<a href="mostramaterias.php?curso=401">LETRAS VERN&Aacute;CULAS</a><br/>
	<a href="mostramaterias.php?curso=402">LETRAS VERN&Aacute;CULAS C/ LINGUA ESTRANGEIRA</a><br/>
	<a href="mostramaterias.php?curso=403">LETRAS ESTRANGEIRA</a><br/>
	<p></p>
	
	<h2>&Aacute;rea V</h2>
	<a href="mostramaterias.php?curso=501">ARTES PL&Aacute;STICAS</a><br/>
	<a href="mostramaterias.php?curso=502">COMPOSI&Ccedil;&Atilde;O E REG&Ecirc;NCIA</a><br/>
	<a href="mostramaterias.php?curso=503">LICENCIATURA EM DAN&Ccedil;A</a><br/>
	<a href="mostramaterias.php?curso=505">LICENCIATURA EM DESENHO E PL&Aacute;STICA</a><br/>
	<a href="mostramaterias.php?curso=506">BACH ARTES C&Ecirc;NICAS - DIRE&Ccedil;&Atilde;O TEATRAL</a><br/>
	<a href="mostramaterias.php?curso=507">LICENCIATURA EM MUSICA</a><br/>
	<a href="mostramaterias.php?curso=508">CANTO</a><br/>
	<a href="mostramaterias.php?curso=509">INSTRUMENTO</a><br/>
	<a href="mostramaterias.php?curso=512">DESENHO INDUSTRIAL</a><br/>
	<a href="mostramaterias.php?curso=513">DECORA&Ccedil;&Atilde;O</a><br/>
</td>
</tr>
</table>

<h2>Para desenvolvedores de <i>software</i></h2>
Se voc&ecirc; &eacute; um desenvolvedor de <i>software</i>,
veja a
<a href="http://sourceforge.net/projects/tcc">p&aacute;gina do projeto</a>
(hospedada no SourceForge), com o c&oacute;digo-fonte deste programa e
de outros programas relacionados a matr&iacute;cula e planejamento de curso.

<h2>Novo programa de matrícula</h2>
Para os aventureiros, estamos disponibilizando um programa de matrícula
com interface gráfica bastante intuitiva. É o University Scheduler.
Para executá-lo é necessário ter o
<a href="http://java.sun.com/j2se/1.5.0/download.jsp">Java 5</a> instalado.
O programa está em inglês. Para funcionar, o ele precisa baixar todas
as informações de matrícula (cerca de 3MB). Acesse aqui o
<a href="scheduler/">University Scheduler UFBA</a>. 
Para ver telas do programa e obter mais informações, acesse o 
<a href="http://www.universityscheduler.com/">site oficial do University
Scheduler</a> (em inglês).



<small>
<p>
Guia de matr&iacute;cula atualizado no dia 12 de julho de 2005.<br/>
(Novos recursos adicionados no dia 3 de mar&ccedil;o de 2005)
</p>
</small>


<?php

rodape();

?>
