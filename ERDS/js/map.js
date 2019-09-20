
$(document).ready(function(){

    var lista_coordenadas = <?php echo json_encode($lista_coordenadas)?>;
    var boton1 = document.createElement("BUTTON");
    var boton2 = document.createElement("BUTTON");
    var t1 = document.createTextNode("CLICK ME");
    var t2 = document.createTextNode("CLICK ME");
    var divButton = document.createElement("div");
    var espacio = document.createElement("BR");
    boton1.append(t1);
    boton2.append(t2);
    divButton.appendChild(boton1);
    divButton.appendChild(espacio);
    divButton.appendChild(boton2);
    boton1.onclick(function(){
        console.log("sirvio");
    });
    var map, flag = true;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 19.1537265, lng: -96.1507391},
        zoom: 10
        });

        var infowindow = new google.maps.InfoWindow();
        for (var i in lista_coordenadas){
              var marker =  new google.maps.Marker({
                position: {lat:parseFloat(lista_coordenadas[i].latitud), lng:parseFloat(lista_coordenadas[i].longitud)},
                map: map,
                title: lista_coordenadas[i].estacion

            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(divButton);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
   geocoder = new google.maps.Geocoder();

    var myParser = new geoXML3.parser({map: map});
    myParser.parse('../resources/plantilla_proyecto-trans.kml');

        function CenterControl(controlDiv, map, myParser, entra) {
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

            // Setup the click event listeners: simply set the map to Chicago.
            controlUI.addEventListener('click', function () {
                myParser.hideDocument();
                controlUI.style.backgroundColor = "gray";
                controlUI.style.borderColor = "gray";
                alert("Seleccione el lugar deseado");
                entra = 1;
                if(entra === 1){

                    console.log(entra);
                 google.maps.event.addListener(map, 'click', function listen(event) {
                        var coordenadas = event.latLng;
                        var lat = coordenadas.lat();
                        var lng = coordenadas.lng();
                        console.log(lat,lng);
                        alert("se extrae la info");
                        controlUI.style.backgroundColor = "white";
                        controlUI.style.borderColor = "white";
                        myParser.showDocument();
                        google.maps.event.clearListeners(map, '');
                    });
                    google.maps.event.clearListeners(map, 'listen');
                }
            });
        }

        var centerControlDiv = document.createElement('div');
        var centerControl = new CenterControl(centerControlDiv, map, myParser, 0);

        centerControlDiv.index = 1;
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);
    }
});
