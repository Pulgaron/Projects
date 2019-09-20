<?php 	
	/**
		Desarrollado por:
			** @autor: DKL&Derek
			* @Sub-Autor: Pedro Ortiz Luis Roberto
  	*/

  	$codigo = htmlentities(addslashes($_POST["Code"]));
  	$contrasenia = htmlentities(addslashes($_POST["Contra"]));
	require_once("../models/usuarios.php");
	$modifica_olvido = new Usuarios_Models();
	$bandera = 0;
	$bandera = $modifica_olvido->cambiar_contra($contrasenia,$codigo);
	if ($bandera > 0) {
		echo "Se cambio con exito!";
		#Una ves cambiada la contraseña el código debe matarse! para mayor seguridad :)!
		require_once("../models/usuarios.php");
		$modifica_olvido = new Usuarios_Models();
		$id = $DKL_bandera;
		$modifica_olvido->add_clave_olvido($id,'');
		header("Location:../login.html");

	}else {#Falta una alerta! y que redireccione a login
		echo "El código es erroneo!, solicite otro!";
		header("Location:../InicioSesion.php");
	}

 ?>