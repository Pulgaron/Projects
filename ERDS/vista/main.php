<?php
require_once ("../controlador/controlador-coordenadas.php");
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ERDS</title>
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" media="all" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" media="all" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>

    <link rel="icon" type="image/png" href="../resources/logo_erds.jpeg">
     <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin=""></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
    <script src="../js/geoxml3.js"></script>
    <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAR8QqWP1ll7gfPUPwtPctPsZ_8OjQWqNM"></script>
    <script type="text/javascript" src="../js/jquery.googlemap.js"></script>
    <script src="../js/map_coordenadas.js"></script>
    <link rel="stylesheet" href="../css/main.css">
  
</head>
<body>
<header>
    <div class="container" style="margin-bottom: 1%">
        <div class="row">
            <div class="col-12 ">
                <div id="marca">
                    <table style="margin-left: 3%"   >
                        <tr>
                            <td >
                                <img width="200.25px" height="80.25px"  style="padding-right: 0px" style="margin-right: 50px" style="margin-left: 0px" src="../resources/estructural3-1.jpg">
                            </td>
                            <td >
                                <img width="100.25px" height="80.25px" style="margin-right: 50px" src="../resources/logo-1.png">
                            </td>
                            <td style="border-left: 1px solid white">
                                <h2 style = "font-family: Elephant"> <b>ESPECTRO REGIONAL DE DISEÑO SISMICO</b></h2>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav mr-auto">
                     <li class="nav-item">
                        <a class="nav-link" href="http://iiuv.org/sgisv">Sgisv</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="main.html">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="informacion.html">Información</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="nosotros.html">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactos.html">Contactos</a>
                    </li>
                </ul>
                 <ul  class="navbar-nav ml-auto">
                    <li >
                        <a  href="https://www.facebook.com/InstitutoDeIngenieriaUV/" target="_blank">
                            <img src="../resources/feizz.jpg" width="43" height="43">
                        </a>
                    </li>
                    
                    <li >
                        <a  href="https://www.uv.mx/veracruz/insting/" target="_blank">
                            <img src="../resources/logo-iiuv.jpg" width="43" height="43">
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    
</header>

<div class="embed-responsive embed-responsive-16by9">
    <div id="map" class="embed-responsive-item" style="border: 1px solid black"></div>
    <div id="botones" style="display: none">
    <button class="btn btn-outline-secondary" id="boton1"></button>
    <button class="btn btn-outline-secondary" id="boton2">FTT</button>
    <button class="btn btn-outline-secondary" id="boton3">EDTR</button>
    </div>
</div>



<script>
var markers = [];
var lista_coordenadas = <?php echo json_encode($lista_coordenadas)?>;
var currentId = 0;
var map;
var uniqueId = function() {
    return ++currentId;
}


 function deleteMarker(id_origen, markers) {
     console.log(markers);
     j = 1;
    for (var i = 0; i<markers.length;i++){
        
        if(id_origen === markers[j].title){
            var Marker = markers[j];
            Marker.setIcon('http://maps.google.com/mapfiles/ms/icons/green-dot.png');
            Marker.setMap(map);
            break;
        }
        j++;
    }
    
}

