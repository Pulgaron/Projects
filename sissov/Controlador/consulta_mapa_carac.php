<?php
$state = $_GET['Estado'];
$tipositio = $_GET['Tipo'];
$edo_operacion = $_GET['Operacion'];
$toneladas = $_GET['Toneladas'];
$anios = $_GET['Anios'];

if ($state && $tipositio=='0' && $edo_operacion=='0' && $toneladas=='0' && $anios=='0') {
    require_once("Modelo/coordenadas_carac.php");
    $consulta = new coordenadasCaracModel();
    $coordenadas = $consulta->getcoordenadas_estado($state);
}

elseif ($state && $tipositio && $edo_operacion=='0' && $toneladas=='0' && $anios=='0') {
    require_once("Modelo/coordenadas_carac.php");
    $consulta = new coordenadasCaracModel();
    $coordenadas = $consulta->getcoordenadas_estado_tipositio($state, $tipositio);
}

elseif($state && $tipositio && $edo_operacion && $toneladas=='0' && $anios=='0') {
    require_once("Modelo/coordenadas_carac.php");
    $consulta = new coordenadasCaracModel();
    $coordenadas = $consulta->getcoordenadas_estado_tipositio_estadooperacion($state, $tipositio, $edo_operacion);
}

elseif($state && $tipositio =='0' && $edo_operacion && $toneladas=='0' && $anios=='0') {
    require_once("Modelo/coordenadas_carac.php");
    $consulta = new coordenadasCaracModel();
    $coordenadas = $consulta->getcoordenadas_estado_estadooperacion($state, $edo_operacion);
}

elseif($state && $tipositio  && $edo_operacion && $toneladas && $anios=='0') {
    require_once("Modelo/coordenadas_carac.php");
    $consulta = new coordenadasCaracModel();
    $coordenadas = $consulta->getcoordenadas_estado_tipositio_estadooperacion_toneladas($state , $tipositio, $edo_operacion, $toneladas);
}

elseif($state && $tipositio == '0'  && $edo_operacion =='0' && $toneladas && $anios=='0') {
    require_once("Modelo/coordenadas_carac.php");
    $consulta = new coordenadasCaracModel();
    $coordenadas = $consulta->getcoordenadas_estado_toneladas($state , $toneladas);
}

elseif($state && $tipositio && $edo_operacion =='0' && $toneladas && $anios=='0') {
    require_once("Modelo/coordenadas_carac.php");
    $consulta = new coordenadasCaracModel();
    $coordenadas = $consulta->getcoordenadas_estado_tipositio_toneladas($state ,$tipositio, $toneladas);
}

elseif($state && $tipositio == '0'  && $edo_operacion && $toneladas && $anios=='0') {
    require_once("Modelo/coordenadas_carac.php");
    $consulta = new coordenadasCaracModel();
    $coordenadas = $consulta->getcoordenadas_estado_estadooperacion_toneladas($state ,$edo_operacion, $toneladas);
}

elseif($state && $tipositio == '0'  && $edo_operacion == '0' && $toneladas == '0' && $anios) {
    require_once("Modelo/coordenadas_carac.php");
    $consulta = new coordenadasCaracModel();
    $coordenadas = $consulta->getcoordenadas_estado_anios($state ,$anios);
}


elseif($state && $tipositio && $edo_operacion && $toneladas && $anios) {
    require_once("Modelo/coordenadas_carac.php");
    $consulta = new coordenadasCaracModel();
    $coordenadas = $consulta->getcoordenadas_estado_tipositio_estadooperacion_toneladas_anios($state,$tipositio,$edo_operacion, $toneladas ,$anios);
}

elseif($state && $tipositio == '0' && $edo_operacion && $toneladas && $anios) {
    require_once("Modelo/coordenadas_carac.php");
    $consulta = new coordenadasCaracModel();
    $coordenadas = $consulta->getcoordenadas_estado_estadooperacion_toneladas_anios($state,$edo_operacion, $toneladas ,$anios);
}

elseif($state && $tipositio && $edo_operacion=='0' && $toneladas && $anios) {
    require_once("Modelo/coordenadas_carac.php");
    $consulta = new coordenadasCaracModel();
    $coordenadas = $consulta->getcoordenadas_estado_tipositio_toneladas_anios($state,$tipositio, $toneladas ,$anios);
}

elseif($state && $tipositio && $edo_operacion && $toneladas == '0' && $anios) {
    require_once("Modelo/coordenadas_carac.php");
    $consulta = new coordenadasCaracModel();
    $coordenadas = $consulta->getcoordenadas_estado_tipositio_estadooperacionanios($state,$tipositio,$edo_operacion ,$anios);
}

elseif($state && $tipositio && $edo_operacion=='0' && $toneladas == '0' && $anios) {
    require_once("Modelo/coordenadas_carac.php");
    $consulta = new coordenadasCaracModel();
    $coordenadas = $consulta->getcoordenadas_estado_tipositio_anios($state,$tipositio,$anios);
}

elseif($state && $tipositio == '0' && $edo_operacion =='0' && $toneladas && $anios) {
    require_once("Modelo/coordenadas_carac.php");
    $consulta = new coordenadasCaracModel();
    $coordenadas = $consulta->getcoordenadas_estado_toneladas_anios($state, $toneladas ,$anios);
}

elseif($state && $tipositio == '0' && $edo_operacion && $toneladas =='0' && $anios) {
    require_once("Modelo/coordenadas_carac.php");
    $consulta = new coordenadasCaracModel();
    $coordenadas = $consulta->getcoordenadas_estado_estadooperacion_anios($state,$edo_operacion ,$anios);
}