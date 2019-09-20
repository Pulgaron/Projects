$(document).ready(function(){
    $("#estado").on('change', function () {
        $("#estado option:selected").each(function () {
            elegido=$(this).val();
            $.post("Controlador/consulta_municipio_estado.php", { elegido: elegido }, function(data){
                
        
                $("#municipio").html(data);
            });			
        });
    });

    $("#estado").on('change', function () {
        $("#estado option:selected").each(function () {
            elegido=$(this).val();
            $.post("Controlador/consulta_region.php", { elegido: elegido }, function(data){

                $("#region").html(data);
            });			
        });
   });

   $("#region").on('change', function () {
    $("#region option:selected").each(function () {
        elegido=$(this).val();
        $.post("Controlador/consulta_municipio.php", { elegido: elegido }, function(data){
            $("#municipio").html(data);
        });			
    });
});

    
});