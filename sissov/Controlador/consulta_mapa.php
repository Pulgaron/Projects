<?php
$state = $_GET['Estado'];
$regiion = $_GET['Region'];
$munic = $_GET['Municipio'];

if ($state && $regiion=='0' && $munic=='0') {
    require_once("Modelo/coordenadas.php");
    $consulta = new coordenadasModel();
    $coordenadas = $consulta->getcoordenadas_estado($state);
}
elseif ($state && $regiion && $munic=='0') {
    require_once("Modelo/coordenadas.php");
    $consulta = new coordenadasModel();
    $coordenadas = $consulta->getcoordenadas_region($regiion);
}
elseif($state && $regiion=='0' && $munic){
    require_once("Modelo/coordenadas.php");
    $consulta = new coordenadasModel();
    $coordenadas = $consulta->getcoordenadas_municipio($munic);
}else{
    require_once("Modelo/coordenadas.php");
    $consulta = new coordenadasModel();
    $coordenadas = $consulta->getcoordenadas_municipio($munic);
}
