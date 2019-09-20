<?php

require_once("../../Controlador/ControladorCoordenadasGeo.php");

if (isset($_POST["sub"])){
    $estadoo = $_POST['Estado'];
    require_once("../../Controlador/consultas/ControladorConsultaEstado.php");
}

if(isset($_POST['export_data'])) {
    $estado = $_POST['Estado'];
    require_once("../../Controlador/consultas/ControladorConsultaEstado.php");


    function filterData(&$str)
    {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }

    // file name for download
    $fileName = "codexworld_export_data" . date('Ymd') . ".xls";

    // headers for download
    header("Content-Disposition: attachment; filename=\"$fileName\"");
    header("Content-Type: application/vnd.ms-excel");

    $flag = false;
    foreach ($consultaestados as $row) {
        if (!$flag) {
            // display column names as first row
            echo implode("\t", array_keys($row)) . "\n";
            $flag = true;
        }
        // filter data
        array_walk($row, 'filterData');
        echo implode("\t", array_values($row)) . "\n";

    }
    exit;
}


if (isset($_POST["sub"])){
    $regioon = $_POST['Region'];
    require_once("../../Controlador/consultas/ControladorConsultaRegion.php");
}

if(isset($_POST['export_data'])) {
    $region = $_POST['Region'];
    require_once("../../Controlador/consultas/ControladorConsultaRegion.php");


    function filterData(&$str)
    {
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }

// file name for download
    $fileName = "codexworld_export_data" . date('Ymd') . ".xls";

// headers for download
    header("Content-Disposition: attachment; filename=\"$fileName\"");
    header("Content-Type: application/vnd.ms-excel");

    $flag = false;
    foreach ($consultaregiones as $row) {
        if (!$flag) {
            // display column names as first row
            echo implode("\t", array_keys($row)) . "\n";
            $flag = true;
        }
        // filter data
        array_walk($row, 'filterData');
        echo implode("\t", array_values($row)) . "\n";

    }
    exit;
}


if (isset($_POST["sub"])){
    $municipioo = $_POST['Municipio'];
    require_once("../../Controlador/consultas/ControladorConsultaMunicipios.php");

}

