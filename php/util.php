<?php
ini_set('default_charset', 'iso-8859-1');

function cabecalho($titulo, $onload) {
echo '<?xml version="1.0" encoding="iso-8859-1"?>' . "\n";
echo <<<FIM
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="iso-8859-1" />
    <meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="pragma" content="no-cache" />

    <!-- start Mixpanel -->
      <script type="text/javascript">(function(e,b){if(!b.__SV){var a,f,i,g;window.mixpanel=b;b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split(".");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;"undefined"!==typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){var a="mixpanel";"mixpanel"!==d&&(a+="."+d);b||(a+=" (stub)");return a};c.people.toString=function(){return c.toString(1)+".people (stub)"};i="disable time_event track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.set_once people.increment people.append people.union people.track_charge people.clear_charges people.delete_user".split(" ");for(g=0;g<i.length;g++)f(c,i[g]);b._i.push([a,e,d])};b.__SV=1.2;a=e.createElement("script");a.type="text/javascript";a.async=!0;a.src="undefined"!==typeof MIXPANEL_CUSTOM_LIB_URL?MIXPANEL_CUSTOM_LIB_URL:"file:"===e.location.protocol&&"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js".match(/^\/\//)?"https://cdn.mxpnl.com/libs/mixpanel-2-latest.min.js":"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js";f=e.getElementsByTagName("script")[0];f.parentNode.insertBefore(a,f)}})(document,window.mixpanel||[]);mixpanel.init("2dff242f090edb8aec7f83c7a48a4cd5");</script>
    <!-- end Mixpanel -->

    <style type="text/css" media="screen">@import "estilos.css";</style>
    <script type="text/javascript" src="scripts.js"></script>

    <title>$titulo</title>
  </head>
  <body
FIM;
if ($onload)
    echo ' onLoad="mostraApelidosSelecionados();"';

echo ">\n\n";      
echo <<<FIM
<p>
<a href="http://meuhorario.dcc.ufba.br/index2.php">
<img src="images/meuhorario.jpg" alt="meuhorario (logotipo)" border="0"/>
</a>
</p>

FIM;
}

function rodape() {
?>

  </body>
</html>
<?php
}

function trim_array($x)
{
   if (is_array($x)) {
       return array_map('trim_array', $x);
   }
   return trim($x);
}



?>
