<?php

require_once("Controlador/ControladorCoordenadas.php");

if (isset($_GET['form-coordenadas'])){
    $state = $_GET['Estado'];
    $regiion = $_GET['Region'];
    $munic = $_GET['Municipio'];

    require_once("Controlador/consulta_mapa.php");
}

if (isset($_GET['form-carac'])){
    $state = $_GET['Estado'];
    $tipositio = $_GET['Tipo'];
    $edo_operacion = $_GET['Operacion'];
    $toneladas = $_GET['Toneladas'];
    $anios = $_GET['Anios'];

    require_once("Controlador/consulta_mapa_carac.php");
}


?>

<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>SIGRSU</title>
    <link rel="icon" type="image/png" width="100%" height="100%" href="imagenes/SSS.png">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/iconos.css" type="text/css" media="all" />
    <script src="js/colormarcador.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/selects.js"></script>
    <meta charset="utf-8">
    <meta name="author" content="Genesis Mora Cruz">
</head>
<body>
<!--<header id="main-header">
    <div class="container-fluid" style="background-color: #ecf0f1">
        <div class="row">
            <div class="col-lg-2">
                <img width="170px" height="130px"  src="imagenes/logoUVNOMBRE.png">
            </div>
            <div class="col-lg-8">
                <h3 style="text-align: center">Sistema para la localización de Sitios de Disposición Final de Residuos Sólidos Urbanos del Estado de Veracruz</h3>

            </div>
            <div class="col-lg-2">
                <img width="110px" height="110px" style="margin-right: 15%; margin-top: 10px" src="imagenes/SSS.png">
            </div>
        </div>
    </div>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="collapse navbar-collapse" id="navbarColor01" >
                <ul class="navbar-nav mr-auto" >
                    <li class="nav-item active">
                        <a class="nav-link"  href="index.php"><span class="sr-only; icon-home"></span> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="Vista/informacion.html">Información</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="Vista/QuienesSomos.html">Quiénes somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="Consultas2.php">Consultas</a>
                    </li>
                </ul>
            </div>
            <div style="margin-right: 40px;">
                <script languaje="JavaScript">
                    var mydate=new Date()
                    var year=mydate.getYear()
                    if (year < 1000)
                        year+=1900
                    var day=mydate.getDay()
                    var month=mydate.getMonth()
                    var daym=mydate.getDate()
                    if (daym<10)
                        daym="0"+daym
                    var dayarray=new Array("Domingo,","Lunes,","Martes,","Miércoles,","Jueves,","Viernes,","Sábado,")
                    var montharray=new Array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre")
                    document.write("<font color='white' face='sans-serif' style='font-size:10pt; margin-top: 10px'>"+dayarray[day]+" "+daym+" de "+montharray[month]+" de "+year+"</font>")
                </script>
            </div>
            <a class="btn btn-success btn-sm" style="margin-right: 20px" href="Vista/login.html">Iniciar Sesión</a>
            <button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </div>
