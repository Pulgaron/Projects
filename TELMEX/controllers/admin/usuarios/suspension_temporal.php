<?php


#Recibo el id
$id = $_GET["Id"];
require_once("../../../models/usuarios.php");
$user = new Usuarios_Models();
$user->status_change($id,'S');
header("Location:../../../views/Listado-adm.php");

/*
$DKL_bandera = false;
foreach ($datos as $apunta) {
    $name = $apunta['Nombre'];
    $lastname = $apunta['Apellido'];
    $apodo = $apunta['Apodo'];
    $correo = $apunta['correo'];
    $DKL_bandera = true;
}
$texto_mail = utf8_decode("Hola! " . $name . " " . $lastname . "\nAlias: " . $apodo . "\nTu cuenta ha sido suspendida temporalmente!\nPor no cumplir con las normas del sitio.\n\nSi necesitas una aclaración no dudes en ponerte en contacto con: soporteCaudalEco@gmail.com");
$destinatario = htmlentities(addslashes($correo));
$asunto = utf8_decode("Suspencion temporal");
$headers = "MIME-Version: 1.0\r\n";
// .= es para concatenar
$headers .= "Content_type: text/html; charse=iso-8859-1\r\n";
$headers .= "From: soporteCaudalEco & DKL&Derek < soporteCaudalEco@gmail.com >";
$exito = mail($destinatario,$asunto,$texto_mail,$headers);
if ($exito) { //==true
    echo "Mensaje enviado!";
    header("Location:../../../views/listado_usuarios.php");
}else {
    echo "Su mensaje no se envio, verifique su cuenta de correo...";
    header("Location:../../../views/listado_usuarios.php");
}
*/
?>