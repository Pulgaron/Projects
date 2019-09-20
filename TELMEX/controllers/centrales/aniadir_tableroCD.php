<?php

    $siglasAct = $_GET["Siglasnew"];
    $nombreAct = $_GET["Nombrenew"];
    $cantidad = $_GET["Cantidad"];
    $marca = $_GET["Marca"];
    $modelo = $_GET["Modelo"];
    $posiciones = $_GET["Posiciones"];
    require_once ("../models/centrales.php");
    $agregar = new Centrales_models();
    $agregar_tablerocd = $agregar->insertar_tablero_cd($nombreAct,$siglasAct,$cantidad,$posiciones,$marca,$modelo);