</header>-->
<header id="main-header">
    <div class="container-fluid" style="background-color: #ecf0f1">
        <div class="row">
            <div class="col-lg-2">
                <img width="127.5px" height="97.5px"  src="imagenes/logoUVNOMBRE.png">
            </div>
            <div class="col-lg-8">
                <h4 style="text-align: center; font-size: 26px">Sistema para la localización de Sitios de Disposición Final de Residuos Sólidos Urbanos del Estado de Veracruz</h4>

            </div>
            <div class="col-lg-2">
                <img width="82.5px" height="82.5" style="margin-right: 25%; margin-top: 15px" src="imagenes/SSS.png">
            </div>
        </div>
    </div>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary" >
            <div class="collapse navbar-collapse" id="navbarColor01" >
                <ul class="navbar-nav mr-auto" style="font-size: 14px">
                    <li class="nav-item active">
                        <a class="nav-link"  href="index.php"><span class="sr-only; icon-home"></span> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="Vista/informacion.html">Información</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="Vista/QuienesSomos.html">Quiénes somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="Consultas2.php">Consultas</a>
                    </li>
                    <!--<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="download" aria-expanded="false">Consultas <span class="caret"></span></a>
                        <div class="dropdown-menu" aria-labelledby="download">
                            <a class="dropdown-item" target="_blank" href="https://jsfiddle.net/bootswatch/jmg3gykg/">Por Estado</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"  href="Vista/consultas/ConsultaRegion.php">Por Región</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"  href="Vista/consultas/ConsultaMunicipios.php">Por Municipio</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"  href="Vista/consultas/ConsultaTipo.php">Por Tipo de sitio</a>
                        </div>
                    </li>-->
                </ul>
            </div>
            <div style="margin-right: 40px;">
                <script languaje="JavaScript">
                    var mydate=new Date()
                    var year=mydate.getYear()
                    if (year < 1000)
                        year+=1900
                    var day=mydate.getDay()
                    var month=mydate.getMonth()
                    var daym=mydate.getDate()
                    if (daym<10)
                        daym="0"+daym
                    var dayarray=new Array("Domingo,","Lunes,","Martes,","Miércoles,","Jueves,","Viernes,","Sábado,")
                    var montharray=new Array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre")
                    document.write("<font color='white' face='sans-serif' style='font-size:10pt; margin-top: 10px'>"+dayarray[day]+" "+daym+" de "+montharray[month]+" de "+year+"</font>")
                </script>
            </div>
            <a class="btn btn-success btn-sm" style="margin-right: 20px" href="Vista/login.html">Iniciar Sesión</a>
            <button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </div>
</header>
<section>
    <article>
        <h4 style="text-align: center; margin-top: 50px">Consultas</h4>
    </article>
</section>
<div class="container-fluid" style="background-color: #F39C12; color: white">
    <div class="row" >
        <div class="col-lg-2" style="margin-top: 10px">
            <h6 style="text-align: left">Por</h6>
        </div>
        <div class="col-lg-3" style="margin-top: 10px">
            <h6 style="text-align: left">Estado</h6>
        </div>
        <div class="col-lg-3" style="margin-top: 10px">
            <h6 style="text-align: left">Región</h6>
        </div>
        <div class="col-lg-3" style="margin-top: 10px">
            <h6 style="text-align: left">Municipio</h6>
        </div>
        <div class="col-lg-1" style="margin-top: 10px"></div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <h6 style="text-align: left">ubicación geográfica</h6>
        </div>
        <div class="col-lg-3" style="text-align: left">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="get" name="FormConsult1">
                <select class="js-example-basic-single form-control" name="Estado" id="estado">
                    <option >Seleccionar</option>
                    <?php
                    require_once ("Controlador/consulta_estado.php");
                    foreach ($estados as $estado):
                        ?>
                    <option value="<?php echo $estado['idEstado'];?>"> <?php echo $estado['Estado'];?> </option><?php endforeach;?>
                </select>
        </div>
        <div class="col-lg-3" style="text-align: left">
            <select class="js-example-basic-single  form-control" name="Region" id="region">
                <option value="0">Seleccionar</option>
            </select>
        </div>
        <div class="col-lg-3" style="text-align: left">
            <select class="jss-example-basic-single form-control" name="Municipio" id="municipio">
                <option value="0">Seleccionar</option>
            </select>
        </div>
        <div class="col-lg-1" style="text-align: center">
            <button type="submit" name="form-coordenadas" id="form-coordenadas" value= "Form-coordenadas" class="btn btn-primary">Aceptar</button> <!-- AQUIIIIIIIIIIII-->
        </div>
    </div>
</div>

