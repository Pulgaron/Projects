var coorde = [];
function toRadians(lat) {
    return lat * Math.PI / 180;
  };

 

function distance (lat, lng, lista_coordenadas, tipo_kml) {
    
    for(var i in lista_coordenadas){

        var R = 6371e3; // metres
        var φ1 = toRadians(lat);
        var φ2 = toRadians(lista_coordenadas[i].latitud);
        var Δφ = toRadians(lista_coordenadas[i].latitud-lat);
        var Δλ = toRadians(lista_coordenadas[i].longitud-lng);

        var a = Math.sin(Δφ/2) * Math.sin(Δφ/2) +
                Math.cos(φ1) * Math.cos(φ2) *
                Math.sin(Δλ/2) * Math.sin(Δλ/2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));

        var dist = R * c;
        var d = {
            distancia: dist,
            latitud: lat,
            longitud: lng,
            id: lista_coordenadas[i].estacion,
            tipo: lista_coordenadas[i].tipo
        }
        //console.log(d);
        coorde.push(d);
        
    }
    var coorde_no_sort = coorde;
    var coorde_sort = coorde.sort(function (a, b){
        return a.distancia - b.distancia;
    });

    var marker_elegido = elegido(coorde, tipo_kml);
    deleteMarker(marker_elegido.id, markers);
    coorde_sort = [];
    coorde = [];

   // deleteMarker(coorde_sort);
} 

function elegido(coorde, tipo_kml){
    for(var i = 0; i <= coorde.length; i++){
        if(tipo_kml == "g83bb5e9f34ce0075" || tipo_kml == "gb8d56b8701baf6d8"){
            if(coorde[i].tipo == "firme")
                return coorde[i];
        }
        if(tipo_kml == "ge989f2ce89fe688c" || tipo_kml == "g9e3b93f6cf031d2a" || tipo_kml == "g59763855d43669ae"){
            if(coorde[i].tipo == "aluvial")
                return coorde[i];
        }
        if(tipo_kml == "g5142ccf72782945a" || tipo_kml == "g4728ac673db4753e" || tipo_kml == "g009938c1f4b238a8" || tipo_kml == "g50372d975692be58"){
            if(coorde[i].tipo == "dunas")
                return coorde[i];
        }

    }
}


window.addEventListener('load', ()=> {

    var map = document.getElementById("map");
    var submitCoord = document.querySelector("#coordenadas");
    submitCoord.addEventListener('submit', () => {
        markerColors(markers);
        var latitud = document.getElementById("latitudin").value;
        var longitud = document.querySelector("#longitudin").value;
        
        var numLong = parseFloat(longitud);
        var numLat = parseFloat(latitud);
        distance(numLat, numLong, lista_coordenadas);

        
    });


   /* var map = document.getElementById("map");
    var submitCoord = document.querySelector("#coordenadas");
    submitCoord.addEventListener('submit', () => {

        var latitud = document.getElementById("latitudin").value;
        var longitud = document.querySelector("#longitudin").value;
        var numLong = parseInt(longitud);
        var numLat = parseInt(latitud);

        if ((numLat >= -90 || numLat <= 90) && (numLong >= -180 || numLong <= 180)){
            map.setZoom(15);
            map.setCenter({lat: numLat, lng: numLong});
        }
        else
            alert("¡Las coordenadas están fuera del rango permitido o el campo esta vacío!");

    });*/



});