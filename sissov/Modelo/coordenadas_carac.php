<?php
class coordenadasCaracModel
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

    public function getcoordenadas_estado_tipositio($estado, $tipositio){
        try{
            $consulta = $this->DB->query("SELECT idSitio, municipios.Municipio,Latitud,Longitud, tipositio.NombreSitio as tipositio, CASE WHEN Proyecto_Ejecutivo = 1 THEN 'Si' ELSE 'No' END as Proyecto_Ejecutivo,
            CASE WHEN Cumple_Norma = 1 THEN 'Si' ELSE 'No' END as Cumple_Norma, CASE WHEN Pepena = 1 THEN 'Si' ELSE 'No' END as Pepena
            FROM sitios, tipositio, municipios
            where  sitios.TipoSitio = tipositio.idTipoSitio
            and  left(sitios.idSitio, 2) = '$estado'
            and municipios.idMunicipios = left(sitios.idSitio,7)
            and tipositio.idTipoSitio = '$tipositio'
            group by sitios.idSitio
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

    public function getcoordenadas_estado_tipositio_estadooperacion($estado, $tipositio, $estadooperacion){
        try{
            $consulta = $this->DB->query("SELECT idSitio, municipios.Municipio,Latitud,Longitud, tipositio.NombreSitio as tipositio, CASE WHEN Proyecto_Ejecutivo = 1 THEN 'Si' ELSE 'No' END as Proyecto_Ejecutivo,
            CASE WHEN Cumple_Norma = 1 THEN 'Si' ELSE 'No' END as Cumple_Norma, CASE WHEN Pepena = 1 THEN 'Si' ELSE 'No' END as Pepena
            FROM sitios, tipositio, municipios
            where  sitios.TipoSitio = tipositio.idTipoSitio
            and  left(sitios.idSitio, 2) = '$estado'
            and municipios.idMunicipios = left(sitios.idSitio,7)
            and tipositio.idTipoSitio = '$tipositio'
            and sitios.Estado_Operacion = '$estadooperacion'
            group by sitios.idSitio
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

    public function getcoordenadas_estado_estadooperacion($estado, $estadooperacion){
        try{
            $consulta = $this->DB->query("SELECT idSitio, municipios.Municipio,Latitud,Longitud, tipositio.NombreSitio as tipositio, CASE WHEN Proyecto_Ejecutivo = 1 THEN 'Si' ELSE 'No' END as Proyecto_Ejecutivo,
            CASE WHEN Cumple_Norma = 1 THEN 'Si' ELSE 'No' END as Cumple_Norma, CASE WHEN Pepena = 1 THEN 'Si' ELSE 'No' END as Pepena
            FROM sitios, tipositio, municipios
            where  sitios.TipoSitio = tipositio.idTipoSitio
            and  left(sitios.idSitio, 2) = '$estado'
            and municipios.idMunicipios = left(sitios.idSitio,7)
            and sitios.Estado_Operacion = '$estadooperacion'
            group by sitios.idSitio
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

    public function getcoordenadas_estado_tipositio_estadooperacion_toneladas($estado,$tipositio, $estadooperacion, $toneladas){
        try{
            $consulta = $this->DB->query("SELECT idSitio, municipios.Municipio,Latitud,Longitud, tipositio.NombreSitio as tipositio, CASE WHEN Proyecto_Ejecutivo = 1 THEN 'Si' ELSE 'No' END as Proyecto_Ejecutivo,
            CASE WHEN Cumple_Norma = 1 THEN 'Si' ELSE 'No' END as Cumple_Norma, CASE WHEN Pepena = 1 THEN 'Si' ELSE 'No' END as Pepena
            FROM sitios, tipositio, municipios
            where  sitios.TipoSitio = tipositio.idTipoSitio
            and  left(sitios.idSitio, 2) = '$estado'
            and municipios.idMunicipios = left(sitios.idSitio,7)
            and tipositio.idTipoSitio = '$tipositio'
            and sitios.Estado_Operacion = '$estadooperacion'
            and  case
					when '$toneladas' = 1 then Toneladas_por_dia between 0 and 200
                    when '$toneladas' = 2 then Toneladas_por_dia between 201 and 400
                    when '$toneladas' = 3 then Toneladas_por_dia between 401 and 600
                    when '$toneladas' = 4 then Toneladas_por_dia between 601 and 800
                    else Toneladas_por_dia between 801 and 1000 END
            group by sitios.idSitio
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

    public function getcoordenadas_estado_tipositio_toneladas($estado,$tipositio, $toneladas){
        try{
            $consulta = $this->DB->query("SELECT idSitio, municipios.Municipio,Latitud,Longitud, tipositio.NombreSitio as tipositio, CASE WHEN Proyecto_Ejecutivo = 1 THEN 'Si' ELSE 'No' END as Proyecto_Ejecutivo,
            CASE WHEN Cumple_Norma = 1 THEN 'Si' ELSE 'No' END as Cumple_Norma, CASE WHEN Pepena = 1 THEN 'Si' ELSE 'No' END as Pepena
            FROM sitios, tipositio, municipios
            where  sitios.TipoSitio = tipositio.idTipoSitio
            and  left(sitios.idSitio, 2) = '$estado'
            and municipios.idMunicipios = left(sitios.idSitio,7)
            and tipositio.idTipoSitio = '$tipositio'
            and  case
					when '$toneladas' = 1 then Toneladas_por_dia between 0 and 200
                    when '$toneladas' = 2 then Toneladas_por_dia between 201 and 400
                    when '$toneladas' = 3 then Toneladas_por_dia between 401 and 600
                    when '$toneladas' = 4 then Toneladas_por_dia between 601 and 800
                    else Toneladas_por_dia between 801 and 1000 END
            group by sitios.idSitio
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

    public function getcoordenadas_estado_estadooperacion_toneladas($estado, $estadooperacion, $toneladas){
        try{
            $consulta = $this->DB->query("SELECT idSitio, municipios.Municipio,Latitud,Longitud, tipositio.NombreSitio as tipositio, CASE WHEN Proyecto_Ejecutivo = 1 THEN 'Si' ELSE 'No' END as Proyecto_Ejecutivo,
            CASE WHEN Cumple_Norma = 1 THEN 'Si' ELSE 'No' END as Cumple_Norma, CASE WHEN Pepena = 1 THEN 'Si' ELSE 'No' END as Pepena
            FROM sitios, tipositio, municipios
            where  sitios.TipoSitio = tipositio.idTipoSitio
            and  left(sitios.idSitio, 2) = '$estado'
            and municipios.idMunicipios = left(sitios.idSitio,7)
            and sitios.Estado_Operacion = '$estadooperacion'
            and  case
					when '$toneladas' = 1 then Toneladas_por_dia between 0 and 200
                    when '$toneladas' = 2 then Toneladas_por_dia between 201 and 400
                    when '$toneladas' = 3 then Toneladas_por_dia between 401 and 600
                    when '$toneladas' = 4 then Toneladas_por_dia between 601 and 800
                    else Toneladas_por_dia between 801 and 1000 END
            group by sitios.idSitio
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

    public function getcoordenadas_estado_toneladas($estado, $toneladas){
        try{
            $consulta = $this->DB->query("SELECT idSitio, municipios.Municipio,Latitud,Longitud, tipositio.NombreSitio as tipositio, CASE WHEN Proyecto_Ejecutivo = 1 THEN 'Si' ELSE 'No' END as Proyecto_Ejecutivo,
            CASE WHEN Cumple_Norma = 1 THEN 'Si' ELSE 'No' END as Cumple_Norma, CASE WHEN Pepena = 1 THEN 'Si' ELSE 'No' END as Pepena
            FROM sitios, tipositio, municipios
            where  sitios.TipoSitio = tipositio.idTipoSitio
            and  left(sitios.idSitio, 2) = '$estado'
            and municipios.idMunicipios = left(sitios.idSitio,7)
            and  case
					when '$toneladas' = 1 then sitios.Toneladas_por_dia between 0 and 200
                    when '$toneladas' = 2 then sitios.Toneladas_por_dia between 201 and 400
                    when '$toneladas' = 3 then sitios.Toneladas_por_dia between 401 and 600
                    when '$toneladas' = 4 then sitios.Toneladas_por_dia between 601 and 800
                    else Toneladas_por_dia between 801 and 1000 END
            group by sitios.idSitio
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

    public function getcoordenadas_estado_anios($estado, $anios){
        try{
            $consulta = $this->DB->query("SELECT idSitio, municipios.Municipio,Latitud,Longitud, tipositio.NombreSitio as tipositio, CASE WHEN Proyecto_Ejecutivo = 1 THEN 'Si' ELSE 'No' END as Proyecto_Ejecutivo,
            CASE WHEN Cumple_Norma = 1 THEN 'Si' ELSE 'No' END as Cumple_Norma, CASE WHEN Pepena = 1 THEN 'Si' ELSE 'No' END as Pepena
            FROM sitios, tipositio, municipios
            where  sitios.TipoSitio = tipositio.idTipoSitio
            and  left(sitios.idSitio, 2) = '$estado'
            and municipios.idMunicipios = left(sitios.idSitio,7)
            and  case
					when '$anios' = 1 then sitios.Anios_vida_util between 0 and 10
                    when '$anios' = 2 then sitios.Anios_vida_util between 11 and 20
                    else sitios.Anios_vida_util between 21 and 30 END
            group by sitios.idSitio
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

    public function getcoordenadas_estado_tipositio_estadooperacion_toneladas_anios($estado,$tipositio, $estadooperacion, $toneladas, $anios){
        try{
            $consulta = $this->DB->query("SELECT idSitio, municipios.Municipio,Latitud,Longitud, tipositio.NombreSitio as tipositio, CASE WHEN Proyecto_Ejecutivo = 1 THEN 'Si' ELSE 'No' END as Proyecto_Ejecutivo,
            CASE WHEN Cumple_Norma = 1 THEN 'Si' ELSE 'No' END as Cumple_Norma, CASE WHEN Pepena = 1 THEN 'Si' ELSE 'No' END as Pepena
            FROM sitios, tipositio, municipios
            where  sitios.TipoSitio = tipositio.idTipoSitio
            and  left(sitios.idSitio, 2) = '$estado'
            and municipios.idMunicipios = left(sitios.idSitio,7)
            and tipositio.idTipoSitio = '$tipositio'
            and sitios.Estado_Operacion = '$estadooperacion'
            and  case
					when '$toneladas' = 1 then Toneladas_por_dia between 0 and 200
                    when '$toneladas' = 2 then Toneladas_por_dia between 201 and 400
                    when '$toneladas' = 3 then Toneladas_por_dia between 401 and 600
                    when '$toneladas' = 4 then Toneladas_por_dia between 601 and 800
                    else Toneladas_por_dia between 801 and 1000 END
            and  case
					when '$anios' = 1 then sitios.Anios_vida_util between 0 and 10
                    when '$anios' = 2 then sitios.Anios_vida_util between 11 and 20
                    else sitios.Anios_vida_util between 21 and 30 END
            group by sitios.idSitio
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

    public function getcoordenadas_estado_estadooperacion_toneladas_anios($state,$edo_operacion, $toneladas ,$anios){
        try{
            $consulta = $this->DB->query("SELECT idSitio, municipios.Municipio,Latitud,Longitud, tipositio.NombreSitio as tipositio, CASE WHEN Proyecto_Ejecutivo = 1 THEN 'Si' ELSE 'No' END as Proyecto_Ejecutivo,
            CASE WHEN Cumple_Norma = 1 THEN 'Si' ELSE 'No' END as Cumple_Norma, CASE WHEN Pepena = 1 THEN 'Si' ELSE 'No' END as Pepena
            FROM sitios, tipositio, municipios
            where  sitios.TipoSitio = tipositio.idTipoSitio
            and  left(sitios.idSitio, 2) = '$state'
            and municipios.idMunicipios = left(sitios.idSitio,7)
            and sitios.Estado_Operacion = '$edo_operacion'
            and  case
					when '$toneladas' = 1 then Toneladas_por_dia between 0 and 200
                    when '$toneladas' = 2 then Toneladas_por_dia between 201 and 400
                    when '$toneladas' = 3 then Toneladas_por_dia between 401 and 600
                    when '$toneladas' = 4 then Toneladas_por_dia between 601 and 800
                    else Toneladas_por_dia between 801 and 1000 END
            and  case
					when '$anios' = 1 then sitios.Anios_vida_util between 0 and 10
                    when '$anios' = 2 then sitios.Anios_vida_util between 11 and 20
                    else sitios.Anios_vida_util between 21 and 30 END
            group by sitios.idSitio
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

    public function getcoordenadas_estado_tipositio_toneladas_anios($state,$tipositio, $toneladas ,$anios){
        try{
            $consulta = $this->DB->query("SELECT idSitio, municipios.Municipio,Latitud,Longitud, tipositio.NombreSitio as tipositio, CASE WHEN Proyecto_Ejecutivo = 1 THEN 'Si' ELSE 'No' END as Proyecto_Ejecutivo,
            CASE WHEN Cumple_Norma = 1 THEN 'Si' ELSE 'No' END as Cumple_Norma, CASE WHEN Pepena = 1 THEN 'Si' ELSE 'No' END as Pepena
            FROM sitios, tipositio, municipios
            where  sitios.TipoSitio = tipositio.idTipoSitio
            and  left(sitios.idSitio, 2) = '$state'
            and municipios.idMunicipios = left(sitios.idSitio,7)
            and tipositio.idTipoSitio = '$tipositio'
            and  case
					when '$toneladas' = 1 then Toneladas_por_dia between 0 and 200
                    when '$toneladas' = 2 then Toneladas_por_dia between 201 and 400
                    when '$toneladas' = 3 then Toneladas_por_dia between 401 and 600
                    when '$toneladas' = 4 then Toneladas_por_dia between 601 and 800
                    else Toneladas_por_dia between 801 and 1000 END
            and  case
					when '$anios' = 1 then sitios.Anios_vida_util between 0 and 10
                    when '$anios' = 2 then sitios.Anios_vida_util between 11 and 20
                    else sitios.Anios_vida_util between 21 and 30 END
            group by sitios.idSitio
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

    public function getcoordenadas_estado_tipositio_estadooperacionanios($state,$tipositio,$edo_operacion ,$anios){
        try{
            $consulta = $this->DB->query("SELECT idSitio, municipios.Municipio,Latitud,Longitud, tipositio.NombreSitio as tipositio, CASE WHEN Proyecto_Ejecutivo = 1 THEN 'Si' ELSE 'No' END as Proyecto_Ejecutivo,
            CASE WHEN Cumple_Norma = 1 THEN 'Si' ELSE 'No' END as Cumple_Norma, CASE WHEN Pepena = 1 THEN 'Si' ELSE 'No' END as Pepena
            FROM sitios, tipositio, municipios
            where  sitios.TipoSitio = tipositio.idTipoSitio
            and  left(sitios.idSitio, 2) = '$state'
            and municipios.idMunicipios = left(sitios.idSitio,7)
            and tipositio.idTipoSitio = '$tipositio'
            and sitios.Estado_Operacion = '$edo_operacion'
            and  case
					when '$anios' = 1 then sitios.Anios_vida_util between 0 and 10
                    when '$anios' = 2 then sitios.Anios_vida_util between 11 and 20
                    else sitios.Anios_vida_util between 21 and 30 END
            group by sitios.idSitio
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

    public function getcoordenadas_estado_tipositio_anios($state,$tipositio ,$anios){
        try{
            $consulta = $this->DB->query("SELECT idSitio, municipios.Municipio,Latitud,Longitud, tipositio.NombreSitio as tipositio, CASE WHEN Proyecto_Ejecutivo = 1 THEN 'Si' ELSE 'No' END as Proyecto_Ejecutivo,
            CASE WHEN Cumple_Norma = 1 THEN 'Si' ELSE 'No' END as Cumple_Norma, CASE WHEN Pepena = 1 THEN 'Si' ELSE 'No' END as Pepena
            FROM sitios, tipositio, municipios
            where  sitios.TipoSitio = tipositio.idTipoSitio
            and  left(sitios.idSitio, 2) = '$state'
            and municipios.idMunicipios = left(sitios.idSitio,7)
            and tipositio.idTipoSitio = '$tipositio'
            and  case
					when '$anios' = 1 then sitios.Anios_vida_util between 0 and 10
                    when '$anios' = 2 then sitios.Anios_vida_util between 11 and 20
                    else sitios.Anios_vida_util between 21 and 30 END
            group by sitios.idSitio
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

    public function getcoordenadas_estado_toneladas_anios($state, $toneladas ,$anios){
        try{
            $consulta = $this->DB->query("SELECT idSitio, municipios.Municipio,Latitud,Longitud, tipositio.NombreSitio as tipositio, CASE WHEN Proyecto_Ejecutivo = 1 THEN 'Si' ELSE 'No' END as Proyecto_Ejecutivo,
            CASE WHEN Cumple_Norma = 1 THEN 'Si' ELSE 'No' END as Cumple_Norma, CASE WHEN Pepena = 1 THEN 'Si' ELSE 'No' END as Pepena
            FROM sitios, tipositio, municipios
            where  sitios.TipoSitio = tipositio.idTipoSitio
            and  left(sitios.idSitio, 2) = '$state'
            and municipios.idMunicipios = left(sitios.idSitio,7)
            and  case
					when '$toneladas' = 1 then Toneladas_por_dia between 0 and 200
                    when '$toneladas' = 2 then Toneladas_por_dia between 201 and 400
                    when '$toneladas' = 3 then Toneladas_por_dia between 401 and 600
                    when '$toneladas' = 4 then Toneladas_por_dia between 601 and 800
                    else Toneladas_por_dia between 801 and 1000 END
            and  case
					when '$anios' = 1 then sitios.Anios_vida_util between 0 and 10
                    when '$anios' = 2 then sitios.Anios_vida_util between 11 and 20
                    else sitios.Anios_vida_util between 21 and 30 END
            group by sitios.idSitio
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

    public function getcoordenadas_estado_estadooperacion_anios($state,$edo_operacion ,$anios){
        try{
            $consulta = $this->DB->query("SELECT idSitio, municipios.Municipio,Latitud,Longitud, tipositio.NombreSitio as tipositio, CASE WHEN Proyecto_Ejecutivo = 1 THEN 'Si' ELSE 'No' END as Proyecto_Ejecutivo,
            CASE WHEN Cumple_Norma = 1 THEN 'Si' ELSE 'No' END as Cumple_Norma, CASE WHEN Pepena = 1 THEN 'Si' ELSE 'No' END as Pepena
            FROM sitios, tipositio, municipios
            where  sitios.TipoSitio = tipositio.idTipoSitio
            and  left(sitios.idSitio, 2) = '$state'
            and municipios.idMunicipios = left(sitios.idSitio,7)
            and sitios.Estado_Operacion = '$edo_operacion'
            and  case
					when '$anios' = 1 then sitios.Anios_vida_util between 0 and 10
                    when '$anios' = 2 then sitios.Anios_vida_util between 11 and 20
                    else sitios.Anios_vida_util between 21 and 30 END
            group by sitios.idSitio
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
}

?>