<div class="container-fluid" style="background-color: #18BC9C; color: white; margin-top: 10px">
    <div class="row" >
        <div class="col-lg-1" style="margin-top: 10px">
            <h6 style="text-align: left">Por</h6>
        </div>
        <div class="col-lg-2" style="margin-top: 10px">
            <h6 style="text-align: left">Estado</h6>
        </div>
        <div class="col-lg-2" style="margin-top: 10px">
            <h6 style="text-align: left">Tipo de sitio</h6>
        </div>
        <div class="col-lg-2" style="margin-top: 10px">
            <h6 style="text-align: left">Estado de operación</h6>
        </div>
        <div class="col-lg-2" style="margin-top: 10px">
            <h6 style="text-align: left">Toneladas depositadas</h6>
        </div>
        <div class="col-lg-2" style="margin-top: 10px">
            <h6 style="text-align: left">Años de vida útil</h6>
        </div>
        <div class="col-lg-1"></div>
    </div>
    <div class="row">
        <div class="col-lg-1">
            <h6 style="text-align: left">características físicas</h6>
        </div>
        <div class="col-lg-2" style="text-align: left">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="get" name="FormConsult">
                <select class="js-example-basic-single form-control" name="Estado" id="estado">
                    <option value="0">Seleccionar</option>
                    <?php
                    require_once ("Controlador/consulta_estado.php");
                    foreach ($estados as $estado):
                        ?>
                    <option value="<?php echo $estado['idEstado'];?>"> <?php echo $estado['Estado'];?> </option><?php endforeach;?>
                </select>
        </div>
        <div class="col-lg-2" style="text-align: left">
            <select class="js-example-basic-single form-control" name="Tipo">
                <option value="0">Seleccionar</option>
                <?php
                require_once ("Controlador/consulta_tipo.php");
                foreach ($tipos as $tipo):
                    ?>
                <option value="<?php echo $tipo['idTipoSitio'];?>"> <?php echo $tipo['NombreSitio'];?> </option><?php endforeach;?>
            </select>
        </div>
        <div class="col-lg-2" style="text-align: left">
            <select class="js-example-basic-single form-control" name="Operacion">
                <option value="0">Seleccionar</option>
                <?php
                require_once ("Controlador/consulta_operacion.php");
                foreach ($operaciones as $operacion):
                    ?>
                    <option value="<?php echo $operacion['idEstadoOperacion'];?>"> <?php echo $operacion['EstadoOperacion'];?> </option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="col-lg-2" style="text-align: left">
            <select class="js-example-basic-single form-control" name="Toneladas">
                <option value="0">Seleccionar</option>
                <option value="1">0-200 toneladas</option>
                <option value="2">201-400 toneladas</option>
                <option value="3">401-600 toneladas</option>
                <option value="4">601-800 toneladas</option>
                <option value="5">801-1000 toneladas</option>
            </select>
        </div>
        <div class="col-lg-2" style="text-align: left">
            <select class="js-example-basic-single form-control" name="Anios">
                <option value="0">Seleccionar</option>
                <option value="1">0-10 años</option>
                <option value="2">11-20 años</option>
                <option value="3">21-30 años</option>
            </select>
        </div>
        <div class="col-lg-1 my-1 ml-auto form_cool mb-2" style="text-align: center">
            <button type="submit" name="form-carac" id= "form-carac" class="btn btn-primary">Aceptar</button> <!-- AQUIIIIIIIIIIII-->
        </div>
        </form>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 text-right" style="margin-top: 6.5%">
            <div class="card text-white bg-info mb-3" style="max-width: 20rem;">
                <div class="card-header">
                    <h4 class="card-title" style="color: white; margin-top: 10px">Simbología</h4>
                </div>
                <div class="card-body" style="text-align: center; color: black">
                    <img src="imagenes/tabla_de_marcadores_2.png" class="img-fluid card-image-top">
                </div>
            </div>
        </div>
        <div class="col-lg-9 text-left" >
            <div id="datos"></div>
            <div id="map" class="container-fluid" style="height: 500px; width: 850px"></div>
        </div>
    </div>
    <script>
        var flag = 0;
        var datos = document.querySelector("#datos");
        var lista_coordenadas = <?php echo json_encode($coordenadas)?>;
        console.log(lista_coordenadas);
        var map;
        var markers = [];
        var markers2 = [];
        var circulos = [];
        var circle;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 20.02721, lng: -96.998269},
                zoom: 7
            });
            var infowindow = new google.maps.InfoWindow();

            for (var i in lista_coordenadas){

                var marker =  new google.maps.Marker({
                    position: {lat:parseFloat(lista_coordenadas[i].Latitud), lng:parseFloat(lista_coordenadas[i].Longitud)},
                    map: map,
                    title: lista_coordenadas[i].Municipio,
                    animation: google.maps.Animation.DROP,
                    id : i,
                    icon: 'https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi.png',
                    sitio: lista_coordenadas[i].tipositio

                });
                var depositante = lista_coordenadas[i].idSitio;
                markers[i] = marker;
                datos.innerHTML='';



                // cache created marker to markers object with id as its key
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        console.log(marker.id)
                        desactivar(marker.id, flag);
                        var titulo = marker.getTitle();
                        /*  for(var i in lista_coordenadas){
                             if( lista_coordenadas[i].Municipio === titulo){

                                 localStorage.setItem('titulo', titulo);}
                         } */
                        var depositante = lista_coordenadas[i].idSitio;

                        datos.innerHTML = '<a id="globo"><b>Municipio: </b></a> <a id="globo2"><b>'+lista_coordenadas[i].Municipio+'</b></a> </br><a id="globo"><b> Es proyecto ejecutivo: </b></a> <a id="globo2"><b>'+lista_coordenadas[i].Proyecto_Ejecutivo+'</b></a>'+
                            '</br><a id="globo"><b> Tiene pepena: </b></a> <a id="globo2"><b>'+lista_coordenadas[i].Pepena+'</b></a>'+'</br><a id="globo"><b> Cumple con normas: </b></a> <a id="globo2"><b>'+lista_coordenadas[i].Cumple_Norma+'</b></a></br> ' +
                            '<a href="Vista/MunicDepositantes.php?depositante='+depositante+'" name="MunicDepos" value="depositante" type="submit" target="_blank"  class="btn btn-warning btn-sm" onClick="window.open(this.href, this.target, \'width=500,height=300\'); return false;">+ info</a>'

                        infowindow.setContent(datos);
                        infowindow.open(map, marker);


                    }
                })(marker, i));

                circle = new google.maps.Circle({
                    id: lista_coordenadas[i].idsitios,
                    strokeColor: '#FF0000',
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: '#FF0000',
                    fillOpacity: 0.35,
                    map: map,
                    center: {lat:parseFloat(lista_coordenadas[i].Latitud), lng:parseFloat(lista_coordenadas[i].Longitud)},
                    radius: 1000,
                });

                circulos[i] = circle;
            }
            for (var i = 0; i < markers.length; i++) {

                if (markers[i].sitio === 'Relleno Sanitario') {
                    var Marker = markers[i];
                    Marker.setIcon('imagenes/marcadores/AMARILLO.png');
                    Marker.setMap(map);
                }
                else if(markers[i].sitio === 'Relleno Sanitario Privado'){
                    var Marker = markers[i];
                    Marker.setIcon('imagenes/marcadores/NARANJA.png');
                    Marker.setMap(map);
                }
                else if(markers[i].sitio === 'Sitio Controlado'){
                    var Marker = markers[i];
                    Marker.setIcon('imagenes/marcadores/AZULCIELO.png');
                    Marker.setMap(map);
                }
                else if(markers[i].sitio === 'Tiradero a Cielo Abierto'){
                    var Marker = markers[i];
                    Marker.setIcon('imagenes/marcadores/ROJO.png');
                    Marker.setMap(map);
                }
                else if(markers[i].sitio === 'Tiradero a Cielo Abierto Privado'){
                    var Marker = markers[i];
                    Marker.setIcon('imagenes/marcadores/MORADO.png');
                    Marker.setMap(map);
                }
                else if(markers[i].sitio === 'Tiradero Clandestino'){
                    var Marker = markers[i];
                    Marker.setIcon('imagenes/marcadores/LILA.png');
                    Marker.setMap(map);
                }
                else if(markers[i].sitio === 'Tiradero Controlado'){
                    var Marker = markers[i];
                    Marker.setIcon('imagenes/marcadores/AZULREY.png');
                    Marker.setMap(map);
                }
                else if(markers[i].sitio === 'Tiradero Contrlado Privado'){
                    var Marker = markers[i];
                    Marker.setIcon('imagenes/marcadores/VERDEFUERTE.png');
                    Marker.setMap(map);
                }
                else{
                    var Marker = markers[i];
                    Marker.setIcon('imagenes/marcadores/LIMON.png');

                    Marker.setMap(map);
                }
            }
        }

        var button = document.querySelector('#buton-holi');



        function colorChanger(markers){
            var j = 0;

            console.log(markers);
            console.log(j);

            for (var i = 0; i < markers.length; i++) {
                console.log("asdasd");
                if (markers[i].sitio === 'Relleno Sanitario') {
                    console.log("entra");
                    var Marker = markers[i];
                    Marker.setIcon('http://maps.google.com/mapfiles/ms/icons/green-dot.png');
                    Marker.setMap(map);
                }
                else{
                    console.log("nel");
                }
            }
        }

        var flag;

        function desactivar(idMark){
            if(flag === 0){
                circulos[idMark].setMap(null);
                flag = 1;
            }
            else{
                circulos[idMark].setMap(map);
                flag = 0;
            }
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8R1knz15286Hf1yU1ievgZFxeF7fnC0w&callback=initMap">
    </script>
    <script src="https://bootswatch.com/_vendor/jquery/dist/jquery.min.js"></script>
    <script src="https://bootswatch.com/_vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://bootswatch.com/_assets/js/custom.js"></script>
</div>

<div class="container-fluid" style="background-color: #ecf0f1; margin-top: 60px; text-align: center; color: white">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4" style="text-align: center; margin-top: -15px">
            <h4>Totales</h4>
        </div>
        <div class="col-lg-4"></div>
    </div>
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-1" style="background-color: #6610f2">

            <h6>Total de Sitios Disposición Final</h6>
        </div>
        <div class="col-lg-1" style="background-color: #6f42c1">
            <br>
            <h6>Relleno Sanitario</h6>
        </div>
        <div class="col-lg-1" style="background-color: #e83e8c">
            <h6>Relleno Sanitario Privado</h6>
        </div>
        <div class="col-lg-1" style="background-color: #E74C3C">
            <br>
            <h6>Sitio Controlado</h6>
        </div>
        <div class="col-lg-1" style="background-color: #fd7e14">
            <h6>Tiradero a Cielo Abierto</h6>
        </div>
        <div class="col-lg-1" style="background-color: #F39C12">
            <h6>Tiradero a Cielo Abierto Privado</h6>
        </div>
        <div class="col-lg-1" style="background-color: #18BC9C">
            <br>
            <h6>Tiradero Clandestino</h6>
        </div>
        <div class="col-lg-1" style="background-color: #20c997">
            <br>
            <h6>Tiradero Controlado</h6>
        </div>
        <div class="col-lg-1" style="background-color: #3498DB">
            <h6>Tiradero Controlado Privado</h6>
        </div>
        <div class="col-lg-1" style="background-color: #2C3E50">
            <h6>Tiradero Semi Controlado</h6>
        </div>
        <div class="col-lg-1"></div>
    </div>
</div>

<div class="container-fluid" style="background-color: #ecf0f1; text-align: center; color: white">
    <div class="row">
        <?php
        require_once("Controlador/consultas/SDF.php");
        ?>
        <div class="col-lg-1"></div>
        <div class="col-lg-1" style="background-color: #6610f2">
            <h5><?php echo $consultasitiosSDF["SDF"]?></h5>
        </div>
        <div class="col-lg-1" style="background-color: #6f42c1">
            <h5><?php echo $consultasitiosRS["RS"]?></h5>
        </div>
        <div class="col-lg-1" style="background-color: #e83e8c">
            <h5><?php echo $consultasitiosRSP["RSP"]?></h5>
        </div>
        <div class="col-lg-1" style="background-color: #E74C3C">
            <h5><?php echo $consultasitiosSC["SC"]?></h5>
        </div>
        <div class="col-lg-1" style="background-color: #fd7e14">
            <h5><?php echo $consultasitiosTCA["TCA"]?></h5>
        </div>
        <div class="col-lg-1" style="background-color: #F39C12">
            <h5><?php echo $consultasitiosTCAP["TCAP"]?></h5>
        </div>
        <div class="col-lg-1" style="background-color: #18BC9C">
            <h5><?php echo $consultasitiosTC["TC"]?></h5>
        </div>
        <div class="col-lg-1" style="background-color: #20c997">
            <h5><?php echo $consultasitiosTCo["TCo"]?></h5>
        </div>
        <div class="col-lg-1" style="background-color: #3498DB">
            <h5><?php echo $consultasitiosTCP["TCP"]?></h5>
        </div>
        <div class="col-lg-1" style="background-color: #2C3E50">
            <h5><?php echo $consultasitiosTSC["TSC"]?></h5>
        </div>
        <div class="col-lg-1"></div>
    </div>
    <div class="row"><br></div>
</div>

<div class="container-fluid" style="background-color: #ffffff; margin-top: 30px">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <h4 style="text-align: center">Cantidades recibidas de RSU</h4>
        </div>
        <div class="col-lg-4"></div>
    </div>
    <div class="row">
        <div class="col-lg-5">
            <h4 style="text-align: center">Sitios con más RSU</h4>
            <table class="table table-hover" style="margin-top: 10px; font-size: small">
                <tr class="table-info" style="text-align: center">
                    <th scope="row">No.</th>
                    <th scope="row">Tipo de Sitio</th>
                    <th scope="row">Municipio</th>
                    <th scope="row">Ubicación</th>
                    <th scope="row">Estado de operación</th>
                    <th scope="row">Dimensión (ha)</th>
                    <th scope="row">Toneladas de RSU</th>
                </tr>
                <tbody>
                <?php
                require_once("Controlador/consultas/ControladorConsultaSitios.php");
                foreach ($consultasitios as $consultasitio):
                    ?>

                    <tr class="table-light" style="text-align: center">
                        <td style="text-align: center">
                            <a> <?php echo $consultasitio["id"]?></a>
                        </td>
                        <td>
                            <a> <?php echo $consultasitio["Tipositio"]?></a>
                        </td>
                        <td>
                            <a> <?php echo $consultasitio["Municipio"]?></a>
                        </td>
                        <td>
                            <a> <?php echo $consultasitio["Ubicacion"]?></a>
                        </td>
                        <td>
                            <a> <?php echo $consultasitio["Operacion"]?></a>
                        </td>
                        <td style="text-align: center">
                            <a> <?php echo $consultasitio["Dimension"]?></a>
                        </td>
                        <td style="text-align: center">
                            <a> <?php echo $consultasitio["Toneladas"]?></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-5">
            <h4 style="text-align: center;">Sitios con menos RSU</h4>
            <table class="table table-hover" style="margin-top: 10px; font-size: small"">
                <tr class="table-info" style="text-align: center">
                    <th scope="row">No.</th>
                    <th scope="row">Tipo de sitio</th>
                    <th scope="row">Municipio</th>
                    <th scope="row">Ubicación</th>
                    <th scope="row">Estado de operación</th>
                    <th scope="row">Dimensión (ha)</th>
                    <th scope="row">Toneladas de RSU</th>
                </tr>
                <tbody>
                <?php
                require_once("Controlador/consultas/ControladorConsultasSitiosMax.php");
                foreach ($consultasitiosMax as $consultasitioMax):
                    ?>
                    <tr class="table-light" style="text-align: center">
                        <td style="text-align: center">
                            <a> <?php echo $consultasitioMax["id"]?></a>
                        </td>
                        <td>
                            <a> <?php echo $consultasitioMax["Tipositio"]?></a>
                        </td>
                        <td>
                            <a> <?php echo $consultasitioMax["Municipio"]?></a>
                        </td>
                        <td>
                            <a> <?php echo $consultasitioMax["Ubicacion"]?></a>
                        </td>
                        <td>
                            <a> <?php echo $consultasitioMax["Operacion"]?></a>
                        </td>
                        <td style="text-align: center">
                            <a> <?php echo $consultasitioMax["Dimension"]?></a>
                        </td>
                        <td style="text-align: center">
                            <a> <?php echo $consultasitioMax["Toneladas"]?></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<footer>
    <p>SISSOV COPYRIGHT &copy 2019 UNIVERSIDAD VERACRUZANA | Contacto: Dra. Gloria I. González López giglzlzy@yahoo.com.mx</p>
</footer>
</body>
</html>