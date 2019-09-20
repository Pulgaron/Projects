<?php

  $siglasAct = $_GET["Siglasnew"];
  $nombreAct = $_GET["Nombrenew"];
  $marca = $_GET["Marca"];
  $modelo = $_GET["Modelo"];
  require_once ("../models/centrales.php");
  $actualizar = new Centrales_models();
  $actualizar_motor = $actualizar->actualizar_generador($siglasAct,$nombreAct,$marca,$modelo);

 ?>
