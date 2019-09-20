<?php
require_once("Modelo/ConsultaSitio.php");
$consulta = new ConsultaSitio_Models();
$sitios = $consulta->getconsultaSitio();
?>