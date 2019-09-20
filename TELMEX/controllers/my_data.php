<?php

	require_once("../models/usuarios.php");
	$user = new Usuarios_Models();
	$datos = $user->my_data($_SESSION["iduser"]);
	foreach ($datos as $usuario) {
		$name = $usuario["Nombre"] . " " . $usuario["Apellido"];
	}
	return $name;
 ?>
