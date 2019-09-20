<?php
    $siglas = $_GET["BuscaCM"];
    require_once("../models/centrales.php");
    $coordenadas = new Centrales_models();
    $lista_coordenadas = $coordenadas->get_coordenadas($siglas);


    ?>