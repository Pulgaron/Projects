<?php

$siglasAct = $_GET["Siglasnew"];
$nombreAct = $_GET["Nombrenew"];
$tipo = $_GET["Tipo"];
$marca = $_GET["Marca"];
$capacidad = $_GET["Capacidad"];
$anio = $_GET["Año"];
require_once ("../models/centrales.php");
$actualizar = new Centrales_models();
$actualizar_transformadores = $actualizar->actualizar_datos_transformador($nombreAct,$siglasAct , $tipo, $marca, $capacidad, $anio);

?>
