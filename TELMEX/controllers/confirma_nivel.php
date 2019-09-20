<?php
	require_once("../models/usuarios.php");
	$user = new Usuarios_Models();
	return $user->estado_organigrama($_SESSION["iduser"]);
 ?>
