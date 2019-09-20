<?php

    require_once("../models/centrales.php");
    $centrales = new Centrales_models();
    $lista_cm = $centrales->get_CM();

?>
