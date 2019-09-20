<?php
$md = $_GET["depositante"];
require_once("../Modelo/ConsultaMunicDepositantes.php");
$get = new ConsultaMunicDepositates_Models();
$depositantes = $get->getconsultaDepositantes($md);
