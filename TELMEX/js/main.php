<?php
$siglas = $_GET["BuscaCM"];
echo "<script>\n";
echo "var cm='".$siglas."'\n";
echo "</script>\n";
?>

<script type="text/javascript">

    function initMap() {

        var ver = {lat: 19.173773, lng: -96.13422409999998};
        var sax = {lat: 18.4223967, lng: -95.2413835};
        var cos = {lat: 18.3937197, lng: -95.7980001};
        var posicionMapa;
        if (cm === 'VER') {
            posicionMapa = ver;
        }
        else if (cm === 'SAX') {
            posicionMapa = sax;
        }
        else {
            posicionMapa = cos;
        }


        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 9,
            center: posicionMapa,
            mapTypeId: 'terrain'
        });





            var allData = JSON.parse(document.getElementById('lista_coordenadas').innerHTML);
            showAll(allData);




       /*
               var marker = new google.maps.Marker({
                 position:agroc,
                 map: map,
                 title: "Central Agrocentro"
               });

                var informacion = new google.maps.InfoWindow({
                 content: "Central Agrocentro GVE"
               });

               marker.addListener('click', function(){
                 informacion.open(map, marker)
               });
               /*MARCADOR 2
               var marker2 = new google.maps.Marker({
                 position:br,
                 map: map,
                 title: "Boca del Rio"
               });

                var informacion1 = new google.maps.InfoWindow({
                 content: "Central Boca del Río"
               });

               marker2.addListener('click', function(){
                 informacion1.open(map, marker2)
               });
                /*MARCADOR 3
               var marker3 = new google.maps.Marker({
                 position:aerop,
                 map: map,
                 title: "Aeropuerto"
               });

                var informacion3 = new google.maps.InfoWindow({
                 content: "Central Aeropuerto AEW"
               });

               marker3.addListener('click', function(){
                 informacion3.open(map, marker3)
               });
                 /*MARCADOR 4
               var marker4 = new google.maps.Marker({
                 position:alv,
                 map: map,
                 title: "Alvarado"
               });

                var informacion4 = new google.maps.InfoWindow({
                 content: "Central Alvarado ALV"
               });

               marker4.addListener('click', function(){
                 informacion4.open(map, marker4)
               });
                   /*MARCADOR 5
               var marker5 = new google.maps.Marker({
                 position:azr,
                 map: map,
                 title: "Anton Lizardo"
               });

                var informacion5 = new google.maps.InfoWindow({
                 content: "Central Anton Lizardo AZR"
               });

               marker5.addListener('click', function(){
                 informacion5.open(map, marker5)
               });
                  /*MARCADOR 6
               var marker6 = new google.maps.Marker({
                 position:rvo,
                 map: map,
                 title: "Arbolillo"
               });

                var informacion6 = new google.maps.InfoWindow({
                 content: "Central Arbolillo RVO"
               });

               marker6.addListener('click', function(){
                 informacion6.open(map, marker6)
               });

       */
       function showAll(allData){
           Array.prototype.forEach.call(allData, function (data) {
               var marker = new google.maps.Marker({
                   position: new google.maps.LatLng(data.Latitud, data.Longitud),
                   map: map,
                   title: data.Nombre_central

               })

           })
       }

        function showAll(allData){
            Array.prototype.forEach.call(allData, function (data) {
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(data.Latitud, data.Longitud),
                    map: map,
                    title: data.Nombre_central

                })

            })
        }
      }

</script>

