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
<p>
Todas as informações sobre as matérias foram tiradas do 
site da <a href="http://www.supac.ufba.br/">SUPAC</a>. Alguns dados
podem ter sido alterados pelos respectivos departamentos após a 
disponibilização na Internet das informações.
</p>

<h2>Atenção - Matrícula WEB</h2>
<p>
<b>Este site NÃO tem nenhuma relação com a
<a href="http://www.siac.ufba.br">Matrícula WEB</a>!</b><br/>
A Matrícula WEB é a maneira oficial de se efetuar a matrícula para
alguns cursos da UFBA.<br/>
Este site apenas oferece
aos alunos uma forma de visualizar opções de horário e não tem nenhuma
influência na matrícula do aluno.
</p>

<h1>Escolha seu curso</h1>

<tr>
<td class="impar">
  <h2>&Aacute;rea I</h2>
  <a href="mostramaterias.php?curso=101">Arquitetura</a><br/>
  <a href="mostramaterias.php?curso=102">Engenharia Civil</a><br/>
  <a href="mostramaterias.php?curso=103">Engenharia de Minas</a><br/>
  <a href="mostramaterias.php?curso=104">Engenharia El&eacute;trica</a><br/>
  <a href="mostramaterias.php?curso=105">Engenharia Mecânica</a><br/>
  <a href="mostramaterias.php?curso=106">Engenharia Qu&iacute;mica</a><br/>
  <a href="mostramaterias.php?curso=107">Engenharia Sanitária e Ambiental</a><br/>
  <a href="mostramaterias.php?curso=108">F&iacute;sica</a><br/>
  <a href="mostramaterias.php?curso=109">Geografia</a><br/>
  <a href="mostramaterias.php?curso=110">Geologia</a><br/>
  <a href="mostramaterias.php?curso=111">Matem&aacute;tica</a><br/>
  <a href="mostramaterias.php?curso=112">Ci&ecirc;ncia da Computa&ccedil;&atilde;o</a><br/>
  <a href="mostramaterias.php?curso=113">Qu&iacute;mica</a><br/>
  <a href="mostramaterias.php?curso=116">Estat&iacute;stica</a><br/>
  <a href="mostramaterias.php?curso=118">Geof&iacute;sica</a><br/>
  <a href="mostramaterias.php?curso=119">Oceanografia</a><br/>
  <a href="mostramaterias.php?curso=181">F&iacute;sica (noturno)</a><br/>
  <a href="mostramaterias.php?curso=182">Geografia (noturno)</a><br/>
  <a href="mostramaterias.php?curso=183">Matem&aacute;tica (noturno)</a><br/>
  <a href="mostramaterias.php?curso=184">Qu&iacute;mica (noturno)</a><br/>
  <a href="mostramaterias.php?curso=185">Engenharia de Produ&ccedil;&atilde;o (noturno)</a><br/>
  <a href="mostramaterias.php?curso=186">Engenharia da Computa&ccedil;&atilde;o (noturno)</a><br/>
  <a href="mostramaterias.php?curso=187">Arquitetura (noturno)</a><br/>
  <a href="mostramaterias.php?curso=188">Engenharia Controle Automa&ccedil;&atilde;o (noturno)</a><br/>
  <a href="mostramaterias.php?curso=194">Engenharia de Agrimensura e Cartogr&aacute;fica</a><br/>
  <a href="mostramaterias.php?curso=195">Sistemas e Informa&ccedil;&atilde;o</a><br/>
  <a href="mostramaterias.php?curso=196">Computa&ccedil;&atilde;o</a><br/>
  <a href="mostramaterias.php?curso=197">C.S.T. de Transporte Terrestre</a><br/>
</td>
<td class="par">
	<h2>&Aacute;rea III</h2>
    <a href="mostramaterias.php?curso=303">Biblioteconomia e Documenta&ccedil;&atilde;o</a><br/>
    <a href="mostramaterias.php?curso=304">Ci&ecirc;ncias Cont&aacute;beis</a><br/>
    <a href="mostramaterias.php?curso=305">Ci&ecirc;ncias Econômicas</a><br/>
    <a href="mostramaterias.php?curso=306">Ci&ecirc;ncias Sociais</a><br/>
    <a href="mostramaterias.php?curso=307">Comunica&ccedil;&atilde;o</a><br/>
    <a href="mostramaterias.php?curso=308">Direito</a><br/>
    <a href="mostramaterias.php?curso=309">Filosofia</a><br/>
    <a href="mostramaterias.php?curso=310">Hist&oacute;ria</a><br/>
    <a href="mostramaterias.php?curso=311">Museologia</a><br/>
    <a href="mostramaterias.php?curso=312">Pedagogia</a><br/>
    <a href="mostramaterias.php?curso=313">Psicologia</a><br/>
    <a href="mostramaterias.php?curso=314">Secretariado</a><br/>
    <a href="mostramaterias.php?curso=315">Educa&ccedil;&atilde;o F&iacute;sica</a><br/>
    <a href="mostramaterias.php?curso=301">Administra&ccedil;&atilde;o</a><br/>
    <a href="mostramaterias.php?curso=317">Arquivologia</a><br/>
    <a href="mostramaterias.php?curso=325">Servi&ccedil;o Social</a><br/>
    <a href="mostramaterias.php?curso=380">Ci&ecirc;ncias Cont&aacute;beis (noturno)</a><br/>
    <a href="mostramaterias.php?curso=381">Arquivologia (noturno)</a><br/>
    <a href="mostramaterias.php?curso=382">Direito (noturno)</a><br/>
    <a href="mostramaterias.php?curso=383">G&ecirc;nero e Diversidade (noturno)</a><br/>
    <a href="mostramaterias.php?curso=384">C.S.T. de Gest&atilde;o P&uacute;blica e Gest&atilde;o Social (noturno)</a><br/>

	<h2>&Aacute;rea IV</h2>
    <a href="mostramaterias.php?curso=401">Letras Vern&aacute;culas</a><br/>
    <a href="mostramaterias.php?curso=402">Letras Vern&aacute;culas c/ L&iacute;ngua Estrangeira</a><br/>
    <a href="mostramaterias.php?curso=403">L&iacute;ngua Estrangeira</a><br/>
    <a href="mostramaterias.php?curso=480">Letras Vern&aacute;culas (noturno)</a><br/>
    <a href="mostramaterias.php?curso=481">L&iacute;ngua Estrangeira (noturno)</a><br/>	<p></p>
