<?php

  $siglasAct = $_GET["Siglasnew"];
  $nombreAct = $_GET["Nombrenew"];
  $marca = $_GET["Marca"];
  $modelo = $_GET["Modelo"];
  $anio = $_GET["Anio"];
  require_once ("../models/centrales.php");
  $actualizar = new Centrales_models();
  $actualizar_plantacd = $actualizar->actualizar_plantacd($nombreAct,$siglasAct,$marca,$modelo,$anio);

?>
