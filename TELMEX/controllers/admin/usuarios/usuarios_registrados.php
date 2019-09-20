<?php



	require_once("../models/usuarios.php");
	$users = new Usuarios_Models();
	$lista_users = $users->get_usuarios("U");
 ?>

