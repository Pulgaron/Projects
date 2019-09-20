<?php

  $siglasAct = $_GET["Siglasnew"];
  $nombreAct = $_GET["Nombrenew"];
  $cantidad = $_GET["Cantidad"];
  $marca = $_GET["Marca"];
  $pos_lib = $_GET["Poslibres"];
  require_once ("../models/centrales.php");
  $actualizar = new Centrales_models();
  $actualizar_tablerocd = $actualizar->actualizar_tablerocd($nombreAct,$siglasAct,$cantidad,$marca,$pos_lib);

?>
