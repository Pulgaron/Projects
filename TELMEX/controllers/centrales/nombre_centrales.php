<?php
$clave = $_GET["Siglas"];
require_once("../models/centrales.php");
$centrales = new Centrales_models();
$lista_centrales = $centrales->get_names($clave);

?>