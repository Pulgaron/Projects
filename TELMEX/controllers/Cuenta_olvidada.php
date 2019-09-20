<?php 
	
	try {
		$Correo = htmlentities(addslashes($_POST["Correo"]));
		require_once("../models/usuarios.php");
	  	$user = new Usuarios_Models();
		$datos = $user->olvide_cuenta($Correo);
		$bandera = false;
		foreach ($datos as $apunta) {
			$id = $apunta['Id_usuario'];
			$name = $apunta['Nombre'];
			$lastname = $apunta['Apellido'];
			$apodo = $apunta['Apodo'];
			$bandera = true;
		}
		$codigo = rand(100000, 999999);
		if ($bandera) {//Si es igual a true entra!
			$modifica_olvido = new Usuarios_Models();
			$modifica_olvido->add_clave_olvido($id,$codigo);
			
			$texto_mail = "Hola! " . $name . " " . $lastname . "\nAlias: " . $apodo . "\nLamentamos que tengas problemas para acceder a tu cuenta\nUsa el siguiente codigo: " . $codigo . "\nSi no tienes problema para acceder, omite este mensaje\n\nSi necesitas ayuda en algo mas no dudes en ponerte en contacto con: soportecentralesfuerza@gmail.com";
			$destinatario = htmlentities(addslashes($_POST["Correo"]));
			$asunto = "Recuperar cuenta!";
			$headers = "MIME-Version: 1.0\r\n";
			// .= es para concatenar
			$headers .= "Content_type: text/html; charse=iso-8859-1\r\n";
			$headers .= "From: Oscar&Hector < soportecentralesfuerza@gmail.com >";
			$exito = mail($destinatario,$asunto,$texto_mail,$headers);
			if ($exito) { //==true
				echo "Mensaje enviado!";
				header("Location:../Ncontraseña.html");
			}else {
				echo "Su mensaje no se envio, verifique su cuenta de correo...";
			}
		}else {
			echo "El correo no esta registrado!";
		}
	} catch (Exception $e) {

		echo "Línea del error: " . $e->getLine() . "<br>";
		echo 'Excepción capturada: ',  $e->getMessage(), "\n";
	}

 ?>