<?php

function cabecalho($titulo, $onload) {
echo '<?xml version="1.0" encoding="iso-8859-1"?>' . "\n";
echo <<<FIM
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="pragma" content="no-cache" />
    
  
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
<a href="http://meuhorario.dcc.ufba.br/">
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
