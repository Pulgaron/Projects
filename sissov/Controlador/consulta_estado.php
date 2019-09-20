<?php
require_once("Modelo/ConsultaEstado.php");
$consulta = new ConsultaEstado_Models();
$estados = $consulta->getEstado();
?>