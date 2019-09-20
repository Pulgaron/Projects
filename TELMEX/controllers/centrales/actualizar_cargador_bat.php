<?php

  $siglasAct = $_GET["Siglasnew"];
  $nombreAct = $_GET["Nombrenew"];
  $marca = $_GET["Marca"];
  $modelo = $_GET["Modelo"];
  $anio = $_GET["Anio"];
  $cantidad = $_GET["Cantidad"];
  $voltaje = $_GET["Voltaje"];
  require_once ("../models/centrales.php");
  $actualizar = new Centrales_models();
  $actualizar_tablerot = $actualizar->actualizar_cargador_bat($nombreAct,$siglasAct,$marca,$modelo,$anio,$cantidad,$voltaje);

?>
