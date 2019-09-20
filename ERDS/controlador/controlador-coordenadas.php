<?php
//require_once($_SERVER["DOCUMENT_ROOT"]."/sgisv/ERDS/modelo/consulta_coordenadas.php");
require_once("../modelo/consulta_coordenadas.php");
$coor = new coordenadas_prueba();
$lista_coordenadas = $coor->get_coord();
?>