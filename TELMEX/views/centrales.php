<?php

session_start();//Reanudar la sesión en el caso de que haya sido iniciada anteriormente
	if (!isset($_SESSION["iduser"])){//Si se almaceno algo en la variable super global
		header("Location:../views/InicioSesion.php");//No hay nada en la variable super global asi que lo redirigimos NO PASAS!
	} else {
		$name = require_once("../controllers/my_data.php");
		$validar = require_once("../controllers/confirma_nivel.php");
		$mandar = strcasecmp($validar, 'A');
		$mandar1 = strcasecmp($validar, 'U');
	    if ($mandar) {
				if ($mandar1) {
					header("Location:../views/no_found.php");
				}

	    }

	}

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Fuerza | Centrales</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
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
        <h1 id="titulo">Gestor de Fuerza Área Veracruz  </h1>
      </div>
      <nav>
        <ul>
          <li ><a href="../views/inicio_view.php">Inicio</a></li>
          <li class="actual"><a href="../views/centrales.php">Centrales</a></li>
          <li ><a href="../controllers/cerrar_sesion.php">Cerrar sesion</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <section id="pestania">
    <div class="contenedor">
      <h1 class="centra-inicio">Centrales</h1>
    </div>
  </section>
  <br>
  <br>
	<section class="container">
<div class="panel panel-default">
	<div class="table-responsive">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
				<table class="table table-bordered table-hover">
					<h3 class="alineacion"> Centrales</h3>
						<br>
						<tr class="bg-primary">

							<th>Centro de Mantenimiento</th>
							<th>Información</th>
							<th>Modificar</th>
               <th>Actualizaciones</th>
						</tr>
						<?php
           ;
						require_once("../controllers/centrales/centrales_controller.php");
            require_once("../controllers/cm.php");
						foreach ($lista_cm as $centrales):
								?>
								<tr>

										<td class="acomoda"><?php echo $centrales["Nombre_Cm"]; ?></td>
										
                    <td class="acomoda"><a href="../views/info-centrales.php?Siglas=<?php echo $centrales["Clave_Cm"];?>" class="btn btn-success"><span class="glyphicon glyphicon-eye-open" ></span> Ver</a></td>
										

                    <?php  if($mostrar1 == $centrales["Clave_Cm"] ):?>
                      <td class="acomoda"><a href="../views/info-centrales-edit.php?Siglas=<?php echo $centrales["Clave_Cm"];?> " class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Editar</a></td>
                      <?php else:?>
                      <td class="acomoda"><a class="btn btn-warning" disabled = "disabled"><span class="glyphicon glyphicon-ed it"></span>Editar</a></td>
                    <?php endif;?>
                    <td><a href="../views/actualizaciones.php?Siglas=<?php echo $centrales["Clave_Cm"];?>" class="btn btn-success"><span class="glyphicon glyphicon-upload"> Visualizar</span></a></td>

								</tr>
						<?php endforeach ?>
				</table>
			</form>
	</div>
</div>
</section>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
<footer>
  <p>SISTEMA GESTOR DE CENTRALES DEL AREA DE FUERZA, COPYRIGHT &copy 2018 | TELMEX</p>
</footer>

</body>
</html>
