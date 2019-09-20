<?php

    $id = $_GET["Id"];
    require_once("../../../models/usuarios.php");
    $users = new Usuarios_Models();
    $users ->status_change($id,"B");
    header("Location:../../../views/Listado-adm.php");
?>