<!DOCTYPE html>
<html>

<head>
  <title>MeuHorario</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">

  <style type="text/css">
    @import 'https://fonts.googleapis.com/css?family=Ruluko';

    html, body {
      height: 100%;
      font-family: 'Ruluko', sans-serif !important;
      color: #424242;
      margin: 0;
      box-sizing: border-box;
    }

    * {
      box-sizing: inherit;
    }

    a {
      color: #2199e8;
      text-decoration: none;
    }
    a:hover {
      color: #1585cf;
    }

    img {
      height: auto;
      max-width: 100%;
    }

    .wrapper {
      min-height: 100%;
      margin-bottom: -100px;
    }
    .wrapper:after {
      height: 100px;
      content: "";
      display: block;
    }

    .header {
      padding-top: 5%;
      padding-bottom: 20px;
      border-bottom: 1px solid #BBB;
      margin-bottom: 20px;
    }

    .footer {
      height: 100px;
      margin-top: 20px;
      background-color: #c5c5c5;
    }
    .footer .footer-area {
      line-height: 100px;
    }
    .footer .footer-area .text {
      display: inline-block;
      vertical-align: middle;
      line-height: normal;
    }

    .text-center {
      text-align: center;
    }

    .row {
      max-width: 75rem;
      margin-left: auto;
      margin-right: auto;
    }
    .row::before{
      content: ' ';
      display: table;
    }
    .row::after {
      content: ' ';
      display: table;
      clear: both;
    }

    .columns {
      float: left;
    }

    .small-offset-1 {
      margin-left: calc(100%/12);
    }

    .small-4 {
      width: calc(100%/3);
    }

    .small-10 {
      width: calc((100%/12)*10);
    }

    .small-12 {
      width: 100%;
    }

    .info-text {
      font-size: 28px;
      font-weight: 600;
      margin-bottom: 20px;
    }

    .buffer-15 {
      display: none;
    }

    @media screen and (min-width: 40em) {
      .medium-offset-0 {
        margin-left: 0;
      }

      .medium-offset-4 {
        margin-left: calc(100%/3);
      }

      .medium-4 {
        width: calc(100%/3);
      }
    }

    @media screen and (min-width: 64em) {
      .large-offset-0 {
        margin-left: 0;
      }

      .large-3 {
        width: calc(100%/4);
      }

      .buffer-15 {
        width: 12.5%;
        display: block;
      }
    }


    .area-grid .columns {
      padding: 20px;
    }

    .area-card {
      -webkit-transition: all 0.2s;
      -moz-transition: all 0.2s;
      -o-transition: all 0.2s;
      transition: all 0.2s;
      display: block;
      padding-left: 10px;
      padding-right: 10px;
      height: 160px;
      min-width: 160px;
      line-height: 160px;
      background-color: #F8F8F8;
      color: #424242 !important;
    }
    .area-card:hover {
      background-color: #dfdfdf;
    }

    .area-card .area-card-content {
      display: inline-block;
      vertical-align: middle;
      line-height: normal;
    }

    .area-card .area-card-content .title {
      display: block;
      font-size: 24px;
      line-height: 28px;
      font-weight: 600;
      padding-bottom: 4px;
    }

    .area-card .area-card-content .text {
      font-size: 16px;
      line-height: 20px;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <div class="row">
      <div class="small-offset-1 small-10 columns text-center header">
        <a href="http://www.meuhorarioufba.com.br">
          <img src="images/meuhorario.jpg" alt="meuhorario (logo)"/>
        </a>
      </div>
    </div>

    <div class="row">
      <div class="small-12 columns text-center info-text">
        Escolha a sua área
      </div>
    </div>

    <div class="row area-grid text-center">
      <div class="small-offset-1 small-10 medium-offset-0 medium-4 large-3 columns">
        <a class="area-card text-center" href="http://www.meuhorarioufba.com.br/area/1">
          <div class="area-card-content">
            <span class="title">Área I</span>
            <span class="text">Ciências Físicas, Matemática e Tecnologia</span>
          </div>
        </a>
      </div>

      <div class="small-offset-1 small-10 medium-offset-0 medium-4 large-3 columns">
        <a class="area-card text-center" href="http://www.meuhorarioufba.com.br/area/2">
          <div class="area-card-content">
            <span class="title">Área II</span>
            <span class="text">Ciências Biológicas e Profissões da Saúde</span>
          </div>
        </a>
      </div>

      <div class="small-offset-1 small-10 medium-offset-0 medium-4 large-3 columns">
        <a class="area-card text-center" href="http://www.meuhorarioufba.com.br/area/3">
          <div class="area-card-content">
            <span class="title">Área III</span>
            <span class="text">Filosofia e Ciências Humanas</span>
          </div>
        </a>
      </div>

      <div class="small-offset-1 small-10 medium-offset-0 medium-4 large-3 columns">
        <a class="area-card text-center" href="http://www.meuhorarioufba.com.br/area/4">
          <div class="area-card-content">
            <span class="title">Área IV</span>
            <span class="text">Letras</span>
          </div>
        </a>
      </div>

      <div class="buffer-15 columns show-for-large"></div>

      <div class="small-offset-1 small-10 medium-offset-0 medium-4 large-3 columns">
        <a class="area-card text-center" href="http://www.meuhorarioufba.com.br/area/5">
          <div class="area-card-content">
            <span class="title">Área V</span>
            <span class="text">Artes</span>
          </div>
        </a>
      </div>

      <div class="small-offset-1 small-10 medium-offset-0 medium-4 large-3 columns">
        <a class="area-card text-center" href="http://www.meuhorarioufba.com.br/area/6">
          <div class="area-card-content">
            <span class="title">BI</span>
            <span class="text">Bacharelados Interdisciplinares e Tecnólogos</span>
          </div>
        </a>
      </div>

      <div class="small-offset-1 small-10 medium-offset-4 medium-4 large-offset-0 large-3 columns end">
        <a class="area-card text-center" href="http://www.meuhorarioufba.com.br/area/7">
          <div class="area-card-content">
            <span class="title">Campus Vitória da Conquista</span>
            <span class="text">Instituto Multidisciplinar em Saúde</span>
          </div>
        </a>
      </div>
    </div>
  </div>

  <footer class="footer">
    <div class="row">
      <div class="small-4 columns footer-area text-center">
        <span class="text"><a href="http://www.meuhorarioufba.com.br/contato">Sugestões</a></div>
      <div class="small-4 columns footer-area text-center">
        <span class="text">Este site não tem nenhuma relação com a <a href="https://siac.ufba.br">Matrícula WEB</a>.</span>
      </div>
      <div class="small-4 columns footer-area text-center">
        <span class="text">Visite o MeuHorario <a href="http://meuhorario.dcc.ufba.br/index2.php">original</a>.</span>
      </div>
    </div>
  </footer>
</body>
</html>
