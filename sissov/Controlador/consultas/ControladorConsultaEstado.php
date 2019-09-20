<?php
$estado = $_POST["Estado"];
require_once("../../Modelo/ConsultaEstado.php");
$get = new ConsultaEstado_Models();
$consultaestados = $get->getconsultaEstado($estado);

