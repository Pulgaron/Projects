<?php
require_once("Modelo/ConsultaSitio.php");
$get = new ConsultaSitio_Models();

$consultasitiosSDF = $get->getconsultaTotalSDF();