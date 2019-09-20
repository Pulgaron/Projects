<!DOCTYPE html>
<html>
<head>
	<title>Fuerza | Inicio Sesión</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="Diseño y Desarrollo Web">
	<meta name="keywords" content="diseño web, desarrollo web, seo, posicionamiento web">
	<meta name="author" content="Hector Azamar">
	<link rel="stylesheet"  href="../bootstrap-3.3.7/dist/css/bootstrap.min.css">
  <link rel="stylesheet"  href="../bootstrap-3.3.7/dist/css/bootstrap-theme.min.css">	
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	 <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
	<header>
		<div class="contenedor">
			<div class="img">
			</div>
			<div>
				<h1 id="titulo">Gestor de Fuerza Área Veracruz </h1>
			</div>
		</div>
	</header>
	<section id="pestania">
		<div class="contenedor">
			<h1 class="centra-inicio">Iniciar Sesión</h1>
		</div>
	</section>
           <div id="Contenedor">
            <div class="Icon">
                <span class="glyphicon glyphicon-user"></span> <!--Icono de usuario-->
            </div>
            <div class="ContentForm">
                <form action="../controllers/Ingresar.php" method="post" name="FormEntrar">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" name="usuario" placeholder="Usuario" id="usuario" aria-describedby="sizing-addon1" required>
                    </div>
                        <br>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="password" name="contra" class="form-control" placeholder="Contraseña" aria-describedby="sizing-addon1" required>
                            </div>
                        <br>
                    <button class="btn btn-lg btn btn-primary btn-block btn-primary" id="IngresoLog" type="submit">Iniciar Sesión</button>
                    <div class="opcioncontra">

                        <br>
                        <a href="../views/registro.html">Registrarse</a>
                    </div>
                </form>
            </div>
         </div>


<footer>
	<p>SISTEMA GESTOR DE CENTRALES DEL AREA DE FUERZA, COPYRIGHT &copy 2018 | TELMEX</p>
</footer>

</body>
</html>