function markerColors(markers){
    for (var i = 1; i<markers.length;i++){
        
        markers[i].setIcon('https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi.png');
           
        }
}

    $(document).ready(function(){

   
       //var lista = localStorage.setItem('lista_coordenadas',lista_coordenadas);
        var botones = document.querySelector("#botones");
  
        $('#boton1').append('FTE')
                    .click(function () {


            window.open('imagen1.php','Función de Transferencia Empírica','width = 800, height = 600');
        });

        $('#boton2').click(function () {


            window.open('imagen2.php','Función de Transferencia Teórica','width = 800, height = 600');
        });

        $('#boton3').click(function () {


            window.open('imagen3.php','Espectro de Diseño Transparente Regional','width = 800, height = 600');
});

    var id_kml;
    var lat;
    var lng;
    var flag = true;
    
    var kmlLayer;
    var src = 'https://pulgaron.github.io/plantilla_proyecto-trans.kml' 
   
        $(function() {
           map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 19.1537265, lng: -96.1507391},
                zoom: 8
            });

             kmlLayer = new google.maps.KmlLayer(src, {
                suppressInfoWindows: true,
                preserveViewport: false,
                map: map
            });

            

            // var marker = L.marker([19.1537265, -96.1507391]).addTo(map);

            /* var myParser = new geoXML3.parser({
                map: map,
                suppressInfoWindows: true,
                allfoldersopen:true,
                clickablepolys : false,
                clickablelines : false, 
                clickablemarkers : false
            });
            myParser.parse('../resources/plantilla_proyecto-trans.kml'); */

            var infowindow = new google.maps.InfoWindow();
            for (var i in lista_coordenadas){
                //var id = uniqueId(); get new id
                var marker =  new google.maps.Marker({
                position: {lat:parseFloat(lista_coordenadas[i].latitud), lng:parseFloat(lista_coordenadas[i].longitud)},
                map: map,
                title: lista_coordenadas[i].estacion,
                animation: google.maps.Animation.DROP,
                id : parseInt(lista_coordenadas[i].id_coord),
                icon: 'https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi.png'

                });
                markers[lista_coordenadas[i].id_coord] = marker;
    
                 // cache created marker to markers object with id as its key
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                   botones.style.display= 'inline';
                    var titulo = marker.getTitle();
                    for(var i in lista_coordenadas){
                        if( lista_coordenadas[i].estacion === titulo){

                            localStorage.setItem('titulo', titulo);}
                    }

                    infowindow.setContent(botones);
                    infowindow.open(map, marker);


                }
            })(marker, i));
        }

            geocoder = new google.maps.Geocoder();
            var centerControlDiv = document.createElement('div');
            var centerControl = new CenterControl(centerControlDiv, map/*, myParser*/, 0);

            centerControlDiv.index = 1;
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);
            
        });

        function CenterControl(controlDiv, map,
        /*myParser,*/ entra) {
            // Set CSS for the control border.
            var controlUI = document.createElement('div');
            controlUI.style.backgroundColor = '#fff';
            controlUI.style.border = '2px solid #fff';
            controlUI.style.borderRadius = '3px';
            controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
            controlUI.style.cursor = 'pointer';
            controlUI.style.marginBottom = '22px';
            controlUI.style.textAlign = 'center';
            controlUI.title = 'Clic para seleccionar';
            controlDiv.appendChild(controlUI);

            // Set CSS for the control interior.
            var controlText = document.createElement('div');
            controlText.style.color = 'rgb(25,25,25)';
            controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
            controlText.style.fontSize = '16px';
            controlText.style.lineHeight = '38px';
            controlText.style.paddingLeft = '5px';
            controlText.style.paddingRight = '5px';
            controlText.innerHTML = 'Seleccionar';
            controlUI.appendChild(controlText);

            
            controlUI.addEventListener('click', function () {
                
                
                controlUI.style.backgroundColor = "gray";
                controlUI.style.borderColor = "gray";
                alert("Seleccione el lugar deseado dentro de los limites. Al seleccionar, se iluminará el punto donde se indicará el tipo de suelo mas cercano a su zona.");
                
                kmlLayer.addListener('click', function(kmlEvent) {
                    markerColors(markers);
                    var text = kmlEvent.featureData;
                    id_kml = kmlEvent.featureData.id;
                    lat = kmlEvent.latLng.lat();
                    lng = kmlEvent.latLng.lng();
                    entra = 1;
                    if(entra === 1){
                        distance(lat, lng, lista_coordenadas, id_kml);
                        controlUI.style.backgroundColor = "white";
                        controlUI.style.borderColor = "white";
                        google.maps.event.clearListeners(map, '');
                        google.maps.event.clearListeners(kmlLayer, '');
                        google.maps.event.clearListeners(map, 'listen');
                        entra = 0;
                    }
                        
                });
                
            });
        }
    });
    function toRadians(lat) {
            return lat * Math.PI / 180;
          };
</script>



<div class="list-group form-group" style="width: 40%; margin-left: 30%; margin-right: 30%; background-color: #a6a6a6; border-radius: 12px" id="form">
    <div style="width: 80%; margin-left: 10%; margin-right: 10%; margin-top: 20px">
        <form action="#" method="GET" id="coordenadas" onsubmit="return false" class="embed-responsive-item">
            <label class="col-form-label"><b>Coordenadas</b></label>
            <br>
            <table>
                <td style="width: 45%">
                    <input type="text" class="form-control" placeholder="Latitud" id="latitudin" name="vlatitud">
                    <br>
                </td>
                <td style="width: 10%"></td>
                <td style="width: 45%">
                    <input type="text" class="form-control" placeholder="Longitud" id="longitudin" name="vlongitud">
                    <br>
                </td>
            </table>
            <button type="submit" class="btn btn-secondary" id="submit">Calcular</button>
            <br><br>
        </form>
    </div>
</div>



<footer>
   <a id="texto"> Copyright &copy; <?php echo date('Y'); ?> by <font color="aqua"><a id="pie" href= "https://www.uv.mx" target="_blank">Universidad Veracruzana.</a></font> All Rights Reserved.</a>
</footer>
</body>
</html>