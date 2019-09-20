<?php

  $siglasAct = $_GET["Siglasnew"];
  $nombreAct = $_GET["Nombrenew"];
  $marca = $_GET["Marca"];
  $modelo = $_GET["Modelo"];
  $capacidad = $_GET["Capacidad"];
  require_once ("../models/centrales.php");
  $actualizar = new Centrales_models();
  $actualizar_generadores = $actualizar->actualizar_generador($siglasAct,$nombreAct,$marca,$modelo,$capacidad);

 ?>
