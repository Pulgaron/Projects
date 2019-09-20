<?php

    $siglas = $_GET["Siglas"];
    $nombreCentral = $_GET["NombreCentral"];

    require_once("../models/centrales.php");
    $centrales = new Centrales_models();
    $transformador = new Centrales_models();
    $FactorPyC = new Centrales_models();
    $tableroCA = new Centrales_models();
    $generador = new Centrales_models();
    $motor = new Centrales_models();
    $tablerot = new Centrales_models();
    $cargador_bat = new Centrales_models();
    $plantacd = new Centrales_models();
    $rectificadores = new Centrales_models();
    $tablerocd = new Centrales_models();
    $bancos = new Centrales_models();
    $inversores = new Centrales_models();
    $rectificadores_formulas = new Centrales_models();

    $consulta_centrales = $centrales->get_datos_generales($siglas, $nombreCentral);
    $consulta_transformador = $transformador->get_transformador($siglas, $nombreCentral);
    $consulta_FactorPyC = $FactorPyC->get_factorPyC($siglas, $nombreCentral);
    $consulta_tableroCA = $tableroCA->get_tableroCA($siglas, $nombreCentral);
    $consulta_generador = $generador->get_generador($siglas, $nombreCentral);
    $consulta_motor = $motor->get_motor($siglas, $nombreCentral);
    $consulta_tablerot = $tablerot->get_tablero_tra($siglas, $nombreCentral);
    $consulta_cargador_bat = $cargador_bat->get_cargador_bat($siglas, $nombreCentral);
    $consulta_plantacd = $plantacd->get_plantacd($siglas, $nombreCentral);
    $consulta_rectificadores = $rectificadores->get_rectificadores($siglas, $nombreCentral);
    $consulta_tablerocd = $tablerocd->get_tablerocd($siglas, $nombreCentral);
    $consulta_bancos = $bancos->get_bancos($siglas, $nombreCentral);
    $consulta_inversores = $inversores->get_inversores($siglas, $nombreCentral);
    $consulta_rectificadores_formulas = $rectificadores_formulas->get_rectificadores_formulas($siglas,$nombreCentral);
    ?>