<?php

session_start();//Reanudar la sesión en el caso de que haya sido iniciada anteriormente
	if (!isset($_SESSION["iduser"])){//Si se almaceno algo en la variable super global
		header("Location:views/InicioSesion.php");//No hay nada en la variable super global asi que lo redirigimos NO PASAS!
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

   if(isset($_GET["BuscaCM"])) {

       $cm = $_GET["BuscaCM"];
       require_once("../js/main.php");
       require_once("../controllers\centrales\coordenadas.php");
       $lista_coordenadas =json_encode($lista_coordenadas, true);
       echo '<div id="lista_coordenadas">'. $lista_coordenadas . '</div>';
   }





?>


<!DOCTYPE html>
<html>
<head>
	<title>Fuerza | Inicio</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet"  href="../bootstrap-3.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet"  href="../bootstrap-3.3.7/dist/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../select/css/select2.css">
	<script src="../jquery/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="../select/js/select2.js"></script>
    <script src="../bootstrap-3.3.6/js/bootstrap.min.js"></script>
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
					<li class="actual"><a href="index.html">Inicio</a></li>
					<li ><a href="../views/Centrales-adm.php">Centrales</a></li>
					<li ><a href="../controllers/cerrar_sesion.php">Cerrar sesion</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<section id="pestania">
		<div class="contenedor">
			<h1 class="centra-inicio">Ubicación Física de Centrales Telefónicas</h1>
		</div>
	</section>
	<br>
	<section>
        <form action="../views/inicio_view_central.php" method="get">
            <input type="hidden" name="BuscaCM"  value="<?php if(isset($_GET["BuscaCM"])): echo $cm; endif;?>">
			<button class="btn btn-info al-but">Buscar</button>
		<div class="container filtro">

            <div class="form-group">
                <label for="example-date-input" class="col-2 col-form-label">Seleccione Central:</label>
                <select name="Central" class="form-control" id="mibuscar">
                    <option>Seleccionar...</option>
                    <?php

                    require_once ("../controllers/centrales/nombre_centrales_inicio.php");
                    foreach ($lista_centrales as $centrales):
                        ?>
                        <option value="<?php echo $centrales["Nombre_central"]; ?>"><?php echo  $centrales["Nombre_central"]  ?> </option>
                    <?php endforeach ?>
                </select>

			 </div>

		</div>
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
			<button class="btn btn-info al-but" >Buscar</button>
		<div class="container filtro">
			<label for="example-date-input" class="col-2 col-form-label">Seleccione CM:</label>
		    	<select class="form-control" name = "BuscaCM">
                    <option>Seleccionar...</option>
                    <?php
                    require_once("../controllers/centrales/centrales_controller.php");
                    foreach ($lista_cm as $centrales):
                    ?>
                    <option value="<?php echo $centrales["Clave_Cm"]; ?>"><?php echo  $centrales["Nombre_Cm"]  ?> </option>
                    <?php endforeach ?>
				</select>
		</div>
        </form>

	</section>
    <?php

    ?>
	<br>
	<br>
	<br>

    <div id="map" class="container">


    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDopHp5KqbnZpXuAz7jCNB6qqIQRnzCt98&callback=initMap">
    </script>
	</div>


<footer>
	<p>SISTEMA GESTOR DE CENTRALES DEL AREA DE FUERZA, COPYRIGHT &copy 2018 | TELMEX</p>
</footer>

</body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('#mibuscar').select2();
    });
</script>
