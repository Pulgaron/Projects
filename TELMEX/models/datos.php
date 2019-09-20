<?php
    
class Datos_Models
{
    public function suspension_moderador($idUser, $Tipo)
    {
        try {
            $cambio = "UPDATE MUESTRA SET STATUS = :newstatus WHERE IDUSER = '$idUser'";
            $modificar = $this->db->prepare($cambio);
            $modificar->execute(array(":newstatus" => $Tipo));
            $modificar->closeCursor();
        } catch (Exception $e) {
            echo "Línea del error: " . $e->getLine() . "<br>";
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        } finally {
            $db = null;
        }
    }
}

?>