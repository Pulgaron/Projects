<?php

  $name = htmlentities(addslashes($_POST["usuario"]));
  $contrasenia = htmlentities(addslashes($_POST["contra"]));
  require_once("../models/usuarios.php");
  $user = new Usuarios_Models();
  $valor = $user->busca_usuario_registrado($name,$contrasenia);
  if ($valor > 0) {
  	echo $valor;
    $estado = $user->estado_organigrama($valor);
    echo $estado;
    session_start();//Si el usuario existe en la bd crea una sesión
    $_SESSION["iduser"] = $valor;
    $mandar = strcasecmp($estado, 'A');
    if (!$mandar) {
      header("location:../views/Listado-adm.php");
    } else {
      header("location:../views/inicio_view.php");
    }
   # header("location:../views/vista_admin.php");
  }
  elseif ($valor == -1) {
  	header("location: ../views/InicioSesion.php");
  }
  else {
    ?>

    <?php
    #require_once("../login.html");
    header("location: ../views/InicioSesion.php");
  }
 ?>