</td>
</tr>
<tr>
<td class="par">

  	<h2>&Aacute;rea II</h2>
    <a href="mostramaterias.php?curso=203">Enfermagem</a><br/>
    <a href="mostramaterias.php?curso=204">Farm&aacute;cia</a><br/>
    <a href="mostramaterias.php?curso=205">Medicina</a><br/>
    <a href="mostramaterias.php?curso=206">Medicina Veterin&aacute;ria</a><br/>
    <a href="mostramaterias.php?curso=207">Nutri&ccedil;&atilde;o</a><br/>
    <a href="mostramaterias.php?curso=208">Odontologia</a><br/>
    <a href="mostramaterias.php?curso=209">Ci&ecirc;ncias Naturais</a><br/>
    <a href="mostramaterias.php?curso=210">Fonoaudiologia</a><br/>
    <a href="mostramaterias.php?curso=219">Zootecnia</a><br/>
    <a href="mostramaterias.php?curso=222">Fisioterapia</a><br/>
    <a href="mostramaterias.php?curso=280">Ci&ecirc;ncias Biol&oacute;gicas (noturno)</a><br/>
    <a href="mostramaterias.php?curso=281">Farm&aacute;cia (noturno)</a><br/>
    <a href="mostramaterias.php?curso=282">Gastronomia (noturno)</a><br/>
    <a href="mostramaterias.php?curso=283">Sa&uacute;de Coletiva (noturno)</a><br/>
    <a href="mostramaterias.php?curso=284">Biotecnologia (noturno)</a><br/>


</td>
<td class="impar">

	
	<h2>&Aacute;rea V</h2>
    <a href="mostramaterias.php?curso=501">Artes Pl&aacute;sticas</a><br/>
    <a href="mostramaterias.php?curso=502">Composi&ccedil;&atilde;o e Reg&ecirc;ncia</a><br/>
    <a href="mostramaterias.php?curso=503">Licenciatura em Dan&ccedil;a</a><br/>
    <a href="mostramaterias.php?curso=505">Licenciatura em Desenho e Pl&aacute;stica</a><br/>
    <a href="mostramaterias.php?curso=506">Artes C&ecirc;nicas - Dire&ccedil;&atilde;o Teatral</a><br/>
    <a href="mostramaterias.php?curso=507">Licenciatura em M&uacute;sica</a><br/>
    <a href="mostramaterias.php?curso=508">Canto</a><br/>
    <a href="mostramaterias.php?curso=509">Instrumento</a><br/>
    <a href="mostramaterias.php?curso=512">Desenho Industrial</a><br/>
    <a href="mostramaterias.php?curso=513">Decora&ccedil;&atilde;o</a><br/>
    <a href="mostramaterias.php?curso=514">M&uacute;sica Popular</a><br/>
    <a href="mostramaterias.php?curso=581">Dan&ccedil;a (noturno)</a><br/>

	<h2>Bacharelados Interdisciplinares</h2>
    <a href="mostramaterias.php?curso=189">B.I. em Ci&ecirc;ncia e Tecnologia (Noturno)</a><br/>
    <a href="mostramaterias.php?curso=190">B.I. em Ci&ecirc;ncia e Tecnologia</a><br/>
    <a href="mostramaterias.php?curso=226">B.I. em Sa&uacute;de</a><br/>
    <a href="mostramaterias.php?curso=286">B.I. em Sa&uacute;de (noturno)</a><br/>
    <a href="mostramaterias.php?curso=327">B.I. em Humanidades</a><br/>
    <a href="mostramaterias.php?curso=387">B.I. em Humanidades (noturno)</a><br/>
    <a href="mostramaterias.php?curso=515">B.I. em Artes</a><br/>
    <a href="mostramaterias.php?curso=580">B.I. em Artes (noturno)</a><br/>

</td>
</tr>
</table>

<p>
O c&oacute;digo fonte do meuhorario est&aacute; dispon&iacute;vel em um
<a href="https://github.com/rodrigorgs/meuhorario">reposit&oacute;rio no GitHub</a>.
</p>

<?php

rodape();

?>
