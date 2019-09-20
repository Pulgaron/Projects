<?php

class coordenadasModel
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

/*SELECT idSitio, municipios.Municipio ,Latitud,
Longitud, tipositio.NombreSitio as tipositio, Toneladas_por_dia,estadooperacion.EstadoOperacion as Edo_operacion
FROM sitios, municipios, tipositio, estadooperacion
where sitios.Municipio = municipios.idMunicipios
and sitios.TipoSitio = tipositio.idTipoSitio
and sitios.Estado_Operacion = estadooperacion.idEstadoOperacion*/


/*SELECT idSitio, municipios.Municipio, CASE WHEN Proyecto_Ejecutivo = 1 THEN 'Si' ELSE 'No' END as Proyecto_Ejecutivo,
            CASE WHEN Cumple_Norma = 1 THEN 'Si' ELSE 'No' END as Cumple_Norma, CASE WHEN Pepena = 1 THEN 'Si' ELSE 'No' END as Pepena
            FROM sitios, municipios
            where sitios.Municipio = municipios.idMunicipios*/

    public function getcoordenadas(){
        try{
            $consulta = $this->DB->query("SELECT idSitio, municipios.Municipio,Latitud,Longitud, tipositio.NombreSitio as tipositio, CASE WHEN Proyecto_Ejecutivo = 1 THEN 'Si' ELSE 'No' END as Proyecto_Ejecutivo,
            CASE WHEN Cumple_Norma = 1 THEN 'Si' ELSE 'No' END as Cumple_Norma, CASE WHEN Pepena = 1 THEN 'Si' ELSE 'No' END as Pepena
            FROM sitios, tipositio, municipios
            where  sitios.TipoSitio = tipositio.idTipoSitio
            and left(sitios.idSitio, 7) =  municipios.idMunicipios 
            order by sitios.idSitio");
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

    public function getcoordenadas_estado($estado){
        try{
            $consulta = $this->DB->query("SELECT idSitio, municipios.Municipio,Latitud,Longitud, tipositio.NombreSitio as tipositio, CASE WHEN Proyecto_Ejecutivo = 1 THEN 'Si' ELSE 'No' END as Proyecto_Ejecutivo,
            CASE WHEN Cumple_Norma = 1 THEN 'Si' ELSE 'No' END as Cumple_Norma, CASE WHEN Pepena = 1 THEN 'Si' ELSE 'No' END as Pepena
            FROM sitios, tipositio, municipios
            where  sitios.TipoSitio = tipositio.idTipoSitio
            and  left(sitios.idSitio, 2) = '$estado'
            and municipios.idMunicipios = left(sitios.idSitio,7)
            group by sitios.idSitio");
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

    

     public function getcoordenadas_region($region){
        try{
            $consulta = $this->DB->query("SELECT idSitio, municipios.Municipio,Latitud,Longitud, tipositio.NombreSitio as tipositio, CASE WHEN Proyecto_Ejecutivo = 1 THEN 'Si' ELSE 'No' END as Proyecto_Ejecutivo,
            CASE WHEN Cumple_Norma = 1 THEN 'Si' ELSE 'No' END as Cumple_Norma, CASE WHEN Pepena = 1 THEN 'Si' ELSE 'No' END as Pepena
            FROM sitios, tipositio, municipios, region
            where  sitios.TipoSitio = tipositio.idTipoSitio
            and left(sitios.idSitio, 7) =  municipios.idMunicipios 
            and left(sitios.idSitio, 4) = '$region'
			group by municipios.Municipio
            order by municipios.Municipio");
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

    public function getcoordenadas_municipio($municipio){
        try{
            $consulta = $this->DB->query("SELECT idSitio, municipios.Municipio,Latitud,Longitud, tipositio.NombreSitio as tipositio, CASE WHEN Proyecto_Ejecutivo = 1 THEN 'Si' ELSE 'No' END as Proyecto_Ejecutivo,
            CASE WHEN Cumple_Norma = 1 THEN 'Si' ELSE 'No' END as Cumple_Norma, CASE WHEN Pepena = 1 THEN 'Si' ELSE 'No' END as Pepena
            FROM sitios, tipositio, municipios
            where  sitios.TipoSitio = tipositio.idTipoSitio
            and municipios.idMunicipios = left(sitios.idSitio,7)
            and left(sitios.idSitio, 7) = '$municipio'");
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