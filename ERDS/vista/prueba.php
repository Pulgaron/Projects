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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">   
    <link rel="icon" type="image/png" href="../resources/logo_erds.jpeg">
    <script src="../js/geoxml3.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAR8QqWP1ll7gfPUPwtPctPsZ_8OjQWqNM"></script>
    <script type="text/javascript" src="../js/jquery.googlemap.js"></script>
    <script src="../js/map_coordenadas.js"></script>
<style>
    body{
    margin-bottom: 5%; 
    }
    </style>
</head>
<body>
<header>
<div class="row-12 mb-0">
    
        <nav class="navbar navbar-expand-md navbar-dark bg-dark d-block d-sm-none">
            <div class="container">
    
                <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#fm-menu" aria-controls="fm-menu" aria-expanded="false" aria-label="Menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <a href="#" class="navbar-brand">ERDS</a>
    
                <div class="collapse navbar-collapse" id="fm-menu">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="http://iiuv.org/sgisv">Sgisv</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="main.html">Inicio<span class="sr-only">(current)</span></a>
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
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark d-none d-sm-block d-md-none">
            <div class="container">
           
                <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#fm-menu1" aria-controls="fm-menu1" aria-expanded="false" aria-label="Menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
    
                <a href="#" class="navbar-brand">Espectro Regional de Diseño Sismico</a>
    
                <div class="collapse navbar-collapse" id="fm-menu1">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="http://iiuv.org/sgisv">Sgisv</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="main.html">Inicio<span class="sr-only">(current)</span></a>
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
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark d-none d-md-block d-lg-none">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../resources/logo-1.png" width="40" height="40" alt="">
            </a>
                <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#fm-menu2" aria-controls="fm-menu2" aria-expanded="false" aria-label="Menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <a href="#" class="navbar-brand">ERDS</a>
    
                <div class="collapse navbar-collapse" id="fm-menu2">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="http://iiuv.org/sgisv">Sgisv</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="main.html">Inicio<span class="sr-only">(current)</span></a>
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
                    <h2 style = " color: white;"> <b>ERDS</b></h2>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark d-none d-lg-block d-xl-none">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../resources/logo-1.png" width="40" height="40" alt="">
            </a>
                <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#fm-menu3" aria-controls="fm-menu3" aria-expanded="false" aria-label="Menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <a href="#" class="navbar-brand">ERDS</a>
    
                <div class="collapse navbar-collapse" id="fm-menu3">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="http://iiuv.org/sgisv">Sgisv</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="main.html">Inicio<span class="sr-only">(current)</span></a>
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
                    <h2 style = " color: white;"> <b>ESPECTRO REGIONAL DE DISEÑO</b></h2>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark d-none d-xl-block ">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../resources/logo-1.png" width="40" height="40" alt="">
            </a>
                <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#fm-menu4" aria-controls="fm-menu4" aria-expanded="false" aria-label="Menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <a href="#" class="navbar-brand">ERDS</a>
    
                <div class="collapse navbar-collapse" id="fm-menu4">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="http://iiuv.org/sgisv">Sgisv</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="main.html">Inicio<span class="sr-only">(current)</span></a>
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
                    <h2 class="" style = " color: white;"> <b>ESPECTRO REGIONAL DE DISEÑO SISMICO</b></h2>
                    
                </div>
            </div>
        </nav>
    </div>
    

   
   <!--  <div class="container" style="margin-bottom: 1%">
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
     -->
