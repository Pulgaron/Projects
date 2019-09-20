<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<?php

//Recupero los datos mandados desde el formulario...
$Nombre = htmlentities(addslashes($_POST["Nombre"]));
$Apellido = htmlentities(addslashes($_POST["Apellido"]));
$Apodo = htmlentities(addslashes($_POST["Usuario/apodo"]));
$CM = htmlentities(addslashes($_POST["CM"]));
$Correo = htmlentities(addslashes($_POST["correo"]));
$contrasenia = htmlentities(addslashes($_POST["contra"]));
require_once("../models/usuarios.php");
$validaciones = new Usuarios_Models();
$valida = $validaciones->verifica_existencia($Apodo,$Correo);

if (!$valida) {//Si valida es false entra! ya que no encontro ningún correo o apodo parecidos.., e ingresa un nuevo usuario...!
    $user = new Usuarios_Models();
    $user->nuevo_usuario($Nombre,$Apellido,$Apodo,$CM,$contrasenia,$Correo);
    header("Location:../views/InicioSesion.php");
    #Agregar la alerta "Su solicitud esta pendiendte!"

?>
<script type="text/javascript">
$(".alert").alert()
</script>

<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">HOLAAA!!</span>
</button>
<?php
} else {
#    header("Location:../views/no_found.php");
echo "Apodo y/o Correo existente!";//header("Location:../signup.html");
}
?>
