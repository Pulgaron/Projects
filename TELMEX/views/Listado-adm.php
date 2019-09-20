<!--Esto es necesario para que no copien el url y pasen xd-->
<?php
session_start();//Reanudar la sesión en el caso de que haya sido iniciada anteriormente
	if (!isset($_SESSION["iduser"])){//Si se almaceno algo en la variable super global
		header("Location:../views/InicioSesion.php");//No hay nada en la variable super global asi que lo redirigimos NO PASAS!
	} else {
		$name = require_once("../controllers/my_data.php");
		$validar = require_once("../controllers/confirma_nivel.php");
		$mandar = strcasecmp($validar, 'A');
	    if ($mandar) {#No vas a pasar hijo, soy un pro XD!!!
	      header("Location:../views/no_found.php");
	      #header("location:https://www.youtube.com/watch?v=dQw4w9WgXcQ");
	    }
	}
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Fuerza | Adm</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <meta name="author" content="Hector Azamar" >
  <link rel="stylesheet"  href="../bootstrap-3.3.7/dist/css/bootstrap.min.css">
  <link rel="stylesheet"  href="../bootstrap-3.3.7/dist/css/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
  <header>
    <div class="contenedor">
      <div class="img">
      </div>
      <div>
        <h1 id="titulo"> Gestor de Fuerza Área Veracruz </h1>
      </div>
      <nav>
        <ul>
          <li class="actual"><a href="Listado-adm.html">Usuarios</a></li>
          <li><a href="Centrales-adm.php">Centrales</a></li>
          <li ><a href="../controllers/cerrar_sesion.php">Cerrar sesion</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <section id="pestania">
    <div class="contenedor">
      <h1 class="centra-inicio">Listado de Usuarios</h1>
    </div>
  </section>
  <br>
  <section class="container">
    <div class="panel panel-default">
      <div class="table-responsive">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
            <table class="table table-bordered table-hover">
              <h3 class="alineacion"> Administradores</h3>
              <tr class="bg-primary">


                <th class="acomoda">Nombre</th>
                <th class="acomoda">Apellido</th>
                <th class="acomoda">Planta</th>
                <th class="acomoda">Apodo</th>
                <th class="acomoda">E-mail</th>

            </tr>

            <?php
            require_once("../controllers/admin/usuarios/otros_administradores.php");
              foreach ($lista_users as $persona):
                if ($persona["Id_usuario"] != $_SESSION["iduser"]) {

            ?>

            <tr>
              <td class="acomoda"><?php echo $persona["Nombre"]; ?></td>
              <td class="acomoda"><?php echo $persona["Apellido"]; ?></td>
                <td class="acomoda"><?php echo $persona["CM"]; ?></td>
              <td class="acomoda"><?php echo $persona["Apodo"]; ?></td>
              <td class="acomoda"><?php echo $persona["Correo"]; ?></td>


            </tr>

            <?php } endforeach; ?>
        </table>
      </form>
      </div>
    </div>
  </section>
  <br>
  <section class="container">
    <div class="panel panel-default">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <h3 class="alineacion">Usuarios </h3>
            <tr class="bg-primary">
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Apodo</th>
              <th>Planta</th>
              <th>Correo</th>
              <th>Suspender Usuario</th>
              <th>Convertir Adm</th>
                <?php
                require_once("../controllers/admin/usuarios/usuarios_registrados.php");
                foreach ($lista_users as $persona):
                ?>
            <tr>
                <td class="acomoda"><?php echo $persona["Nombre"]; ?></td>
                <td class="acomoda"><?php echo $persona["Apellido"]; ?></td>
                <td class="acomoda"><?php echo $persona["Apodo"]; ?></td>
                <td class="acomoda"><?php echo $persona["CM"]; ?></td>
                <td class="acomoda"><?php echo $persona["Correo"]; ?></td>
                <td class="acomoda"><a href="../controllers/admin/usuarios/suspension_temporal.php?Id=<?php echo $persona["Id_usuario"]; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Suspender</a></td>
                <td class="acomoda"><a href="../controllers/admin/usuarios/nuevo_admin.php?Id=<?php echo $persona["Id_usuario"]; ?>" class="btn btn-success"><span class="glyphicon glyphicon-user"></span> Administrador</a></td>

            </tr>
            <?php endforeach ?>

        </table>
      </div>
    </div>
  </section>
  <br>
  <section class="container">
    <div class="panel panel-default">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <h3 class="alineacion">Usuarios Suspendidos</h3>
            <tr class="danger">

              <th>Nombre</th>
              <th>Apellido</th>
              <th>Apodo</th>
              <th>Planta</th>
              <th>Correo</th>
              <th>Activar Moderador</th>
                <?php
                require_once("../controllers/admin/usuarios/usuarios_suspendidos.php");
                foreach ($lista_users as $persona):
                ?>
            <tr>
                <td class="acomoda"><?php echo $persona["Nombre"]; ?></td>
                <td class="acomoda"><?php echo $persona["Apellido"]; ?></td>
                <td class="acomoda"><?php echo $persona["Apodo"]; ?></td>
                <td class="acomoda"><?php echo $persona["CM"]; ?></td>
                <td class="acomoda"><?php echo $persona["Correo"]; ?></td>
                <td class="acomoda"><a href="../controllers/admin/usuarios/reactivar_usuario.php?Id=<?php echo $persona["Id_usuario"]; ?>" class="btn btn-success"><span class="glyphicon glyphicon-user"></span> Reactivar</a></td>

            </tr>
            <?php endforeach ?>
        </table>
      </div>
    </div>
  </section>
  <br>
  <section class="container">
    <div class="panel panel-default">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <h3 class="alineacion">Usuarios Pendientes</h3>
            <tr class="danger">

              <th>Nombre</th>
              <th>Apellido</th>
              <th>Apodo</th>
              <th>Planta</th>
              <th>Correo</th>
              <th>Rechazar Usuario</th>
              <th>Aceptar Usuario</th>
                <?php
                require_once("../controllers/admin/usuarios/usuarios_pendientes.php");
                foreach ($lista_users as $persona):
                ?>
            <tr>
                <td class="acomoda"><?php echo $persona["Nombre"]; ?></td>
                <td class="acomoda"><?php echo $persona["Apellido"]; ?></td>
                <td class="acomoda"><?php echo $persona["Apodo"]; ?></td>
                <td class="acomoda"><?php echo $persona["CM"]; ?></td>
                <td class="acomoda"><?php echo $persona["Correo"]; ?></td>
                <td class="acomoda"><a href="../controllers/admin/usuarios/rechazar_usuario.php?Id=<?php echo $persona["Id_usuario"]; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Denegar</a></td>
                <td class="acomoda"><a href="../controllers/admin/usuarios/aceptar_usuario.php?Id=<?php echo $persona["Id_usuario"]; ?>" class="btn btn-success"><span class="glyphicon glyphicon-user"></span> Aceptar</a></td>

            </tr>
            <?php endforeach ?>
        </table>
      </div>
    </div>
  </section>


<footer>
  <p>SISTEMA GESTOR DE CENTRALES DEL AREA DE FUERZA, COPYRIGHT &copy 2018 | TELMEX</p>
</footer>

</body>
</html>
