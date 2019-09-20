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

if(isset($_GET["Siglas"])){
  $Siglas = $_GET["Siglas"];
}


if (isset($_GET["NombreCentral"])) {//Si pulsaste el botón de insertar...
    $Siglas = $_GET["Siglas"];
    $NombreCentral = $_GET["NombreCentral"];
    require_once("../controllers/centrales/consultas_centrales.php");

}

if(isset($_GET["NombreC"])){
    $siglasAct = $_GET["Siglasnew"];
    $nombreAct = $_GET["Nombrenew"];
    $nombre_central = $_GET["Nombre"];
    $siglas = $_GET["Siglas"];
    $tecnologia = $_GET["Tecnologia"];
    $cce = $_GET["CCE"];
    $direccion = $_GET["Direccion"];
    $municipio = $_GET["Municipio"];
    $rpu = $_GET["RPU"];
    $no_medidor = $_GET["No_Medidor"];
    require_once("..\controllers\centrales\centrales_datos_generales_actualizar.php");
    header("location:../views/info-centrales-edit.php?Siglas=$siglasAct&NombreCentral=$nombreAct");

}elseif(isset($_GET["NombreT"])) {

  $siglasAct = $_GET["Siglasnew"];
  $nombreAct = $_GET["Nombrenew"];
  $tipo = $_GET["Tipo"];
  $marca = $_GET["Marca"];
  $capacidad = $_GET["Capacidad"];
  $anio = $_GET["Año"];
  require_once("..\controllers\centrales\actualizar_datos_transformador.php");
  header("location:../views/info-centrales-edit.php?Siglas=$siglasAct&NombreCentral=$nombreAct");

}elseif(isset($_GET["NombreFP"])){
  $siglasAct = $_GET["Siglasnew"];
  $nombreAct = $_GET["Nombrenew"];
  $factorP = $_GET["FactorP"];
  $int = $_GET["INT"];
  $ext = $_GET["EXT"];
  require_once("..\controllers\centrales\actualizar_datos_factor_potencia_y_carga.php");
  header("location:../views/info-centrales-edit.php?Siglas=$siglasAct&NombreCentral=$nombreAct");

}elseif(isset($_GET["NombreCA"])){
  $siglasAct = $_GET["Siglasnew"];
  $nombreAct = $_GET["Nombrenew"];
  $cantidad = $_GET["Cantidad"];
  $capacidad = $_GET["Capacidad"];
  $marca = $_GET["Marca"];
  $fecha = $_GET["Fecha"];
  $posiciones = $_GET["Posiciones"];
  $modelo = $_GET["Modelo"];
  require_once("..\controllers\centrales\actualizar_tableroCA.php");
  header("location:../views/info-centrales-edit.php?Siglas=$siglasAct&NombreCentral=$nombreAct");

}elseif (isset($_GET["NombreG"])){
  $siglasAct = $_GET["Siglasnew"];
  $nombreAct = $_GET["Nombrenew"];
  $marca = $_GET["Marca"];
  $modelo = $_GET["Modelo"];
  $capacidad = $_GET["Capacidad"];
  require_once("..\controllers\centrales\actualizar_generador.php");
  header("location:../views/info-centrales-edit.php?Siglas=$siglasAct&NombreCentral=$nombreAct");

}elseif (isset($_GET["NombreMotor"])) {
  $siglasAct = $_GET["Siglasnew"];
  $nombreAct = $_GET["Nombrenew"];
  $marca = $_GET["Marca"];
  $modelo = $_GET["Modelo"];
  require_once("..\controllers\centrales\actualizar_motor.php");
  header("location:../views/info-centrales-edit.php?Siglas=$siglasAct&NombreCentral=$nombreAct");

}elseif (isset($_GET["Nombretablerot"])) {
  $siglasAct = $_GET["Siglasnew"];
  $nombreAct = $_GET["Nombrenew"];
  $marca = $_GET["Marca"];
  $modelo = $_GET["Modelo"];
  $anio = $_GET["Anio"];
  require_once("..\controllers\centrales\actualizar_tablerot.php");
  header("location:../views/info-centrales-edit.php?Siglas=$siglasAct&NombreCentral=$nombreAct");

}elseif (isset($_GET["Nombrecargadorbat"])) {
  $siglasAct = $_GET["Siglasnew"];
  $nombreAct = $_GET["Nombrenew"];
  $marca = $_GET["Marca"];
  $modelo = $_GET["Modelo"];
  $anio = $_GET["Anio"];
  $cantidad = $_GET["Cantidad"];
  $voltaje = $_GET["Voltaje"];
  require_once("..\controllers\centrales\actualizar_cargador_bat.php");
  header("location:../views/info-centrales-edit.php?Siglas=$siglasAct&NombreCentral=$nombreAct");

}elseif (isset($_GET["Nombreplantacd"])) {
  $siglasAct = $_GET["Siglasnew"];
  $nombreAct = $_GET["Nombrenew"];
  $marca = $_GET["Marca"];
  $modelo = $_GET["Modelo"];
  $anio = $_GET["Anio"];
  require_once("..\controllers\centrales\actualizar_plantacd.php");
  header("location:../views/info-centrales-edit.php?Siglas=$siglasAct&NombreCentral=$nombreAct");

}elseif (isset($_GET["Nombrerectificadores"])) {
  $siglasAct = $_GET["Siglasnew"];
  $nombreAct = $_GET["Nombrenew"];
  $cantidad = $_GET["Cantidad"];
  $modelo = $_GET["Modelo"];
  $capacidad = $_GET["Capacidad"];
  require_once("..\controllers\centrales\actualizar_rectificadores.php");
  header("location:../views/info-centrales-edit.php?Siglas=$siglasAct&NombreCentral=$nombreAct");

}elseif (isset($_GET["Nombretablerocd"])) {
  $siglasAct = $_GET["Siglasnew"];
  $nombreAct = $_GET["Nombrenew"];
  $cantidad = $_GET["Cantidad"];
  $marca = $_GET["Marca"];
  $pos_lib = $_GET["Poslibres"];
  require_once("..\controllers\centrales\actualizar_tablerocd.php");
  header("location:../views/info-centrales-edit.php?Siglas=$siglasAct&NombreCentral=$nombreAct");

}elseif (isset($_GET["Nombrebancos"])) {
  $siglasAct = $_GET["Siglasnew"];
  $nombreAct = $_GET["Nombrenew"];
  $cantidad = $_GET["Cantidad"];
  $celdasxbancos = $_GET["Celdaxbancos"];
  $marca = $_GET["Marca"];
  $modelo = $_GET["Modelo"];
  $capacidadah = $_GET["Capacidad"];
  $anio = $_GET["anio"];
  $respaldo = $_GET["Respaldo"];
  $barra_antisismica = $_GET["Barra_Antisismica"];
  require_once("..\controllers\centrales\actualizar_bancos.php");
  header("location:../views/info-centrales-edit.php?Siglas=$siglasAct&NombreCentral=$nombreAct");

}elseif(isset($_GET["NombreInver"])){
  $siglasAct = $_GET["Siglasnew"];
  $nombreAct = $_GET["Nombrenew"];
  $cantidad = $_GET["Cantidad"];
  $marca = $_GET["Marca"];
  $modelo = $_GET["Modelo"];
  $cap_kva = $_GET["Capacidad"];
  require_once("..\controllers\centrales\actualizar_inversores.php");
  header("location:../views/info-centrales-edit.php?Siglas=$siglasAct&NombreCentral=$nombreAct");

}elseif(isset($_GET["agregarCA"])){
  $siglasAct = $_GET["Siglasnew"];
  $nombreAct = $_GET["Nombrenew"];
  $cantidad = $_GET["CantidadCA"];
  $marca = $_GET["MarcaCA"];
  $modelo = $_GET["ModeloCA"];
  $cap_kva = $_GET["CapacidadCA"];
	$fecha = $_GET["FechaCA"];
	$posiciones = $_GET["PosicionesCA"];
  require_once("..\controllers\centrales\aniadir_tableroCA.php");
    header("location:../views/info-centrales-edit.php?Siglas=$siglasAct&NombreCentral=$nombreAct");

}elseif(isset($_GET["agregarCD"])){
    $siglasAct = $_GET["Siglasnew"];
    $nombreAct = $_GET["Nombrenew"];
    $cantidad = $_GET["Cantidad"];
    $marca = $_GET["Marca"];
    $modelo = $_GET["Modelo"];
    $posiciones = $_GET["Posiciones"];
    require_once("..\controllers\centrales\aniadir_tableroCD.php");
    header("location:../views/info-centrales-edit.php?Siglas=$siglasAct&NombreCentral=$nombreAct");

}elseif(isset($_GET["agregarInv"])) {
    $siglasAct = $_GET["Siglasnew"];
    $nombreAct = $_GET["Nombrenew"];
    $cantidad = $_GET["Cantidad"];
    $marca = $_GET["Marca"];
    $capacidad = $_GET["Capacidad"];
    $anio = $_GET["Anio"];
    $modelo = $_GET["Modelo"];
    require_once("..\controllers\centrales\aniadir_inversores.php");
    header("location:../views/info-centrales-edit.php?Siglas=$siglasAct&NombreCentral=$nombreAct");
}
elseif(isset($_GET["BancosB"])) {
    $siglasAct = $_GET["Siglasnew"];
    $nombreAct = $_GET["Nombrenew"];
    $cantidad = $_GET["Cantidad"];
    $marca = $_GET["Marca"];
    $barra = $_GET["Barra"];
    $anio = $_GET["Anio"];
    $modelo = $_GET["Modelo"];
    $celdas = $_GET["Celdas"];
    $cap_ah = $_GET["Cap_AH"];
    require_once("..\controllers\centrales\aniadir_bancos.php");
    header("location:../views/info-centrales-edit.php?Siglas=$siglasAct&NombreCentral=$nombreAct");
}
elseif(isset($_POST["Agregarcom"])){ 
    $siglasAct = $_POST["Siglasnew"];
    $nombreAct = $_POST["Nombrenew"];
    $usuario = $_POST["usuario"];
    $central = $_POST["central"];
    $cm = $_POST["cm"];
    $mensaje = $_POST["mensaje"];
    require_once("..\controllers\centrales\comentarios.php");
    header("location:../views/info-centrales-edit.php?Siglas=$siglasAct&NombreCentral=$nombreAct");
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Fuerza | Edición</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <meta name="author" content="Hector Azamar" >
  <link rel="stylesheet"  href="../bootstrap-3.3.7/dist/css/bootstrap.min.css">
  <link rel="stylesheet"  href="../bootstrap-3.3.7/dist/css/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="../select/css/select2.css">
  <script src="librerias/jquery-3.2.1.min.js"></script>
  <script src="../jquery/jquery-1.12.4.min.js"></script>
  <script type="text/javascript" src="../select/js/select2.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/Rcontraseña.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
  <header class="header2">
    <div class="contenedor">
      <div class="img">
      </div>
      <div>
        <h1 id="titulo">Gestor de Fuerza Área Veracruz  </h1>
      </div>
      <nav >
        <ul>
          <li ><a href="../views/inicio_view.php">Inicio</a></li>
          <li class="actual"><a href="../views/Centrales-adm.php">Centrales</a></li>
          <li ><a href="../controllers/cerrar_sesion.php">Cerrar sesion</a></li>
        </ul>
      </nav>
    </div>
    <section id="pestania">
    <div class="contenedor">
      <h1 class="centra-inicio"> Información General de Centrales</h1>
    </div>
  </section>
  </header>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
  <section class="block">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
          <input type="hidden" name="Siglas"  value="<?php echo $Siglas;?>">
          <!--<button class="btn btn-info al-but">Buscar</button>-->
          <input type="submit" class = "btn btn-info al-but" value='Buscar'>
            <div class="container filtro">
            <label for="example-date-input" class="col-2 col-form-label">Centrales:</label>
              <select name="NombreCentral"   class="form-control" id="mibuscador" >
              <option>Seleccionar...</option>
                  <?php

                 require_once ("../controllers/centrales/nombre_centrales.php");
                  foreach ($lista_centrales as $centrales):
                  ?>
                  <option value="<?php echo $centrales["Nombre_central"]; ?>"><?php echo  $centrales["Nombre_central"]  ?> </option>
                  <?php endforeach ?>
            </select>

        </div>
      </form>
  </section>
  <br>
  <br>
  <br>
  <br>
  <br>
<section class="container">
    <div class="panel panel-default">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <h3 class="alineacion"> Datos Generales</h3>
            <br>
            <tr class="bg-primary">
              <th>Nombre</th>
              <th>Siglas</th>
              <th>Tecnología</th>
              <th>CCE</th>
              <th>Dirección</th>
              <th>Municipio</th>
              <th>RPU</th>
              <th>No. Medidor</th>
              <th>Editar</th>
            </tr>
            <?php
            if (isset($_GET["NombreCentral"])):
            foreach ($consulta_centrales as $central):
            ?>
                <tr>
                    <td class="acomoda"><?php echo $central["Nombre_central"]; ?></td>
                    <td class="acomoda"><?php echo $central["Siglas"]; ?></td>
                    <td class="acomoda"><?php echo $central["Tecnologia"]; ?></td>
                    <td class="acomoda"><?php echo $central["CCE"]; ?></td>
                    <td class="acomoda"><?php echo $central["Direccion"]; ?></td>
                    <td class="acomoda"><?php echo $central["Municipio"]; ?></td>
                    <td class="acomoda"><?php echo $central["Rpu"]; ?></td>
                    <td class="acomoda"><?php echo $central["No_medidor"]; ?></td>
                    <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#miventana"><span class="glyphicon glyphicon-edit"></span> Modificar</button>


                    </tr>

                <div class="modal fade" id="miventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Modificar</h4>
                      </div>
                      <div class="modal-body text-alg">
                       <form name="form" method="get" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
                           <input type="hidden" name="Nombrenew"  value="<?php if(isset($_GET["NombreCentral"])): echo $nombreCentral; endif;?>">
                           <input type="hidden" name="Siglasnew"  value="<?php if(isset($_GET["Siglas"])): echo $Siglas; endif;?>">
                          <div class="form-group">
                            <label for="formGroupExampleInput">Ingrese nombre:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name = "Nombre" placeholder="Nombre" value="<?php echo $central["Nombre_central"];?>">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese siglas:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Siglas" placeholder="Siglas" value="<?php echo $central["Siglas"]; ?>">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese tecnología:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2"name = "Tecnologia" placeholder="Tecnología" value="<?php echo $central["Tecnologia"]; ?>">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese CCE:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "CCE" placeholder="CCE" value="<?php echo $central["CCE"]; ?>">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese direccion:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Direccion" placeholder="Dirección" value="<?php echo $central["Direccion"]; ?>">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese municipio:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Municipio" placeholder="Municipio" value="<?php echo $central["Municipio"]; ?>">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese RPU:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "RPU" placeholder="RPU" value="<?php echo $central["Rpu"]; ?>">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese No. medidor:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "No_Medidor" placeholder="No. Medidor" value="<?php echo $central["No_medidor"]; ?>">
                          </div>
                           <div class="modal-footer">
                               <button type="submit" class="btn btn-primary" name = "NombreC">Actualizar</button>
                               <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                           </div>
                       </form>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            <?php endforeach; endif;?>
            </tr>
        </table>
          <br>
           <table class="table table-bordered table-hover">
          <h3 class="alineacion"> Transformador</h3>
            <br>
            <tr class="bg-primary">
              <th>Tipo</th>
              <th>Marca</th>
              <th>Capacidad</th>
              <th>Año</th>
              <th>Editar</th>
            </tr>
               <?php
               if (isset($_GET["NombreCentral"])):
               foreach ($consulta_transformador as $central):
               ?>
               <tr>
                   <td class="acomoda"><?php echo $central["Tipo"]; ?></td>
                   <td class="acomoda"><?php echo $central["Marca"]; ?></td>
                   <td class="acomoda"><?php echo $central["Capacidad"]; ?></td>
                   <td class="acomoda"><?php echo $central["anio"]; ?></td>
                   <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#miventana1"><span class="glyphicon glyphicon-edit"></span> Modificar</button>


               </tr>
                   <div class="modal fade" id="miventana1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Modificar</h4>
                      </div>
                      <div class="modal-body text-alg">
                        <form name="form" method="get" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="Nombrenew"  value="<?php if(isset($_GET["NombreCentral"])): echo $nombreCentral; endif;?>">
                            <input type="hidden" name="Siglasnew"  value="<?php if(isset($_GET["Siglas"])): echo $Siglas; endif;?>">
                          <div class="form-group">
                            <label for="formGroupExampleInput">Ingrese tipo:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name = "Tipo" placeholder="Tipo" value="<?php echo $central["Tipo"]; ?>">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese marca:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Marca" placeholder="Marca" value="<?php echo $central["Marca"]; ?>">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese capacidad:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2"  name ="Capacidad" placeholder="Capacidad" value="<?php echo $central["Capacidad"]; ?>">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese año:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Año" placeholder="Año" value="<?php echo $central["anio"]; ?>">
                          </div>
                      </div>
                      <div class="modal-footer">
                           <button type="submit" class="btn btn-primary" name = "NombreT">Actualizar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
              </td>
               <?php endforeach;endif; ?>
            </tr>
            <br>
        </table>
         <br>
           <table class="table table-bordered table-hover">
          <h3 class="alineacion"> Factor de Potencia y Centro de Carga</h3>
            <br>
            <tr class="bg-primary">
              <th>Factor potencia</th>
              <th>INT</th>
              <th>EXT</th>
              <th>Editar</th>
            </tr>
               <?php
               if (isset($_GET["NombreCentral"])):
               foreach ($consulta_FactorPyC as $central):
               ?>
               <tr>
                   <td class="acomoda"><?php echo $central["Factor"]; ?></td>
                   <td class="acomoda"><?php echo $central["Inte"]; ?></td>
                   <td class="acomoda"><?php echo $central["Ext"]; ?></td>
                   <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#miventana2"><span class="glyphicon glyphicon-edit"></span> Modificar</button>


                <div class="modal fade" id="miventana2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Modificar</h4>
                      </div>
                      <div class="modal-body text-alg">
                        <form name="form" method="get" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="Nombrenew"  value="<?php if(isset($_GET["NombreCentral"])): echo $nombreCentral; endif;?>">
                            <input type="hidden" name="Siglasnew"  value="<?php if(isset($_GET["Siglas"])): echo $Siglas; endif;?>">
                          <div class="form-group">
                            <label for="formGroupExampleInput">Ingrese factor de potencia:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name = "FactorP" placeholder="Factor de potencia" value="<?php echo $central["Factor"]; ?>">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese INT:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "INT" placeholder="INT" value="<?php echo $central["Inte"]; ?>">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese EXT:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "EXT" placeholder="EXT" value="<?php echo $central["Ext"]; ?>">
                          </div>

                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name ="NombreFP">Actualizar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </td>
                   <?php endforeach;endif; ?>
            </tr>
            <br>
        </table>
        <br>
				<div class="container pos-btn">
					<button type="button" name="button" class="btn btn-success" data-toggle="modal" data-target="#miventana33"><span class="glyphicon glyphicon-plus"></span> Agregar tablero</button>
				</div>

				<div class="modal fade" id="miventana33" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4>Agregar datos</h4>
							</div>
							<div class="modal-body text-alg">
								<form name="form" method="get" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
										<input type="hidden" name="Nombrenew"  value="<?php if(isset($_GET["NombreCentral"])): echo $nombreCentral; endif;?>">
										<input type="hidden" name="Siglasnew"  value="<?php if(isset($_GET["Siglas"])): echo $Siglas; endif;?>">
									<div class="form-group">
										<label for="formGroupExampleInput">Ingrese cantidad:</label>
										<input type="text" class="form-control" id="formGroupExampleInput" name = "CantidadCA" placeholder="Cantidad">
									</div>
									<div class="form-group">
										<label for="formGroupExampleInput2">Ingrese capacidad (AMP):</label>
										<input type="text" class="form-control" id="formGroupExampleInput2" name = "CapacidadCA" placeholder="Capacidad">
									</div>
									<div class="form-group">
										<label for="formGroupExampleInput2">Ingrese marca:</label>
										<input type="text" class="form-control" id="formGroupExampleInput2" name = "MarcaCA" placeholder="Marca">
									</div>
									<div class="form-group">
										<label for="formGroupExampleInput2">Ingrese fecha de instalación:</label>
										<input type="text" class="form-control" id="formGroupExampleInput2" name = "FechaCA" placeholder="Fecha de Instalación">
									</div>
									<div class="form-group">
										<label for="formGroupExampleInput">Ingrese posiciones libres:</label>
										<input type="text" class="form-control" id="formGroupExampleInput" name = "PosicionesCA" placeholder="Posiciones Libres">
									</div>
									<div class="form-group">
										<label for="formGroupExampleInput2">Ingrese modelo:</label>
										<input type="text" class="form-control" id="formGroupExampleInput2" name = "ModeloCA" placeholder="Modelo">
									</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary" name = "agregarCA">Agregar</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
							</div>
							</form>
						</div>
					</div>
				</div>
				<table class="table table-bordered table-hover">
				 <h3 class="alineacion"> Tablero de Corriente Alterna</h3>
					 <br>
					 <tr class="bg-primary">
						 <th>Cantidad</th>
						 <th>Capacidad (AMP)</th>
						 <th>Marca</th>
						 <th>Fecha instalación</th>
						 <th>Posiciones libres</th>
						 <th>Modelo</th>
						 <th>Editar</th>
					 </tr>
					 <?php
					 if (isset($_GET["NombreCentral"])):
					 foreach ($consulta_tableroCA as $central):
					 ?>
					 <tr>
						 <td><?php echo $central["Cantidad"]; ?></td>
						 <td><?php echo $central["Cap_amp"]; ?></td>
						 <td><?php echo $central["Marca"]; ?></td>
						 <td><?php echo $central["Fecha"]; ?></td>
						 <td><?php echo $central["Pos_lib"]; ?></td>
						 <td><?php echo $central["Modelo"]; ?></td>
						 <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#miventana3"><span class="glyphicon glyphicon-edit"></span> Modificar</button>
							 <div class="modal fade" id="miventana3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								 <div class="modal-dialog">
									 <div class="modal-content">
										 <div class="modal-header">
											 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											 <h4>Modificar</h4>
										 </div>
										 <div class="modal-body text-alg">
											 <form name="form" method="get" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
													 <input type="hidden" name="Nombrenew"  value="<?php if(isset($_GET["NombreCentral"])): echo $nombreCentral; endif;?>">
													 <input type="hidden" name="Siglasnew"  value="<?php if(isset($_GET["Siglas"])): echo $Siglas; endif;?>">
												 <div class="form-group">
													 <label for="formGroupExampleInput">Ingrese cantidad:</label>
													 <input type="text" class="form-control" id="formGroupExampleInput" name = "Cantidad" placeholder="Cantidad" value="<?php echo $central["Cantidad"]; ?>">
												 </div>
												 <div class="form-group">
													 <label for="formGroupExampleInput2">Ingrese capacidad (AMP):</label>
													 <input type="text" class="form-control" id="formGroupExampleInput2" name = "Capacidad" placeholder="Capacidad" value="<?php echo $central["Cap_amp"]; ?>">
												 </div>
												 <div class="form-group">
													 <label for="formGroupExampleInput2">Ingrese marca:</label>
													 <input type="text" class="form-control" id="formGroupExampleInput2" name = "Marca" placeholder="Marca" value="<?php echo $central["Marca"]; ?>">
												 </div>
												 <div class="form-group">
													 <label for="formGroupExampleInput2">Ingrese fecha de instalación:</label>
													 <input type="text" class="form-control" id="formGroupExampleInput2" name = "Fecha" placeholder="Fecha de Instalación" value="<?php echo $central["Fecha"]; ?>">
												 </div>
												 <div class="form-group">
													 <label for="formGroupExampleInput">Ingrese posiciones libres:</label>
													 <input type="text" class="form-control" id="formGroupExampleInput" name = "Posiciones" placeholder="Posiciones Libres" value="<?php echo $central["Pos_lib"]; ?>">
												 </div>
												 <div class="form-group">
													 <label for="formGroupExampleInput2">Ingrese modelo:</label>
													 <input type="text" class="form-control" id="formGroupExampleInput2" name = "Modelo" placeholder="Modelo" value="<?php echo $central["Modelo"]; ?>">
												 </div>
										 </div>
										 <div class="modal-footer">
											 <button type="submit" class="btn btn-primary" name = "NombreCA">Actualizar</button>
											 <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
										 </div>
										 </form>
									 </div>
								 </div>
							 </div>
						 </td>
						 <?php endforeach;endif; ?>
					 </tr>
					 <br>
			 </table>

        <br>
          <h2 class="alineacion"> Grupo Electrogeno</h2>
           <table class="table table-bordered table-hover">
          <h3 class="alineacion"> Generador</h3>
            <br>
            <tr class="bg-primary">
              <th>Marca</th>
              <th>Modelo</th>
              <th>Capacidad KW</th>
              <th>Editar</th>
            </tr>
               <?php
               if (isset($_GET["NombreCentral"])):
               foreach ($consulta_generador as $central):
               ?>
               <tr>
                   <td class="acomoda"><?php echo $central["Marca"]; ?></td>
                   <td class="acomoda"><?php echo $central["Modelo"]; ?></td>
                   <td class="acomoda"><?php echo $central["Capacidad"]; ?></td>
                   <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#miventana4"><span class="glyphicon glyphicon-edit"></span> Modificar</button>


                <div class="modal fade" id="miventana4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Modificar</h4>
                      </div>
                      <div class="modal-body text-alg">
                        <form name="form" method="get" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="Nombrenew"  value="<?php if(isset($_GET["NombreCentral"])): echo $nombreCentral; endif;?>">
                            <input type="hidden" name="Siglasnew"  value="<?php if(isset($_GET["Siglas"])): echo $Siglas; endif;?>">
                          <div class="form-group">
                            <label for="formGroupExampleInput">Ingrese marca:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name ="Marca" placeholder="Marca" value="<?php echo $central["Marca"]; ?>" >
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese modelo:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Modelo" placeholder="Modelo" value="<?php echo $central["Modelo"]; ?>" >
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese capacidad (KW):</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Capacidad" placeholder="Capacidad" value="<?php echo $central["Capacidad"]; ?>" >
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name = "NombreG">Actualizar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </td>
                   <?php endforeach; endif;?>
            </tr>
            <br>
        </table>


         <table class="table table-bordered table-hover">
          <h3 class="alineacion"> Motor</h3>
            <br>
            <tr class="bg-primary">
              <th>Marca</th>
              <th>Modelo</th>
              <th>Editar</th>
            </tr>
             <?php
             if (isset($_GET["NombreCentral"])):
             foreach ($consulta_motor as $central):
             ?>
             <tr>
                 <td class="acomoda"><?php echo $central["Marca"]; ?></td>
                 <td class="acomoda"><?php echo $central["Modelo"]; ?></td>
                 <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#miventana5"><span class="glyphicon glyphicon-edit"></span> Modificar</button>


                <div class="modal fade" id="miventana5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Modificar</h4>
                      </div>
                      <div class="modal-body text-alg">
                        <form name="form" method="get" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="Nombrenew"  value="<?php if(isset($_GET["NombreCentral"])): echo $nombreCentral; endif;?>">
                            <input type="hidden" name="Siglasnew"  value="<?php if(isset($_GET["Siglas"])): echo $Siglas; endif;?>">
                          <div class="form-group">
                            <label for="formGroupExampleInput">Ingrese marca:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name = "Marca" placeholder="Marca" value="<?php echo $central["Marca"]; ?>" >
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese modelo:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Modelo" placeholder="Modelo" value="<?php echo $central["Modelo"]; ?>" >
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" name = "NombreMotor">Actualizar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </td>
                 <?php endforeach; endif;?>
            </tr>
            <br>
        </table>

        <table class="table table-bordered table-hover">
          <h3 class="alineacion"> Tablero Transferencia</h3>
            <br>
            <tr class="bg-primary">
              <th>Marca</th>
              <th>Modelo</th>
              <th>Año</th>
              <th>Editar</th>
            </tr>
            <?php
            if (isset($_GET["NombreCentral"])):
            foreach ($consulta_tablerot as $central):
            ?>
            <tr>
                <td class="acomoda"><?php echo $central["Marca"]; ?></td>
                <td class="acomoda"><?php echo $central["Modelo"]; ?></td>
                <td class="acomoda"><?php echo $central["Anio"]; ?></td>
                <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#miventana6"><span class="glyphicon glyphicon-edit"></span> Modificar</button>


                <div class="modal fade" id="miventana6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Modificar</h4>
                      </div>
                      <div class="modal-body text-alg">
                        <form name="form" method="get" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="Nombrenew"  value="<?php if(isset($_GET["NombreCentral"])): echo $nombreCentral; endif;?>">
                            <input type="hidden" name="Siglasnew"  value="<?php if(isset($_GET["Siglas"])): echo $Siglas; endif;?>">
                          <div class="form-group">
                            <label for="formGroupExampleInput">Ingrese marca:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name = "Marca" placeholder="Marca" value="<?php echo $central["Marca"]; ?>" >
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese modelo:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Modelo" placeholder="Modelo" value="<?php echo $central["Modelo"]; ?>" >
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese año:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Anio" placeholder="Año" value="<?php echo $central["Anio"]; ?>" >
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name = "Nombretablerot" >Actualizar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </td>
                <?php endforeach;endif; ?>
            </tr>
            <br>
        </table>
				<table class="table table-bordered table-hover">
			 <h3 class="alineacion"> Baterias GE</h3>
				 <br>
				 <tr class="bg-primary">
					 <th>Cantidad</th>
					 <th>Marca</th>
					 <th>Modelo</th>
					 <th>Año</th>
					 <th>Editar</th>
				 </tr>
						<?php
						if (isset($_GET["NombreCentral"])):
						foreach ($consulta_generador as $central):
						?>
						<tr>
								<td class="acomoda"><?php echo $central["Marca"]; ?></td>
								<td class="acomoda"><?php echo $central["Modelo"]; ?></td>
								<td class="acomoda"><?php echo $central["Capacidad"]; ?></td>
								<td></td>
								<td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#miventa"><span class="glyphicon glyphicon-edit"></span> Modificar</button>


						 <div class="modal fade" id="miventa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							 <div class="modal-dialog">
								 <div class="modal-content">
									 <div class="modal-header">
										 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										 <h4>Modificar</h4>
									 </div>
									 <div class="modal-body text-alg">
										 <form name="form" method="get" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
												 <input type="hidden" name="Nombrenew"  value="<?php if(isset($_GET["NombreCentral"])): echo $nombreCentral; endif;?>">
												 <input type="hidden" name="Siglasnew"  value="<?php if(isset($_GET["Siglas"])): echo $Siglas; endif;?>">
											 <div class="form-group">
												 <label for="formGroupExampleInput">Ingrese cantidad:</label>
												 <input type="text" class="form-control" id="formGroupExampleInput" name ="Marca" placeholder="Marca" value="<?php echo $central["Marca"]; ?>" >
											 </div>
											 <div class="form-group">
												 <label for="formGroupExampleInput2">Ingrese marca:</label>
												 <input type="text" class="form-control" id="formGroupExampleInput2" name = "Modelo" placeholder="Modelo" value="<?php echo $central["Modelo"]; ?>" >
											 </div>
											 <div class="form-group">
												 <label for="formGroupExampleInput2">Ingrese modelo:</label>
												 <input type="text" class="form-control" id="formGroupExampleInput2" name = "Capacidad" placeholder="Capacidad" value="<?php echo $central["Capacidad"]; ?>" >
											 </div>
											 <div class="form-group">
												<label for="formGroupExampleInput2">Ingrese año:</label>
												<input type="text" class="form-control" id="formGroupExampleInput2" name = "Capacidad" placeholder="Capacidad" value="<?php echo $central["Capacidad"]; ?>" >
											</div>
									 </div>
									 <div class="modal-footer">
										 <button type="submit" class="btn btn-primary" name = "NombreG">Actualizar</button>
										 <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
									 </div>
									 </form>
								 </div>
							 </div>
						 </div>
					 </td>
								<?php endforeach; endif;?>
				 </tr>
				 <br>
		 </table>
          <table class="table table-bordered table-hover">
          <h3 class="alineacion"> Cargador de baterias</h3>
            <br>
            <tr class="bg-primary">
              <th>Marca</th>
              <th>Modelo</th>
              <th>Año</th>
              <th>Cantidad</th>
              <th>Voltaje</th>
              <th>Editar</th>
            </tr>
              <?php
              if (isset($_GET["NombreCentral"])):
              foreach ($consulta_cargador_bat as $central):
              ?>
              <tr>
                  <td class="acomoda"><?php echo $central["Marca"]; ?></td>
                  <td class="acomoda"><?php echo $central["Modelo"]; ?></td>
                  <td class="acomoda"><?php echo $central["Anio"]; ?></td>
                  <td class="acomoda"><?php echo $central["Cantidad"]; ?></td>
                  <td class="acomoda"><?php echo $central["Voltaje"]; ?></td>
                  <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#miventana7"><span class="glyphicon glyphicon-edit"></span> Modificar</button>


                <div class="modal fade" id="miventana7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Modificar</h4>
                      </div>
                      <div class="modal-body text-alg">
                        <form name="form" method="get" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="Nombrenew"  value="<?php if(isset($_GET["NombreCentral"])): echo $nombreCentral; endif;?>">
                            <input type="hidden" name="Siglasnew"  value="<?php if(isset($_GET["Siglas"])): echo $Siglas; endif;?>">
                          <div class="form-group">
                            <label for="formGroupExampleInput">Ingrese marca:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name = "Marca" placeholder="Marca" value="<?php echo $central["Marca"]; ?>" >
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese modelo:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Modelo" nombreplaceholder="Modelo" value="<?php echo $central["Modelo"]; ?>" >
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese año:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Anio" placeholder="Año" value="<?php echo $central["Anio"]; ?>" >
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese cantidad:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Cantidad" placeholder="Cantidad" value="<?php echo $central["Cantidad"]; ?>" >
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese voltaje:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Voltaje" placeholder="Voltaje" value="<?php echo $central["Voltaje"]; ?>" >
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" name = "Nombrecargadorbat">Actualizar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </td>
                  <?php endforeach;endif; ?>
            </tr>
            <br>
        </table>
        <br>
        <br>
          <h2 class="alineacion"> Plantas de Corriente Directa</h2>
           <table class="table table-bordered table-hover">
          <h3 class="alineacion"> Planta CD</h3>
            <br>
            <tr class="bg-primary">
              <th>Marca</th>
              <th>Modelo</th>
              <th>Año</th>
              <th>Editar</th>
            </tr>
               <?php
               if (isset($_GET["NombreCentral"])):
               foreach ($consulta_plantacd as $central):
               ?>
               <tr>
                   <td class="acomoda"><?php echo $central["Marca"]; ?></td>
                   <td class="acomoda"><?php echo $central["Modelo"]; ?></td>
                   <td class="acomoda"><?php echo $central["Anio"]; ?></td>
                   <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#miventana8"><span class="glyphicon glyphicon-edit"></span> Modificar</button>



                <div class="modal fade" id="miventana8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Modificar</h4>
                      </div>
                      <div class="modal-body text-alg">
                        <form name="form" method="get" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="Nombrenew"  value="<?php if(isset($_GET["NombreCentral"])): echo $nombreCentral; endif;?>">
                            <input type="hidden" name="Siglasnew"  value="<?php if(isset($_GET["Siglas"])): echo $Siglas; endif;?>">
                          <div class="form-group">
                            <label for="formGroupExampleInput">Ingrese marca:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name = "Marca" placeholder="Marca" value="<?php echo $central["Marca"]; ?>" >
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese modelo:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Modelo" placeholder="Modelo" value="<?php echo $central["Modelo"]; ?>" >
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese año:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Anio" placeholder="Año" value="<?php echo $central["Anio"]; ?>" >
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary"name = "Nombreplantacd">Actualizar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </td>
                   <?php endforeach;endif; ?>
            </tr>
            <br>
        </table>

        <table class="table table-bordered table-hover">
          <h3 class="alineacion"> Rectificadores</h3>
            <br>
            <tr class="bg-primary">
              <th>Cantidad</th>
              <th>Modelo</th>
              <th>Capacidad AMP</th>
              <th>Editar</th>
            </tr>
            <tr>
                <?php
                if (isset($_GET["NombreCentral"])):
                foreach ($consulta_rectificadores as $central):
                ?>
            <tr>
                <td class="acomoda"><?php echo $central["Cantidad"]; ?></td>
                <td class="acomoda"><?php echo $central["Modelo"]; ?></td>
                <td class="acomoda"><?php echo $central["Cap_amp"]; ?></td>
                <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#miventana9"><span class="glyphicon glyphicon-edit"></span> Modificar</button>



                <div class="modal fade" id="miventana9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Modificar</h4>
                      </div>
                      <div class="modal-body text-alg">
                        <form name="form" method="get" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="Nombrenew"  value="<?php if(isset($_GET["NombreCentral"])): echo $nombreCentral; endif;?>">
                            <input type="hidden" name="Siglasnew"  value="<?php if(isset($_GET["Siglas"])): echo $Siglas; endif;?>">
                          <div class="form-group">
                            <label for="formGroupExampleInput">Ingrese cantidad:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name = "Cantidad" placeholder="Cantidad" value="<?php echo $central["Cantidad"]; ?>" >
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese modelo:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Modelo" placeholder="Modelo" value="<?php echo $central["Modelo"]; ?>" >
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese capacidad (AMP):</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Capacidad" placeholder="Capacidad" value="<?php echo $central["Cap_amp"]; ?>" >
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" name = "Nombrerectificadores">Actualizar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </td>
                <?php endforeach; endif;?>
            </tr>
            <br>
        </table>
        <br>
        <br>
        <table class="table table-bordered table-hover">
            <br>
            <tr class="bg-primary">
              <th>Capacidad Instalda (AMP)</th>
              <th>Ocupación Planta </th>
              <th>Consumo Total (AMP)</th>
              <th>Tipo de Operación</th>

            </tr>
            <?php
            if (isset($_GET["NombreCentral"])):
            foreach ($consulta_rectificadores_formulas as $central):
            ?>
            <tr>
                <td class="acomoda"><?php echo $central["cap_ins"]; ?></td>
                <td class="acomoda"><?php echo $central["ocu_planta"]; ?></td>
                <td class="acomoda"><?php echo $central["suma"]; ?></td>
                <td class="acomoda"><?php echo $central["rectificacion"]; ?></td>
                <div class="modal fade" id="miventana10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Modificar</h4>
                      </div>
                      <div class="modal-body text-alg">
                        <form name="form" method="get" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="Nombrenew"  value="<?php if(isset($_GET["NombreCentral"])): echo $nombreCentral; endif;?>">
                            <input type="hidden" name="Siglasnew"  value="<?php if(isset($_GET["Siglas"])): echo $Siglas; endif;?>">
                          <div class="form-group">
                            <label for="formGroupExampleInput">Ingrese consumo (AMP):</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Consumo">
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" name = "" >Actualizar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </td>
                <?php endforeach; endif;?>
            </tr>
            <br>

        </table>
				<div class="container pos-btn">
					<button type="button" name="button" class="btn btn-success" data-toggle="modal" data-target="#mi1"><span class="glyphicon glyphicon-plus"></span> Agregar tablero</button>
				</div>

				<div class="modal fade" id="mi1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4>Agregar datos</h4>
							</div>
							<div class="modal-body text-alg">
                                <form name="form" method="get" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <input type="hidden" name="Nombrenew"  value="<?php if(isset($_GET["NombreCentral"])): echo $nombreCentral; endif;?>">
                                    <input type="hidden" name="Siglasnew"  value="<?php if(isset($_GET["Siglas"])): echo $Siglas; endif;?>">
									<div class="form-group">
										<label for="formGroupExampleInput">Ingrese cantidad:</label>
										<input type="text" class="form-control" id="formGroupExampleInput" name = "Cantidad" placeholder="Cantidad" value="">
									</div>
									<div class="form-group">
										<label for="formGroupExampleInput2">Ingrese marca:</label>
										<input type="text" class="form-control" id="formGroupExampleInput2" name = "Capacidad" placeholder="Capacidad" value="">
									</div>
									<div class="form-group">
										<label for="formGroupExampleInput2">Ingrese posiciones libres:</label>
										<input type="text" class="form-control" id="formGroupExampleInput2" name = "Posiciones" placeholder="Posiciones" value="">
									</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary" name = "agregarCD">Agregar</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
							</div>
							</form>
						</div>
					</div>
				</div>
				<br>
        <table class="table table-bordered table-hover">
          <h3 class="alineacion"> Tablero de Corriente Directa</h3>
            <br>
            <tr class="bg-primary">
              <th>Cantidad</th>
              <th>Marca</th>
                <th>Modelo</th>
              <th>Posiciones Libres</th>
              <th>Editar</th>
            </tr>
            <?php
            if (isset($_GET["NombreCentral"])):
            foreach ($consulta_tablerocd as $central):
            ?>
            <tr>
                <td class="acomoda"><?php echo $central["Cantidad"]; ?></td>
                <td class="acomoda"><?php echo $central["Marca"]; ?></td>
                <td class="acomoda"><?php echo $central["Modelo"]; ?></td>
                <td class="acomoda"><?php echo $central["pos_lib"]; ?></td>
                <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#miventana11"><span class="glyphicon glyphicon-edit"></span> Modificar</button>



                <div class="modal fade" id="miventana11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Modificar</h4>
                      </div>
                      <div class="modal-body text-alg">
                        <form name="form" method="get" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="Nombrenew"  value="<?php if(isset($_GET["NombreCentral"])): echo $nombreCentral; endif;?>">
                            <input type="hidden" name="Siglasnew"  value="<?php if(isset($_GET["Siglas"])): echo $Siglas; endif;?>">
                          <div class="form-group">
                            <label for="formGroupExampleInput">Ingrese cantidad:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name = "Cantidad" placeholder="Cantidad" value="<?php echo $central["Cantidad"]; ?>" >
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese marca:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Marca" placeholder="Marca" value="<?php echo $central["Marca"]; ?>" >
                          </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Ingrese posiciones libres:</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" name = "Modelo" placeholder="Modelo" value="<?php echo $central["Modelo"]; ?>" >
                            </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese posiciones libres:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Poslibres" placeholder="Posiciones Libres" value="<?php echo $central["pos_lib"]; ?>" >
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" name = "Nombretablerocd" >Actualizar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                      </div>
                        </form>
                    </div>
                  </div>
                </div>
              </td>
                <?php endforeach; endif;?>
            </tr>
            <br>
        </table>
				<br>
				<div class="container pos-btn">
					<button type="button" name="button" class="btn btn-success" data-toggle="modal" data-target="#w1"><span class="glyphicon glyphicon-plus"></span> Agregar banco de bateria</button>
				</div>

				<div class="modal fade" id="w1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4>Agregar datos</h4>
							</div>
							<div class="modal-body text-alg">
                                <form name="form" method="get" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <input type="hidden" name="Nombrenew"  value="<?php if(isset($_GET["NombreCentral"])): echo $nombreCentral; endif;?>">
                                    <input type="hidden" name="Siglasnew"  value="<?php if(isset($_GET["Siglas"])): echo $Siglas; endif;?>">
									<div class="form-group">
										<label for="formGroupExampleInput">Ingrese cantidad:</label>
										<input type="text" class="form-control" id="formGroupExampleInput" name = "Cantidad" placeholder="Cantidad" value="">
									</div>
									<div class="form-group">
										<label for="formGroupExampleInput2">Ingrese celdas x bancos:</label>
										<input type="text" class="form-control" id="formGroupExampleInput2" name = "Celdas" placeholder="Celdas" value="">
									</div>
									<div class="form-group">
										<label for="formGroupExampleInput2">Ingrese marca:</label>
										<input type="text" class="form-control" id="formGroupExampleInput2" name = "Marca" placeholder="Marca" value="">
									</div>
									<div class="form-group">
										<label for="formGroupExampleInput2">Ingrese modelo:</label>
										<input type="text" class="form-control" id="formGroupExampleInput2" name = "Modelo" placeholder="Modelo" value="">
									</div>
									<div class="form-group">
										<label for="formGroupExampleInput2">Ingrese capacidad A-H:</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Cap_AH" placeholder="Cap_AH" value="">
									</div>
									<div class="form-group">
										<label for="formGroupExampleInput2">Ingrese año:</label>
										<input type="text" class="form-control" id="formGroupExampleInput2" name = "Anio" placeholder="Anio" value="">
									</div>
									<div class="form-group">
										<label for="formGroupExampleInput2">Ingrese barra antisismica:</label>
										<input type="text" class="form-control" id="formGroupExampleInput2" name = "Barra" placeholder="Barra" value="">
									</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary" name = "BancosB">Agregar</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
							</div>
							</form>
						</div>
					</div>
				</div>


        <table class="table table-bordered table-hover">
          <h3 class="alineacion"> Bancos de baterias </h3>
            <br>
            <tr class="bg-primary">
              <th>Cantidad</th>
              <th>Celdas x Bancos</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Capacidad A-H</th>
              <th>Año</th>
              <th>% Vida</th>
              <th>Respaldo de baterias</th>
              <th>Barra Antisismica</th>
              <th>Editar</th>
            </tr>
            <?php
            if (isset($_GET["NombreCentral"])):
            foreach ($consulta_bancos as $central):
            ?>
            <tr>
                <td class="acomoda"><?php echo $central["Cantidad"]; ?></td>
                <td class="acomoda"><?php echo $central["Celdas"]; ?></td>
                <td class="acomoda"><?php echo $central["Marca"]; ?></td>
                <td class="acomoda"><?php echo $central["Modelo"]; ?></td>
                <td class="acomoda"><?php echo $central["Cap_AH"]; ?></td>
                <td class="acomoda"><?php echo $central["Anio"]; ?></td>
                <td class="acomoda"><?php echo $central["porc_vida"]; ?></td>
                <td class="acomoda"><?php echo $central["Respaldo"]; ?></td>
                <td class="acomoda"><?php echo $central["Barra"]; ?></td>
                <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#miventana12"><span class="glyphicon glyphicon-edit"></span> Modificar</button>



                <div class="modal fade" id="miventana12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Modificar</h4>
                      </div>
                      <div class="modal-body text-alg">
                        <form name="form" method="get" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="Nombrenew"  value="<?php if(isset($_GET["NombreCentral"])): echo $nombreCentral; endif;?>">
                            <input type="hidden" name="Siglasnew"  value="<?php if(isset($_GET["Siglas"])): echo $Siglas; endif;?>">
                          <div class="form-group">
                            <label for="formGroupExampleInput">Ingrese cantidad:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name = "Cantidad" placeholder="Cantidad" value="<?php echo $central["Cantidad"]; ?>" >
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput">Ingrese celdas x banco:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name = "Celdaxbancos" placeholder="Celdas x Bancos" value="<?php echo $central["Celdas"]; ?>" >
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese marca:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Marca" placeholder="Marca" value="<?php echo $central["Marca"]; ?>" >
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese modelo:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Modelo" placeholder="Modelo" value="<?php echo $central["Modelo"]; ?>" >
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese capacidad A-H:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Capacidad" placeholder="Capacidad" value="<?php echo $central["Cap_AH"]; ?>" >
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese año:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "anio" placeholder="Año" value="<?php echo $central["Anio"]; ?>" >
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese barra antisismica:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Respaldo" placeholder="Respaldo" value="<?php echo $central["Respaldo"]; ?>" >
                          </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Ingrese barra antisismica:</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" name = "Barra_Antisismica" placeholder="Barra Antisismica" value="<?php echo $central["Barra"]; ?>" >
                            </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" name = "Nombrebancos" >Actualizar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </td>
                <?php endforeach; endif;?>
            </tr>
            <br>
        </table>
				<br>
				<!--<table class="table table-bordered table-hover">
            <br>
            <tr class="bg-primary">
              <th>Respaldo de baterias</th>
            </tr>
           
            <tr>
                <td class="acomoda"></td>
                
            </tr>
            <br>
        </table>-->
				<br>
				<br>
				<div class="container pos-btn">
					<button type="button" name="button" class="btn btn-success" data-toggle="modal" data-target="#MiventanaInv"><span class="glyphicon glyphicon-plus"></span> Agregar inversor</button>
				</div>

				<div class="modal fade" id="MiventanaInv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4>Agregar datos</h4>
							</div>
							<div class="modal-body text-alg">
                                <form name="form" method="get" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <input type="hidden" name="Nombrenew"  value="<?php if(isset($_GET["NombreCentral"])): echo $nombreCentral; endif;?>">
                                    <input type="hidden" name="Siglasnew"  value="<?php if(isset($_GET["Siglas"])): echo $Siglas; endif;?>">
									<div class="form-group">
										<label for="formGroupExampleInput">Ingrese cantidad KVA:</label>
										<input type="text" class="form-control" id="formGroupExampleInput" name = "Cantidad" placeholder="Cantidad" value="">
									</div>
									<div class="form-group">
										<label for="formGroupExampleInput2">Ingrese capacidad:</label>
										<input type="text" class="form-control" id="formGroupExampleInput2" name = "Capacidad" placeholder="Capacidad" value="">
									</div>
									<div class="form-group">
										<label for="formGroupExampleInput2">Ingrese marca:</label>
										<input type="text" class="form-control" id="formGroupExampleInput2" name = "Marca" placeholder="Marca" value="">
									</div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Ingrese año:</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" name = "Anio" placeholder="Año" value="">
                                    </div>
									<div class="form-group">
										<label for="formGroupExampleInput2">Ingrese modelo:</label>
										<input type="text" class="form-control" id="formGroupExampleInput2" name = "Modelo" placeholder="Modelo" value="">
									</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary" name = "agregarInv">Agregar</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
							</div>
							</form>
						</div>
					</div>
				</div>

          <table class="table table-bordered table-hover">
          <h3 class="alineacion"> Inversores</h3>
            <br>
            <tr class="bg-primary">
              <th>Cantidad</th>
              <th>Marca</th>
              <th>Modelo</th>
                <th>Año</th>
              <th>Capacidad KVA</th>
              <th>Editar</th>
            </tr>
              <?php
              if (isset($_GET["NombreCentral"])):
              foreach ($consulta_inversores as $central):
              ?>
              <tr>
                  <td class="acomoda"><?php echo $central["Cantidad"]; ?></td>
                  <td class="acomoda"><?php echo $central["Marca"]; ?></td>
                  <td class="acomoda"><?php echo $central["Modelo"]; ?></td>
                  <td class="acomoda"><?php echo $central["Anio"]; ?></td>
                  <td class="acomoda"><?php echo $central["Cap_kva"]; ?></td>
                  <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#miventana13"><span class="glyphicon glyphicon-edit"></span> Modificar</button>


                <div class="modal fade" id="miventana13" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Modificar</h4>
                      </div>
                      <div class="modal-body text-alg">
                        <form name="form" method="get" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="Nombrenew"  value="<?php if(isset($_GET["NombreCentral"])): echo $nombreCentral; endif;?>">
                            <input type="hidden" name="Siglasnew"  value="<?php if(isset($_GET["Siglas"])): echo $Siglas; endif;?>">
                          <div class="form-group">
                            <label for="formGroupExampleInput">Ingrese cantidad:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name = "Cantidad" placeholder="Cantidad" value="<?php echo $central["Cantidad"]; ?>">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese marca:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Marca" placeholder="Marca" value="<?php echo $central["Marca"]; ?>">
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese modelo:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Modelo" placeholder="Modelo" value="<?php echo $central["Modelo"]; ?>">
                          </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Ingrese Año:</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" name = "Anio" placeholder="Año" value="<?php echo $central["Anio"]; ?>">
                            </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Ingrese capacidad (KVA):</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name = "Capacidad" placeholder="Capacidad " value="<?php echo $central["Cap_kva"]; ?>">
                          </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" name = "NombreInver">Actualizar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </td>
                  <?php endforeach;endif; ?>
            </tr>
            <br>
        </table>



      </div>
    </div>
  </section>

<div id="Contenedor">
        
    <form name="form" method="post" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
      <input type="hidden" name="Nombrenew"  value="<?php if(isset($_GET["NombreCentral"])): echo $nombreCentral; endif;?>">
      <input type="hidden" name="Siglasnew"  value="<?php if(isset($_GET["Siglas"])): echo $Siglas; endif;?>">
        <label>Usuario:</label>
        <input type="text" name = "usuario" class="form-control" placeholder="Usuario">
        <label>Central:</label>
        <input type="text" name = "central" class="form-control" placeholder="Central">
          <label >Centro de mantenimiento:</label>
        <section class="block">
                <select class="form-control" id="mibuscador" name = "cm">
                <option value = "VER">Veracruz</option>
                <option value = "COS">Cosamaloapan </option>
                <option value = "SAX">San andres tuxtla</option>
              </select>
  </section>
        <label>Mensaje:</label>
       <textarea class="form-control" name = "mensaje" rows="5"></textarea>
       <br>
        <button type = "submit" name = "Agregarcom" class="btn btn-primary alinbtn">Agregar comentario</button>
    </form>    
            
  </div>


<footer>
  <p>SISTEMA GESTOR DE CENTRALES DEL AREA DE FUERZA, COPYRIGHT &copy 2018 | TELMEX</p>
</footer>

</body>
</html>
<script type="text/javascript">
  $(document).ready(function() {
      $('#mibuscador').select2();
  });
</script>
