<?php
require_once("../models/usuarios.php");
$mostrar = new Usuarios_Models();
$usuario = $_SESSION["iduser"];
$mostrar1 = $mostrar->busca_cm($usuario);


?>