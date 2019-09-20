<?php

  $siglasAct = $_GET["Siglasnew"];
  $nombreAct = $_GET["Nombrenew"];
  $cantidad = $_GET["Cantidad"];
  $capacidad = $_GET["Capacidad"];
  $marca = $_GET["Marca"];
  $fecha = $_GET["Fecha"];
  $posiciones = $_GET["Posiciones"];
  $modelo = $_GET["Modelo"];
  require_once ("../models/centrales.php");
  $actualizar = new Centrales_models();
  $actualizar_tableroca = $actualizar->actualizar_tablero_ca($nombreAct,$siglasAct,$cantidad,$capacidad,$marca,$fecha,$posiciones,$modelo);

 ?>
