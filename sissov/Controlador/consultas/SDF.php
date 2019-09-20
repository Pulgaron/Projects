<?php
require_once("Modelo/ConsultaSitio.php");
$get = new ConsultaSitio_Models();

$consultasitiosSDF = $get->getconsultaTotalSDF();

$consultasitiosRS = $get->getconsultaTotalRS();

$consultasitiosRSP = $get->getconsultaTotalRSP();

$consultasitiosSC = $get->getconsultaTotalSC();

$consultasitiosTCA = $get->getconsultaTotalTCA();

$consultasitiosTCAP = $get->getconsultaTotalTCAP();

$consultasitiosTC = $get->getconsultaTotalTC();

$consultasitiosTCo = $get->getconsultaTotalTCo();

$consultasitiosTCP = $get->getconsultaTotalTCP();

$consultasitiosTSC = $get->getconsultaTotalTSC();