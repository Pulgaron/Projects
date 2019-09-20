<?php
$siglas = $_GET["Siglas"];
require_once("../models/centrales.php");
$comentario = new Centrales_models();
$lista_comentarios = $comentario->get_comentario($siglas);

?>