<?php
$siglas = $_GET["BuscaCM"];
$nombre = $_GET["Central"];
echo "<script>\n";
echo "var cm='".$siglas."'\n";
echo "var nombre='".$nombre."'\n";
echo "</script>\n";
?>

<script type="text/javascript">

    function initMap() {

        var ver = {lat: 19.173773, lng: -96.13422409999998};

        var centralData = JSON.parse(document.getElementById('lista_coordenadas_central').innerHTML);
            showAll(centralData);



        function showAll(allData){
            Array.prototype.forEach.call(allData, function (data) {

                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 9,
                    center: new google.maps.LatLng(data.Latitud, data.Longitud),
                    mapTypeId: 'terrain'
                });
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(data.Latitud, data.Longitud),
                    map: map,
                    title: data.Nombre_central

                });

                string = "<h4>Nombre:</h4>"+data.Nombre_central+"<h4>No.Rpu:</h4>"+data.Rpu+"<h4>No. Medidor:</h4>"+data.No_medidor+"<h4>Respaldo Bat:</h4>"+data.Respaldo  ;
                var informacion = new google.maps.InfoWindow({
                    content: string
                });

                marker.addListener('click', function(){
                    informacion.open(map, marker)
                });


            })
        }


    }

</script>

