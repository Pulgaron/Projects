<?php

  $siglasAct = $_GET["Siglas"];
  $nombreAct = $_GET["Nombre"];
  $nombre_central = $_GET["Nombrenew"];
  $siglas = $_GET["Siglasnew"];
  $tecnologia = $_GET["Tecnologia"];
  $cce = $_GET["CCE"];
  $direccion = $_GET["Direccion"];
  $municipio = $_GET["Municipio"];
  $rpu = $_GET["RPU"];
  $no_medidor = $_GET["No_Medidor"];
  require_once ("../models/centrales.php");
    $actualizar = new Centrales_models();
    $actualizar_datos_general = $actualizar->actualizar_datos_generales($siglasAct,$nombreAct,$nombre_central,$siglas,$tecnologia,$cce,$direccion,$municipio,$rpu,$no_medidor);
?>
