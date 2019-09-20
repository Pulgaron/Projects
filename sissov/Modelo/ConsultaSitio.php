<?php

class ConsultaSitio_Models
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

    public function getconsultaSitioMin(){
        try{
            $consulta = $this->DB->query("SELECT @n := @n +1  id, tipositio.NombreSitio as Tipositio, municipios.Municipio as Municipio, Descripcion_Ubicacion as Ubicacion, estadooperacion.EstadoOperacion as Operacion, Area_en_ha as Dimension, Toneladas_por_dia as Toneladas FROM sitios, tipositio, municipios, estadooperacion, (select @n := 0) m
            where Estado_Operacion != 5
            and Toneladas_por_dia != 0
            and sitios.TipoSitio = tipositio.idTipoSitio
            and left (sitios.idSitio, 7) = municipios.idMunicipios
            and sitios.Estado_Operacion = estadooperacion.idEstadoOperacion
            ORDER BY Toneladas_por_dia ASC
            Limit 3");
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


    public function getconsultaSitioMax(){
        try{
            $consulta = $this->DB->query("SELECT @n := @n +1  id, tipositio.NombreSitio as Tipositio, municipios.Municipio as Municipio, Descripcion_Ubicacion as Ubicacion, estadooperacion.EstadoOperacion as Operacion, Area_en_ha as Dimension, Toneladas_por_dia as Toneladas FROM sitios, tipositio, municipios, estadooperacion, (select @n := 0) m
            where Estado_Operacion != 5
            and Toneladas_por_dia != 0
            and sitios.TipoSitio = tipositio.idTipoSitio
            and left (sitios.idSitio, 7) = municipios.idMunicipios
            and sitios.Estado_Operacion = estadooperacion.idEstadoOperacion
            ORDER BY Toneladas_por_dia DESC
            Limit 3");
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

    public function getconsultaTotalSDF(){
        try{
            $consulta = $this->DB->query("SELECT COUNT(idTabla) as SDF
            FROM sitios");
            while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
                $this->consulta = $registro;
            }

            $DB = null;
            return $this->consulta;
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


    public function getconsultaTotalRS(){
        try{
            $consulta = $this->DB->query("SELECT COUNT(idTabla) as RS
            FROM sitios
            where TipoSitio = 1");
            while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
                $this->consulta = $registro;
            }

            $DB = null;
            return $this->consulta;
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


    public function getconsultaTotalRSP(){
        try{
            $consulta = $this->DB->query("SELECT COUNT(idTabla) as RSP
            FROM sitios
            where TipoSitio = 2");
            while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
                $this->consulta = $registro;
            }

            $DB = null;
            return $this->consulta;
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


    public function getconsultaTotalSC(){
        try{
            $consulta = $this->DB->query("SELECT COUNT(idTabla) as SC
            FROM sitios
            where TipoSitio = 3");
            while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
                $this->consulta = $registro;
            }

            $DB = null;
            return $this->consulta;
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

    public function getconsultaTotalTCA(){
        try{
            $consulta = $this->DB->query("SELECT COUNT(idTabla) as TCA
            FROM sitios
            where TipoSitio = 4");
            while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
                $this->consulta = $registro;
            }

            $DB = null;
            return $this->consulta;
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

    public function getconsultaTotalTCAP(){
        try{
            $consulta = $this->DB->query("SELECT COUNT(idTabla) as TCAP
            FROM sitios
            where TipoSitio = 5");
            while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
                $this->consulta = $registro;
            }

            $DB = null;
            return $this->consulta;
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


    public function getconsultaTotalTC(){
        try{
            $consulta = $this->DB->query("SELECT COUNT(idTabla) as TC
            FROM sitios
            where TipoSitio = 6");
            while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
                $this->consulta = $registro;
            }

            $DB = null;
            return $this->consulta;
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

    public function getconsultaTotalTCo(){
        try{
            $consulta = $this->DB->query("SELECT COUNT(idTabla) as TCo
            FROM sitios
            where TipoSitio = 7");
            while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
                $this->consulta = $registro;
            }

            $DB = null;
            return $this->consulta;
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

    public function getconsultaTotalTCP(){
        try{
            $consulta = $this->DB->query("SELECT COUNT(idTabla) as TCP
            FROM sitios
            where TipoSitio = 8");
            while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
                $this->consulta = $registro;
            }

            $DB = null;
            return $this->consulta;
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


    public function getconsultaTotalTSC(){
        try{
            $consulta = $this->DB->query("SELECT COUNT(idTabla) as TSC
            FROM sitios
            where TipoSitio = 9");
            while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
                $this->consulta = $registro;
            }

            $DB = null;
            return $this->consulta;
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