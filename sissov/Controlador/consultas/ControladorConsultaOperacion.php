<?php
$operacioon = $_POST["EstadoOperacion"];
require_once("../../Modelo/ConsultaOperacion.php");
$get = new ConsultaOperacion_Models();
$consultaoperaciones = $get->getOperacion($operacioon);