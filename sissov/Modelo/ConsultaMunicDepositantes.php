<?php

class ConsultaMunicDepositates_Models
{
    private $DB;
    private $usuarios;
    private $value;

    public function __construct()
    {
        require_once("conexion.php");
        $this->DB = Conectar::conexion();
        $this->puntos = array();
        $this->value = 0;
    }

    public function getconsultaDepositantes($md){
        try{
            $consulta = $this->DB->query("select municipios.Municipio as Municipio, toneladas as Toneladas_depositadas from municipios, depositantes
            where depositantes.idSitio = '$md'
            and depositantes.idMunicipio = municipios.idMunicipios");
            while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
                $this->puntos[] = $registro;
            }

            $DB = null;
            return $this->puntos;
        }
        catch(Exception $e){
            echo "linea de error".$e->getLine()."<br>";
            echo "excepcion".$e->getMessage();
        }
        /*
        finally{
            $DB = null;
        }*/
    }
}
?>