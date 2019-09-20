<?php
	$siglasAct = $_POST["Siglasnew"];
	$nombreAct = $_POST["Nombrenew"];
	$usuario = $_POST["usuario"];
    $central = $_POST["central"];
    $cm = $_POST["cm"];
    $mensaje = $_POST["mensaje"];
    require_once ("../models/centrales.php");
    $actualizar = new Centrales_models();
    $actualizar_comentario = $actualizar->actualizar_comentario($nombreAct,$usuario,$central,$cm,$mensaje);
