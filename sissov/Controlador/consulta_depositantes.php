<?php
$md = $_POST["Municdepos"];
require_once("Modelo/ConsultaMunicDepositantes.php");
$consulta = new ConsultaMunicDepositates_Models();
$depositantes = $consulta->getconsultaDepositantes($md);