<?php

  $siglasAct = $_GET["Siglasnew"];
  $nombreAct = $_GET["Nombrenew"];
  $cantidad = $_GET["Cantidad"];
  $marca = $_GET["Marca"];
  $modelo = $_GET["Modelo"];
  $cap_kva = $_GET["Capacidad"];
  require_once ("../models/centrales.php");
  $actualizar = new Centrales_models();
  $actualizar_inversores = $actualizar->actualizar_inversores($nombreAct,$siglasAct,$cantidad,$marca,$modelo,$cap_kva);

?>
