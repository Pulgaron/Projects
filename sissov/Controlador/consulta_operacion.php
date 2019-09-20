<?php
require_once("Modelo/ConsultaOperacion.php");
$consulta = new ConsultaOperacion_Models();
$operaciones = $consulta->getOperacion();
?>