if(isset($_POST['export_data'])) {
    $municipio = $_POST['Municipio'];
    require_once("../../Controlador/consultas/ControladorConsultaMunicipios.php");

    function filterData(&$str)
    {
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }

// file name for download
    $fileName = "codexworld_export_data" . date('Ymd') . ".xls";

// headers for download
    header("Content-Disposition: attachment; filename=\"$fileName\"");
    header("Content-Type: application/vnd.ms-excel");

    $flag = false;
    foreach ($consultamunicipios as $row) {
        if (!$flag) {
            // display column names as first row
            echo implode("\t", array_keys($row)) . "\n";
            $flag = true;
        }
        // filter data
        array_walk($row, 'filterData');
        echo implode("\t", array_values($row)) . "\n";

    }
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consulta por estado</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link rel="icon" type="image/png" width="100%" height="100%" href="../../imagenes/logo.png">
    <link rel="stylesheet" href="../../css/bootstrap.css" type="text/css" media="all" />
    <link rel="stylesheet" href="../../css/iconos.css" type="text/css" media="all" />
    <script src="../../js/colormarcador.js"></script>
    <script src="../../jquery/jquery-1.12.4.js"></script>
    <script src="../../jquery/jquery-1.12.4.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

    <script src="../../jquery/datatable.js"></script>
    <meta name="author" content="Genesis Mora Cruz">
</head>
<body>
<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2">
                <img width="170px" height="130px"  src="../../imagenes/logoUVNOMBRE.png">
            </div>
            <div class="col-lg-8">
                <h3 style="text-align: center">Sitios de Disposición Final de Residuos Sólidos Urbanos</h3>
                <h3 style="text-align: center; margin-top: -5px">del Estado de Veracruz</h3>
            </div>
            <div class="col-lg-2">
                <img width="110px" height="140px" style="margin-right: 15%" src="../../imagenes/logo2.png">
            </div>
        </div>
    </div>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="collapse navbar-collapse" id="navbarColor01" >
                <ul class="navbar-nav mr-auto" >
                    <li class="nav-item active">
                        <a class="nav-link"  href="../../index.php"><span class="sr-only; icon-home"></span> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="../ConsultaEstado.php">Estado</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="../ConsultaRegion">Región</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="../ConsultaMunicipio">Municipio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="../ConsultaTipo">Tipo de Sitio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="../ConsultaEdoOperacion">Estado de Operación</a>
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
            <a class="btn btn-success btn-sm" style="margin-right: 20px" href="login.html">Iniciar Sesión</a>
            <button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </div>
</header>
<section>
    <article>
        <h2 style="text-align: left">Consultas</h2>
        <br>
        <h5 style="text-align: left">Seleccione lo que desea consultar</h5>
        <div id="myTabContent" class="tab-content" style="margin-top: 50px">
            <div class="tab-pane fade show active" id="home">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <h5 style="text-align: left">Estado</h5>
                        </div>
                        <div class="col-lg-3">
                            <h5 style="text-align: left">Región</h5>
                        </div>
                        <div class="col-lg-3">
                            <h5 style="text-align: left">Municipio</h5>
                        </div>
                        <div class="col-lg-3">

                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3" style="text-align: left">
                            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="FormConsult">
                                <select class="js-example-basic-single" name="Estado">
                                    <option >Seleccionar</option>
                                    <?php
                                    require_once ("../../Controlador/consulta_estado.php");
                                    foreach ($estados as $estado):
                                        ?>
                                        <option value="<?php echo $estado['idEstado'];?>"> <?php echo $estado['Estado'];?> </option>
                                    <?php endforeach;?>
                                </select>
                            </form>
                        </div>
                        <div class="col-lg-3" style="text-align: left">
                            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="FormConsult">
                                <select class="js-example-basic-single" name="Region">
                                    <option >Seleccionar</option>
                                    <?php
                                    require_once ("../../Controlador/consulta_region.php");
                                    foreach ($regiones as $region):
                                        ?>
                                        <option value="<?php echo $region['idRegion'];?>"> <?php echo $region['Region'];?> </option>
                                    <?php endforeach;?>
                                </select>
                            </form>
                        </div>
                        <div class="col-lg-5" style="text-align: left">
                            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="FormConsult">
                                <select class="js-example-basic-single" name="Municipio">
                                    <option >Seleccionar</option>
                                    <?php
                                    require_once ("../../Controlador/consulta_municipio.php");
                                    foreach ($municipios as $municipio):
                                        ?>
                                        <option value="<?php echo $municipio['idMunicipios'];?>"> <?php echo $municipio['Municipio'];?> </option>
                                    <?php endforeach;?>
                                </select>
                            </form>
                        </div>
                        <div class="col-lg-1" style="text-align: center">
                            <button type="submit" name="sub" class="btn btn-primary btn-sm">Aceptar</button> <!-- AQUIIIIIIIIIIII-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>
<div id="datos"></div>
<div id="map" class="container">
    <script>
        var flag = 0;
        var datos = document.querySelector("#datos");
        var lista_coordenadas = <?php echo json_encode($coordenadas)?>;
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
                    id : parseInt(lista_coordenadas[i].idSitio),
                    icon: 'https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi.png',
                    sitio: lista_coordenadas[i].tipositio
                });
                markers.push(marker);
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
                        datos.innerHTML = '<a id="globo"><b>Municipio: </b></a> <a id="globo2"><b>'+lista_coordenadas[i].Municipio+'</b></a> </br><a id="globo"><b> Tipo de Sitio: </b></a> <a id="globo2"><b>'+lista_coordenadas[i].tipositio+'</b></a>'+
                            '</br><a id="globo"><b> Toneladas recibidas por dia: </b></a> <a id="globo2"><b>'+lista_coordenadas[i].Toneladas_por_dia+'</b></a>'+'</br><a id="globo"><b> Estado de operación: </b></a> <a id="globo2"><b>'+lista_coordenadas[i].Edo_operacion+'</b></a>'
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
                circulos[lista_coordenadas[i].idSitio] = circle;
            }
            for (var i = 0; i < markers.length; i++) {
                if (markers[i].sitio === 'Relleno Sanitario') {
                    var Marker = markers[i];
                    Marker.setIcon('imagenes/marcadores/ubicacion03.png');
                    Marker.setMap(map);
                }
                else if(markers[i].sitio === 'Relleno Sanitario Privado'){
                    var Marker = markers[i];
                    Marker.setIcon('imagenes/marcadores/logoNARANJA.png');
                    Marker.setMap(map);
                }
                else if(markers[i].sitio === 'Sitio Controlado'){
                    var Marker = markers[i];
                    Marker.setIcon('imagenes/marcadores/logoAZULCIELO.png');
                    Marker.setMap(map);
                }
                else if(markers[i].sitio === 'Tiradero a Cielo Abierto'){
                    var Marker = markers[i];
                    Marker.setIcon('imagenes/marcadores/logoROJO.png');
                    Marker.setMap(map);
                }
                else if(markers[i].sitio === 'Tiradero a Cielo Abierto Privado'){
                    var Marker = markers[i];
                    Marker.setIcon('imagenes/marcadores/logoMORADO.png');
                    Marker.setMap(map);
                }
                else if(markers[i].sitio === 'Tiradero Clandestino'){
                    var Marker = markers[i];
                    Marker.setIcon('imagenes/marcadores/logoLILA.png');
                    Marker.setMap(map);
                }
                else if(markers[i].sitio === 'Tiradero Controlado'){
                    var Marker = markers[i];
                    Marker.setIcon('imagenes/marcadores/logoAZULREY.png');
                    Marker.setMap(map);
                }
                else if(markers[i].sitio === 'Tiradero Contrlado Privado'){
                    var Marker = markers[i];
                    Marker.setIcon('imagenes/marcadores/logoVERDE.png');
                    Marker.setMap(map);
                }
                else{
                    var Marker = markers[i];
                    Marker.setIcon('imagenes/marcadores/logoGRIS.png');

                    Marker.setMap(map);
                }
            }
        }
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
    <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8R1knz15286Hf1yU1ievgZFxeF7fnC0w&callback=initMap">
    </script>
    <script src="https://bootswatch.com/_vendor/jquery/dist/jquery.min.js"></script>
    <script src="https://bootswatch.com/_vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://bootswatch.com/_assets/js/custom.js"></script>
</div>
<section>
    <article>
        <h5 style="text-align: left; margin-top: 100px">Descargas:</h5>
        <br>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <input type="hidden" value="<?php echo $estadoo?>" name="Estado">
            <button type="submit" id="export_data" name='export_data' value="Export to excel" <button type="button" ><img width="10%" height="10%" src="../../imagenes/excel-icon.png"> </button>
            <!--<button type="button" class="btn btn-success">Archivo PDF</button>-->
        </form>
    </article>
</section>

<footer >
    <p >Contacto: Dra. Gloria Inés González López. Correo: giglzlzy@yahoo.com.mx</p>
    <p style="margin-top: -7px"">SDF de RSU del Estado de Veracruz COPYRIGHT &copy 2019 | UNIVERSIDAD VERACRUZANA</p>
</footer>
</body>
</html>