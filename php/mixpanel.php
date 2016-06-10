<?php

$horarios = array(
  'SEG7', 'SEG8', 'SEG9', 'SEG10', 'SEG11', 'SEG12', 'SEG13', 'SEG14', 'SEG15','SEG16', 'SEG17', 'SEG18', 'SEG19', 'SEG20', 'SEG21', 'SEG22', 'SEG23',
  'TER7', 'TER8', 'TER9', 'TER10', 'TER11', 'TER12', 'TER13', 'TER14', 'TER15','TER16', 'TER17', 'TER18', 'TER19', 'TER20', 'TER21', 'TER22', 'TER23',
  'QUA7', 'QUA8', 'QUA9', 'QUA10', 'QUA11', 'QUA12', 'QUA13', 'QUA14', 'QUA15','QUA16', 'QUA17', 'QUA18', 'QUA19', 'QUA20', 'QUA21', 'QUA22', 'QUA23',
  'QUI7', 'QUI8', 'QUI9', 'QUI10', 'QUI11', 'QUI12', 'QUI13', 'QUI14', 'QUI15','QUI16', 'QUI17', 'QUI18', 'QUI19', 'QUI20', 'QUI21', 'QUI22', 'QUI23',
  'SEX7', 'SEX8', 'SEX9', 'SEX10', 'SEX11', 'SEX12', 'SEX13', 'SEX14', 'SEX15','SEX16', 'SEX17', 'SEX18', 'SEX19', 'SEX20', 'SEX21', 'SEX22', 'SEX23',
  'SAB7', 'SAB8', 'SAB9', 'SAB10', 'SAB11', 'SAB12', 'SAB13', 'SAB14', 'SAB15','SAB16', 'SAB17', 'SAB18', 'SAB19', 'SAB20', 'SAB21', 'SAB22', 'SAB23'
);


function track_home() {
  echo <<<FIM
<script type='text/javascript'>
  mixpanel.track('Acessou a home');
</script>
FIM;
}


function track_siac() {
  echo <<<FIM
<script type='text/javascript'>
  mixpanel.track_links('#anchorSiac', 'Acessou o Siac');
</script>
FIM;
}


function track_selecionou_curso($cod_curso, $curso) {
  echo <<<FIM
<script type='text/javascript'>
  var cursoInfo = {
    'cod_curso': '$cod_curso',
    'nome_curso': '$curso->nome',
  }
  mixpanel.track('Selecionou curso', cursoInfo);
</script>
FIM;
}


function track_gerou_horario($request, $curso) {
  global $horarios;
  $cod_curso = $request['curso'];
  $selected = array_keys($request, 'on');

  $cod_materias = array();
  $nome_materias = array();
  $cod_turmas = array();
  foreach ($curso->listaDeMaterias as $i => $materia) {
    array_push($cod_materias, $materia->codigo);
    array_push($nome_materias, $materia->nome);

    $cod_turmas_materia = array();
    foreach ($materia->listaDeTurmas as $i => $turma) {
      array_push($cod_turmas_materia, $turma->codigo);
    }
    array_push($cod_turmas, '["' . implode('","', $cod_turmas_materia) . '"]');
  }
  $cod_materias = '["' . implode('","', $cod_materias) . '"]';
  $nome_materias = '["' . implode('","', $nome_materias) . '"]';
  $cod_turmas = '[' . implode(',', $cod_turmas) . ']';

  $min_turmas = in_array('subconjuntos', $selected) ? $request['minimoTurmas'] : 0;
  $impressao = in_array('impressao', $selected) ? 'true' : 'false';
  $conflitos = in_array('mostraConflito', $selected) ? 'true' : 'false';
  $carrascos = $request['carrascos'] ? '["' . str_replace("\r\n", '","', $request['carrascos']) . '"]' : '';

  $rest_horario = array();
  foreach ($selected as $i => $s) {
    if (in_array($s, $horarios)) array_push($rest_horario, $s);
  }
  $rest_horario = empty($rest_horario) ? '' : '["' . implode('","', $rest_horario) . '"]';

  echo <<<FIM
<script type='text/javascript'>
  var horariosInfo = {
    'cod_curso': '$cod_curso',
    'nome_curso': '$curso->nome',
    'cod_materias': '$cod_materias',
    'nome_materias': '$nome_materias',
    'cod_turmas': '$cod_turmas',
    'min_turmas': $min_turmas,
    'impressao': '$impressao',
    'conflitos': '$conflitos',
    'carrascos': '$carrascos',
    'restricoes_horario': '$rest_horario'
  }
  mixpanel.track('Gerou horarios', horariosInfo);
</script>
FIM;
}


function mixpanel_footer() {
  echo <<<FIM
<p>
  Este site exporta dados an&ocirc;nimos de uso para o Mixpanel.
  <a href="https://mixpanel.com/f/partner" rel="nofollow"><img src="//cdn.mxpnl.com/site_media/images/partner/badge_light.png" alt="Mobile Analytics" /></a>
</p>
FIM;
}

?>
