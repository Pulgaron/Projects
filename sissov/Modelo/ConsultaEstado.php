<?php

class ConsultaEstado_Models
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

    public function getconsultaEstado($estado){
        try{
            $consulta = $this->DB->query("select estado.Estado, municipios.Municipio, tipositio.NombreSitio, 
            estadooperacion.EstadoOperacion, Toneladas_por_dia, Anios_vida_util, CASE WHEN Proyecto_Ejecutivo = 1 THEN 'Si' ELSE 'No' END as Proyecto_Ejecutivo, 
            CASE WHEN Cumple_Norma = 1 THEN 'Si' ELSE 'No' END as Cumple_Norma, CASE WHEN Pepena = 1 THEN 'Si' ELSE 'No' END as Pepena
            from estado, sitios, municipios, tipositio, estadooperacion
            where municipios.idMunicipios = sitios.Municipio
            and tipositio.idTipoSitio = sitios.TipoSitio
            and estadooperacion.idEstadoOperacion = sitios.Estado_Operacion
            and estado.idEstado = '$estado'");


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

    public function getEstado(){
        try{
            $consulta = $this->DB->query("select idEstado,Estado from estado
            where Status = 1");
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

    }
}
?>