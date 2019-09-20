<?php

  $siglasAct = $_GET["Siglasnew"];
  $nombreAct = $_GET["Nombrenew"];
  $cantidad = $_GET["Cantidad"];
  $celdasxbancos = $_GET["Celdaxbancos"];
  $marca = $_GET["Marca"];
  $modelo = $_GET["Modelo"];
  $capacidadah = $_GET["Capacidad"];
  $anio = $_GET["anio"];
  $respaldo = $_GET["Respaldo"];
  $barra_antisismica = $_GET["Barra_Antisismica"];
  require_once ("../models/centrales.php");
  $actualizar = new Centrales_models();
  $actualizar_bancos = $actualizar->actualizar_bancos($nombreAct,$siglasAct,$cantidad,$celdasxbancos,$marca,$modelo,$capacidadah,$anio,$respaldo,$barra_antisismica);

?>
