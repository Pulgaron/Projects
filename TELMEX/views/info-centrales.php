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

$Siglas = $_GET["Siglas"];


if (isset($_GET["busca"])) {//Si pulsaste el botón de insertar...
    $Siglas = $_GET["Siglas"];
    $NombreCentral = $_GET["NombreCentral"];
    require_once("../controllers/centrales/consultas_centrales.php");

}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Fuerza | Centrales</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <meta name="author" content="Hector Azamar" >
  <link rel="stylesheet"  href="../bootstrap-3.3.7/dist/css/bootstrap.min.css">
  <link rel="stylesheet"  href="../bootstrap-3.3.7/dist/css/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="../select/css/select2.css">
  <script src="librerias/jquery-3.2.1.min.js"></script>
  <link rel="stylesheet" href="../bootstrap-3.3.6/css/bootstrap.min.css">
  <script src="../jquery/jquery-1.12.4.min.js"></script>
  <script type="text/javascript" src="../select/js/select2.js"></script>
  <script src="../bootstrap-3.3.6/js/bootstrap.min.js"></script>
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
          <li class="actual"><a href="Centrales-adm.php">Centrales</a></li>
          <li ><a href="">Cerrar sesion</a></li>
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
          <input type="submit" class = "btn btn-info al-but" name="busca" value="Buscar">
          <div class="container filtro">
              <label for="example-date-input" class="col-2 col-form-label">Centrales:</label>
              <select name="NombreCentral"   class="form-control" id="mibuscador"  >
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

                  </tr>
                  <?php
                  if (isset($_GET["busca"])):
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

                  </tr>
                  <?php
                  if (isset($_GET["busca"])):
                  foreach ($consulta_transformador as $central):
                  ?>
                  <tr>
                      <td class="acomoda"><?php echo $central["Tipo"]; ?></td>
                      <td class="acomoda"><?php echo $central["Marca"]; ?></td>
                      <td class="acomoda"><?php echo $central["Capacidad"]; ?></td>
                      <td class="acomoda"><?php echo $central["anio"]; ?></td>
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

                  </tr>
                  <?php
                  if (isset($_GET["busca"])):
                  foreach ($consulta_FactorPyC as $central):
                  ?>
                  <tr>
                      <td class="acomoda"><?php echo $central["Factor"]; ?></td>
                      <td class="acomoda"><?php echo $central["Inte"]; ?></td>
                      <td class="acomoda"><?php echo $central["Ext"]; ?></td>

                          <?php endforeach;endif; ?>


                  </tr>
                  <br>
              </table>
              <br>
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

                  </tr>
                  <?php
                  if (isset($_GET["busca"])):
                  foreach ($consulta_tableroCA as $central):
                  ?>
                  <tr>
                      <td class="acomoda"><?php echo $central["Cantidad"]; ?></td>
                      <td class="acomoda"><?php echo $central["Cap_amp"]; ?></td>
                      <td class="acomoda"><?php echo $central["Marca"]; ?></td>
                      <td class="acomoda"><?php echo $central["Fecha"]; ?></td>
                      <td class="acomoda"><?php echo $central["Pos_lib"]; ?></td>
                      <td class="acomoda"><?php echo $central["Modelo"]; ?></td>

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

                  </tr>
                  <?php
                  if (isset($_GET["busca"])):
                  foreach ($consulta_generador as $central):
                  ?>
                  <tr>
                      <td class="acomoda"><?php echo $central["Marca"]; ?></td>
                      <td class="acomoda"><?php echo $central["Modelo"]; ?></td>
                      <td class="acomoda"><?php echo $central["Capacidad"]; ?></td>

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

                  </tr>
                  <?php
                  if (isset($_GET["busca"])):
                  foreach ($consulta_motor as $central):
                  ?>
                  <tr>
                      <td class="acomoda"><?php echo $central["Marca"]; ?></td>
                      <td class="acomoda"><?php echo $central["Modelo"]; ?></td>

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

                  </tr>
                  <?php
                  if (isset($_GET["busca"])):
                  foreach ($consulta_tablerot as $central):
                  ?>
                  <tr>
                      <td class="acomoda"><?php echo $central["Marca"]; ?></td>
                      <td class="acomoda"><?php echo $central["Modelo"]; ?></td>
                      <td class="acomoda"><?php echo $central["Anio"]; ?></td>

                          <?php endforeach;endif; ?>


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

                  </tr>
                  <?php
                  if (isset($_GET["busca"])):
                  foreach ($consulta_cargador_bat as $central):
                  ?>
                  <tr>
                      <td class="acomoda"><?php echo $central["Marca"]; ?></td>
                      <td class="acomoda"><?php echo $central["Modelo"]; ?></td>
                      <td class="acomoda"><?php echo $central["Anio"]; ?></td>
                      <td class="acomoda"><?php echo $central["Cantidad"]; ?></td>
                      <td class="acomoda"><?php echo $central["Voltaje"]; ?></td>

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

                  </tr>
                  <?php
                  if (isset($_GET["busca"])):
                  foreach ($consulta_plantacd as $central):
                  ?>
                  <tr>
                      <td class="acomoda"><?php echo $central["Marca"]; ?></td>
                      <td class="acomoda"><?php echo $central["Modelo"]; ?></td>
                      <td class="acomoda"><?php echo $central["Anio"]; ?></td>


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

                  </tr>
                  <tr>
                      <?php
                      if (isset($_GET["busca"])):
                      foreach ($consulta_rectificadores as $central):
                      ?>
                  <tr>
                      <td class="acomoda"><?php echo $central["Cantidad"]; ?></td>
                      <td class="acomoda"><?php echo $central["Modelo"]; ?></td>
                      <td class="acomoda"><?php echo $central["Cap_amp"]; ?></td>

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
                      <th>Consumo (AMP)</th>
                      <th>Ocupación Planta </th>
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


                <?php endforeach; endif;?>
                  </tr>
                  <br>
              </table>

              <table class="table table-bordered table-hover">
                  <h3 class="alineacion"> Tablero de Corriente Directa</h3>
                  <br>
                  <tr class="bg-primary">
                      <th>Cantidad</th>
                      <th>Marca</th>
                      <th>Posiciones Libres</th>

                  </tr>
                  <?php
                  if (isset($_GET["busca"])):
                  foreach ($consulta_tablerocd as $central):
                  ?>
                  <tr>
                      <td class="acomoda"><?php echo $central["Cantidad"]; ?></td>
                      <td class="acomoda"><?php echo $central["Marca"]; ?></td>
                      <td class="acomoda"><?php echo $central["pos_lib"]; ?></td>


                          <?php endforeach; endif;?>


                  </tr>
                  <br>
              </table>

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

                  </tr>
                  <?php
                  if (isset($_GET["busca"])):
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


                          <?php endforeach; endif;?>


                  </tr>
                  <br>
              </table>

              <table class="table table-bordered table-hover">
                  <h3 class="alineacion"> Inversores</h3>
                  <br>
                  <tr class="bg-primary">
                      <th>Cantidad</th>
                      <th>Marca</th>
                      <th>Modelo</th>
                      <th>Capacidad KVA</th>

                  </tr>
                  <?php
                  if (isset($_GET["busca"])):
                  foreach ($consulta_inversores as $central):
                  ?>
                  <tr>
                      <td class="acomoda"><?php echo $central["Cantidad"]; ?></td>
                      <td class="acomoda"><?php echo $central["Marca"]; ?></td>
                      <td class="acomoda"><?php echo $central["Modelo"]; ?></td>
                      <td class="acomoda"><?php echo $central["Cap_kva"]; ?></td>

                          <?php endforeach;endif; ?>

                      </tr>
                  <br>
              </table>



          </div>
      </div>
  </section>




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
