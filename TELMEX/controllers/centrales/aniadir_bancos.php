<?php
    $siglasAct = $_GET["Siglasnew"];
    $nombreAct = $_GET["Nombrenew"];
    $cantidad = $_GET["Cantidad"];
    $marca = $_GET["Marca"];
    $barra = $_GET["Barra"];
    $anio = $_GET["Anio"];
    $modelo = $_GET["Modelo"];
    $celdas = $_GET["Celdas"];
    $cap_ah = $_GET["Cap_AH"];
    require_once ("../models/centrales.php");
    $agregar = new Centrales_models();
    $agregar_bancos = $agregar->insertar_bancos($nombreAct,$siglasAct,$cantidad,$marca,$barra,$modelo,$anio,$celdas,$cap_ah);