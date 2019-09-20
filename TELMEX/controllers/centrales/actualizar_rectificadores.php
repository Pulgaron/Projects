<?php

  $siglasAct = $_GET["Siglasnew"];
  $nombreAct = $_GET["Nombrenew"];
  $cantidad = $_GET["Cantidad"];
  $modelo = $_GET["Modelo"];
  $capacidad = $_GET["Capacidad"];
  require_once ("../models/centrales.php");
  $actualizar = new Centrales_models();
  $actualizar_rectificadores = $actualizar->actualizar_rectificadores($nombreAct,$siglasAct,$cantidad,$modelo,$capacidad);

?>
