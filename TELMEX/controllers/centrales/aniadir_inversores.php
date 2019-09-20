<?php
    $siglasAct = $_GET["Siglasnew"];
    $nombreAct = $_GET["Nombrenew"];
    $cantidad = $_GET["Cantidad"];
    $marca = $_GET["Marca"];
    $capacidad = $_GET["Capacidad"];
    $modelo = $_GET["Modelo"];
    $anio = $_GET["Anio"];
    require_once ("../models/centrales.php");
    $agregar = new Centrales_models();
    $agregar_inv = $agregar->insertar_inversores($nombreAct,$siglasAct,$cantidad,$capacidad,$marca,$modelo,$anio);