<?php
    $clave = $_GET["BuscaCM"];
    require_once("../models/centrales.php");
    $centrales = new Centrales_models();
    $lista_centrales = $centrales->get_names($clave);

?>