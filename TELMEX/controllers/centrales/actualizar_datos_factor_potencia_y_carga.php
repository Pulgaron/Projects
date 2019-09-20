<?php

  $siglasAct = $_GET["Siglasnew"];
  $nombreAct = $_GET["Nombrenew"];
  $factorP = $_GET["FactorP"];
  $int = $_GET["INT"];
  $ext = $_GET["EXT"];
  require_once ("../models/centrales.php");
  $actualizar = new Centrales_models();
  $actualizar_factor_potencia = $actualizar->actualizar_datos_factor_p($nombreAct,$siglasAct,$factorP,$int,$ext);

 ?>