</header>
<div class="container-fluid">
      
     <div class="row mb-0">
        <div style="width:100%; height:87%; position: absolute;">
            <div id="map"></div>
            </div>

        <div id="botones" style="display: none">
            <button class="btn btn-outline-secondary" id="boton1"></button>
            <button class="btn btn-outline-secondary" id="boton2">FTT</button>
            <button class="btn btn-outline-secondary" id="boton3">EDTR</button>
        </div>
    </div>  

     <div class="row mt-3 d-flex justify-content-end" style="height:83%; width: 100%;">
        <div class="col-2 mr-5 d-block d-sm-none">
           <!--  <p>
                <a href="#bloque1" class="btn btn-dark btn-block " aria-expanded="false" aria-controls="bloque1" data-toggle="collapse">asd</a>
            </p -->

                
                <input type="image" src="../resources/icon-arrow_dropdown.svg" alt="" class="btn btn-dark" data-toggle="modal" data-target="#fm-modal"style="height:45px; width: 45px;">
				<div class="modal fade" id="fm-modal" tabindex="-1" role="dialog" aria-labelledby="fm-modal" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="">Coordenadas</h5>
								<button class="close" data-dismiss="modal" aria-label="Cerrar">
                                    
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<div class="modal-body">
                            <div class="card card-block card-primary ">
                        <div class="card-text">
                        <form action="#" method="GET" id="coordenadas" onsubmit="return false" >
                                <div class="form-group">
                                <input type="text" class="form-control" placeholder="Longitud" id="longitudin" name="vlongitud">
                                </div>

                                <div class="form-group">
                                <input type="text" class="form-control" placeholder="Latitud" id="latitudin" name="vlatitud">
                                </div>
                                <button class="btn btn-success btn-block" type="submit" value="submit">Enviar</button>
                            </form>
                        </div>
                    </div>
							</div>
						</div>
					</div>
				</div>
                </div>
          
        
        <div class="col-4 mr-5 d-none d-sm-block d-md-none">
            <p>
                <a href="#bloque2" class="btn btn-dark btn-block " aria-expanded="false" aria-controls="bloque2" data-toggle="collapse">Coordenadas</a>
            </p>
            <div class="collapse" id="bloque2">
                <div class="card card-block card-primary ">
                    <div class="card-text">
                    <form action="#" method="GET" id="coordenadas" onsubmit="return false" >
                                <div class="form-group">
                                <input type="text" class="form-control" placeholder="Longitud" id="longitudin" name="vlongitud">
                                </div>

                                <div class="form-group">
                                <input type="text" class="form-control" placeholder="Latitud" id="latitudin" name="vlatitud">
                                </div>
                                <button class="btn btn-success btn-block" type="submit" value="submit">Enviar</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 mr-5 d-none d-md-block d-lg-none">
            <p>
                <a href="#bloque3" class="btn btn-dark btn-block " aria-expanded="false" aria-controls="bloque3" data-toggle="collapse">Coordenadas</a>
            </p>
            <div class="collapse" id="bloque3">
                <div class="card card-block card-primary ">
                    <div class="card-text">
                    <form action="#" method="GET" id="coordenadas" onsubmit="return false" >
                                <div class="form-group">
                                <input type="text" class="form-control" placeholder="Longitud" id="longitudin" name="vlongitud">
                                </div>

                                <div class="form-group">
                                <input type="text" class="form-control" placeholder="Latitud" id="latitudin" name="vlatitud">
                                </div>
                                <button class="btn btn-success btn-block" type="submit" value="submit">Enviar</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2 mr-5 d-none d-lg-block d-xl-none">
            <p>
                <a href="#bloque4" class="btn btn-dark btn-block " aria-expanded="false" aria-controls="bloque4" data-toggle="collapse">Coordenadas</a>
            </p>
            <div class="collapse" id="bloque4">
                <div class="card card-block card-primary ">
                    <div class="card-text">
                    <form action="#" method="GET" id="coordenadas" onsubmit="return false" >
                                <div class="form-group">
                                <input type="text" class="form-control" placeholder="Longitud" id="longitudin" name="vlongitud">
                                </div>

                                <div class="form-group">
                                <input type="text" class="form-control" placeholder="Latitud" id="latitudin" name="vlatitud">
                                </div>
                                <button class="btn btn-success btn-block" type="submit" value="submit">Enviar</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2 mr-5 d-none d-xl-block">
            <p>
                <a href="#bloque5" class="btn btn-dark btn-block " aria-expanded="false" aria-controls="bloque5" data-toggle="collapse">Coordenadas</a>
            </p>
            <div class="collapse" id="bloque5">
                <div class="card card-block card-primary ">
                    <div class="card-text">
                    <form action="#" method="GET" id="coordenadas" onsubmit="return false" >
                                <div class="form-group">
                                <input type="text" class="form-control" placeholder="Longitud" id="longitudin" name="vlongitud">
                                </div>

                                <div class="form-group">
                                <input type="text" class="form-control" placeholder="Latitud" id="latitudin" name="vlatitud">
                                </div>
                                <button class="btn btn-success btn-block" type="submit" value="submit">Enviar</button>
                            </form>
                    </div>
                </div>
            </div>
        </div
    </div>
</div>      
   
        <!-- <div class="col mt-0" >
            <div class="embed-responsive embed-responsive-21by9 ">
                <div id="map-container" class="embed-responsive-item ">
                    <div id="map" class="border border-dark rounded">
                    </div>
                    <div id="botones" style="display: none">
                        <button class="btn btn-outline-secondary" id="boton1"></button>
                        <button class="btn btn-outline-secondary" id="boton2">FTT</button>
                        <button class="btn btn-outline-secondary" id="boton3">EDTR</button>
                    </div>
                </div> 
            </div>`
        </div> -->
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
                zoom: 8,
                mapTypeControl: true,
                mapTypeControlOptions: {
                    style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                    mapTypeIds: ['roadmap', 'terrain']
                    
                }   
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
            map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(centerControlDiv);

             // Resize stuff...
  google.maps.event.addDomListener(window, "resize", function() {
    var center = map.getCenter();
    google.maps.event.trigger(map, "resize");
    map.setCenter(center); 
  });
            
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


     
            <!-- <div class="list-group form-group" style="width: 40%; margin-left: 30%; margin-right: 30%; background-color: #a6a6a6; border-radius: 12px" id="form">
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
            </div> -->
        
   
    <footer class="footer fixed-bottom bg-dark text-light d-flex justify-content-center py-2">
       
       <div class="d-block d-sm-none">
       	<a  class="" id="texto"> Copyright &copy; <?php echo date('Y'); ?> by <font color="aqua"><a id="pie" href= "https://www.uv.mx" target="_blank"> UV. </a></a>
       </div>
       <div class="d-none d-sm-block d-md-none">
           <a  class="" id="texto"> Copyright &copy; <?php echo date('Y'); ?> by <font color="aqua"><a id="pie" href= "https://www.uv.mx" target="_blank"> Universidad Veracruzana. </a></font> All Rights Reserved.</a>
       </div>
       <div class="d-none d-md-block d-lg-none">
           <a  class="" id="texto"> Copyright &copy; <?php echo date('Y'); ?> by <font color="aqua"><a id="pie" href= "https://www.uv.mx" target="_blank"> Universidad Veracruzana. </a></font> All Rights Reserved.</a>
       </div>
       <div class="d-none d-lg-block d-xl-none">
           <a  class="" id="texto"> Copyright &copy; <?php echo date('Y'); ?> by <font color="aqua"><a id="pie" href= "https://www.uv.mx" target="_blank"> Universidad Veracruzana. </a></font> All Rights Reserved.</a>
       </div>
       <div class="d-none d-xl-block">
           <a  class="" id="texto"> Copyright &copy; <?php echo date('Y'); ?> by <font color="aqua"><a id="pie" href= "https://www.uv.mx" target="_blank" > Universidad Veracruzana. </a></font> All Rights Reserved.</a>
       </div>
    </footer>

</body>
</html>