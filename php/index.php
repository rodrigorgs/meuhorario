<?php
require_once('util.php');

cabecalho("Escolha seu curso", false);

/* expressao regular (VIM):
%s/\(\[[:digit:]]*\) \(.*\)/<a href="mostramaterias.php?curso=\1">\2<\/a><br\/>/g
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
  <a href="mostramaterias.php?curso=101">Arquitetura</a><br/>
  <a href="mostramaterias.php?curso=102">Engenharia Civil</a><br/>
  <a href="mostramaterias.php?curso=103">Engenharia de Minas</a><br/>
  <a href="mostramaterias.php?curso=104">Engenharia Elétrica</a><br/>
  <a href="mostramaterias.php?curso=105">Engenharia Mecânica</a><br/>
  <a href="mostramaterias.php?curso=106">Engenharia Química</a><br/>
  <a href="mostramaterias.php?curso=107">Engenharia Sanitária e Ambiental</a><br/>
  <a href="mostramaterias.php?curso=108">Física</a><br/>
  <a href="mostramaterias.php?curso=109">Geografia</a><br/>
  <a href="mostramaterias.php?curso=110">Geologia</a><br/>
  <a href="mostramaterias.php?curso=111">Matemática</a><br/>
  <a href="mostramaterias.php?curso=112">Ciência da Computação</a><br/>
  <a href="mostramaterias.php?curso=113">Química</a><br/>
  <a href="mostramaterias.php?curso=116">Estatística</a><br/>
  <a href="mostramaterias.php?curso=118">Geofísica</a><br/>
  <a href="mostramaterias.php?curso=119">Oceanografia</a><br/>
  <a href="mostramaterias.php?curso=181">Física (noturno)</a><br/>
  <a href="mostramaterias.php?curso=182">Geografia (noturno)</a><br/>
  <a href="mostramaterias.php?curso=183">Matemática (noturno)</a><br/>
  <a href="mostramaterias.php?curso=184">Química (noturno)</a><br/>
  <a href="mostramaterias.php?curso=185">Engenharia de Produção (noturno)</a><br/>
  <a href="mostramaterias.php?curso=186">Engenharia da Computação (noturno)</a><br/>
  <a href="mostramaterias.php?curso=187">Arquitetura (noturno)</a><br/>
  <a href="mostramaterias.php?curso=188">Engenharia Controle Automação (noturno)</a><br/>
  <a href="mostramaterias.php?curso=194">Engenharia de Agrimensura e Cartográfica</a><br/>
  <a href="mostramaterias.php?curso=195">Sistemas e Informação</a><br/>
  <a href="mostramaterias.php?curso=196">Computação</a><br/>
  <a href="mostramaterias.php?curso=197">C.S.T. de Transporte Terrestre</a><br/>
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
	<a href="mostramaterias.php?curso=210">FONOAUDIOLOGIA</a><br/><a href="mostramaterias.php?curso=202">Ciências Biológicas</a><br/>
    <a href="mostramaterias.php?curso=203">Enfermagem</a><br/>
    <a href="mostramaterias.php?curso=204">Farmácia</a><br/>
    <a href="mostramaterias.php?curso=205">Medicina</a><br/>
    <a href="mostramaterias.php?curso=206">Medicina Veterinária</a><br/>
    <a href="mostramaterias.php?curso=207">Nutrição</a><br/>
    <a href="mostramaterias.php?curso=208">Odontologia</a><br/>
    <a href="mostramaterias.php?curso=209">Ciências Naturais</a><br/>
    <a href="mostramaterias.php?curso=210">Fonoaudiologia</a><br/>
    <a href="mostramaterias.php?curso=219">Zootecnia</a><br/>
    <a href="mostramaterias.php?curso=222">Fisioterapia</a><br/>
    <a href="mostramaterias.php?curso=280">Ciências Biológicas (noturno)</a><br/>
    <a href="mostramaterias.php?curso=281">Farmácia (noturno)</a><br/>
    <a href="mostramaterias.php?curso=282">Gastronomia (noturno)</a><br/>
    <a href="mostramaterias.php?curso=283">Saúde Coletiva (noturno)</a><br/>
    <a href="mostramaterias.php?curso=284">Biotecnologia (noturno)</a><br/>

</td>
</tr>
<tr>
<td class="par">
	<h2>&Aacute;rea III</h2>
    <a href="mostramaterias.php?curso=303">Biblioteconomia e Documentação</a><br/>
    <a href="mostramaterias.php?curso=304">Ciências Contábeis</a><br/>
    <a href="mostramaterias.php?curso=305">Ciências Econômicas</a><br/>
    <a href="mostramaterias.php?curso=306">Ciências Sociais</a><br/>
    <a href="mostramaterias.php?curso=307">Comunicação</a><br/>
    <a href="mostramaterias.php?curso=308">Direito</a><br/>
    <a href="mostramaterias.php?curso=309">Filosofia</a><br/>
    <a href="mostramaterias.php?curso=310">História</a><br/>
    <a href="mostramaterias.php?curso=311">Museologia</a><br/>
    <a href="mostramaterias.php?curso=312">Pedagogia</a><br/>
    <a href="mostramaterias.php?curso=313">Psicologia</a><br/>
    <a href="mostramaterias.php?curso=314">Secretariado</a><br/>
    <a href="mostramaterias.php?curso=315">Educação Física</a><br/>
    <a href="mostramaterias.php?curso=301">Administração</a><br/>
    <a href="mostramaterias.php?curso=317">Arquivologia</a><br/>
    <a href="mostramaterias.php?curso=325">Serviço Social</a><br/>
    <a href="mostramaterias.php?curso=380">Ciências Contábeis (noturno)</a><br/>
    <a href="mostramaterias.php?curso=381">Arquivologia (noturno)</a><br/>
    <a href="mostramaterias.php?curso=382">Direito (noturno)</a><br/>
    <a href="mostramaterias.php?curso=383">Gênero e Diversidade (noturno)</a><br/>
    <a href="mostramaterias.php?curso=384">C.S.T. de Gestão Pública e Gestão Social (noturno)</a><br/>
</td>
<td class="impar">
	<h2>&Aacute;rea IV</h2>
    <a href="mostramaterias.php?curso=401">Letras Vernáculas</a><br/>
    <a href="mostramaterias.php?curso=402">Letras Vernáculas c/ Língua Estrangeira</a><br/>
    <a href="mostramaterias.php?curso=403">Língua Estrangeira</a><br/>
    <a href="mostramaterias.php?curso=480">Letras Vernáculas (noturno)</a><br/>
    <a href="mostramaterias.php?curso=481">Língua Estrangeira (noturno)</a><br/>	<p></p>
	
	<h2>&Aacute;rea V</h2>
    <a href="mostramaterias.php?curso=501">Artes Plásticas</a><br/>
    <a href="mostramaterias.php?curso=502">Composição e Regência</a><br/>
    <a href="mostramaterias.php?curso=503">Licenciatura em Dança</a><br/>
    <a href="mostramaterias.php?curso=505">Licenciatura em Desenho e Plástica</a><br/>
    <a href="mostramaterias.php?curso=506">Artes Cênicas - Direção Teatral</a><br/>
    <a href="mostramaterias.php?curso=507">Licenciatura em Música</a><br/>
    <a href="mostramaterias.php?curso=508">Canto</a><br/>
    <a href="mostramaterias.php?curso=509">Instrumento</a><br/>
    <a href="mostramaterias.php?curso=512">Desenho Industrial</a><br/>
    <a href="mostramaterias.php?curso=513">Decoração</a><br/>
    <a href="mostramaterias.php?curso=514">Música Popular</a><br/>
    <a href="mostramaterias.php?curso=581">Dança (noturno)</a><br/>

	<h2>Bacharelados Interdisciplinares</h2>
    <a href="mostramaterias.php?curso=189">B.I. em Ciência e Tecnologia (Noturno)</a><br/>
    <a href="mostramaterias.php?curso=190">B.I. em Ciência e Tecnologia</a><br/>
    <a href="mostramaterias.php?curso=226">B.I. em Saúde</a><br/>
    <a href="mostramaterias.php?curso=286">B.I. em Saúde (noturno)</a><br/>
    <a href="mostramaterias.php?curso=327">B.I. em Humanidades</a><br/>
    <a href="mostramaterias.php?curso=387">B.I. em Humanidades (noturno)</a><br/>
    <a href="mostramaterias.php?curso=515">B.I. em Artes</a><br/>
    <a href="mostramaterias.php?curso=580">B.I. em Artes (noturno)</a><br/>

</td>
</tr>
</table>

<p>
(Guia de matr&iacute;cula atualizado no dia 15 de setembro de 2013)<br/>
</p>

<?php

rodape();

?>
