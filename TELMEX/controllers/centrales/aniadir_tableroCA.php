<?php

$siglasAct = $_GET["Siglasnew"];
$nombreAct = $_GET["Nombrenew"];
$cantidad = $_GET["CantidadCA"];
$capacidad = $_GET["CapacidadCA"];
$marca = $_GET["MarcaCA"];
$fecha = $_GET["FechaCA"];
$posiciones = $_GET["PosicionesCA"];
$modelo = $_GET["ModeloCA"];
require_once ("../models/centrales.php");
$agregar = new Centrales_models();
$agregar_tableroca = $agregar->insertar_tablero_ca($nombreAct,$siglasAct,$cantidad,$capacidad,$marca,$fecha,$posiciones,$modelo);




 ?>
