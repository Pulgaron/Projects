<?php
$siglas = $_GET["BuscaCM"];
$nombreCentral = $_GET["Central"];
require_once("../models/centrales.php");
$coordenadas_central = new Centrales_models();
$lista_coordenadas_central = $coordenadas_central->get_coordenadas_central($siglas,$nombreCentral);


?>