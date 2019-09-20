<?php

    class Centrales_models{

        public function __construct()
        {
            #require_once("../models/Conexion.php");
            require_once("conexion.php");
            $this->db = Conectar::conexion();
            $this->centrales = array();
            $this->value = 0;
            $this->bandera = false;
        }

        public function get_CM()
        {
            try {
                $consulta = $this->db->query("SELECT * FROM cm");
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $this->centrales[] = $registro;
                }
                return $this->centrales;

            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function get_coordenadas($siglas)
        {
            try {
                $consulta = $this->db->query("SELECT * FROM centrales WHERE CM = '$siglas'");
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $this->centrales[] = $registro;
                }
                return $this->centrales;

            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function get_coordenadas_central($siglas,$nombreCentral)
        {
            try {
                $consulta = $this->db->query("SELECT * FROM centrales,
                                                        localizacion,
                                                        cfe,
                                                        respaldobat,respaldo_baterias
                                                        where Id_Centrales = localizacion.Id_localizacion
                                                        and localizacion.Id_CFE = cfe.Id_CFE
                                                        and cfe.Id_CFE = respaldobat.Id_respaldo
                                                        and respaldobat.Id_respaldo = respaldo_baterias.Id_central
                                                        and CM = '$siglas'
                                                        and Nombre_central = '$nombreCentral'");
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $this->centrales[] = $registro;
                }
                return $this->centrales;

            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }


    public function get_names($clave)
    {
        try {
            $consulta = $this->db->query("SELECT * FROM centrales WHERE CM = '$clave'");
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $this->centrales[] = $registro;
            }
            return $this->centrales;

        } catch (Exception $e) {
            echo "Línea del error: " . $e->getLine() . "<br>";
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";

        } finally {
            $db = null;
        }
    }

        public function get_datos_generales($siglas, $nombreCentral)
        {
            try {
                $consulta = $this->db->query("SELECT Nombre_central, Siglas, Tecnologia, CCE, Direccion, Municipio, Rpu, No_medidor
                                                        FROM centrales,
                                                        localizacion,
                                                        cfe
                                                        where Id_Centrales = localizacion.Id_localizacion
                                                        and localizacion.Id_CFE = cfe.Id_CFE
                                                        and CM = '$siglas'
                                                        and Nombre_central = '$nombreCentral'");
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $this->centrales[] = $registro;
                }
                return $this->centrales;

            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function get_transformador($siglas, $nombreCentral)
        {
            try {
                $consulta = $this->db->query("SELECT Tipo, Marca, Capacidad, anio
                                                        FROM transformador,
                                                        centrales
                                                        where centrales.Id_Centrales =  transformador.Id_transformador
                                                        and CM = '$siglas'
                                                        and Nombre_central = '$nombreCentral'");
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $this->centrales[] = $registro;
                }
                return $this->centrales;

            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function get_factorPyC($siglas, $nombreCentral)
        {
            try {
                $consulta = $this->db->query("SELECT Factor, Inte, Ext
                                                        FROM factorpot,
                                                        centroc,
                                                        centrales
                                                        where centrales.Id_Centrales = factorpot.Id_factor
                                                        and factorpot.Id_centroC = centroc.Id_centro
                                                        and CM = '$siglas'
                                                        and Nombre_central = '$nombreCentral'");
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $this->centrales[] = $registro;
                }
                return $this->centrales;

            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function get_tableroCA($siglas, $nombreCentral)
        {
            try {
                $consulta = $this->db->query("SELECT Cantidad, Cap_amp, Marca, Fecha, Pos_lib, Modelo
                                                        FROM tableroca,
                                                        centrales
                                                        where tableroca.Id_generador = centrales.Id_Centrales
                                                        and CM = '$siglas'
                                                        and Nombre_central = '$nombreCentral'");
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $this->centrales[] = $registro;
                }
                return $this->centrales;

            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }


        public function get_generador($siglas, $nombreCentral)
    {
        try {
            $consulta = $this->db->query("SELECT Marca,Modelo,Capacidad
                                                        FROM generador,
                                                        centrales
                                                        where generador.Id_generador = centrales.Id_Centrales
                                                        and CM = '$siglas'
                                                        and Nombre_central = '$nombreCentral'");
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $this->centrales[] = $registro;
            }
            return $this->centrales;

        } catch (Exception $e) {
            echo "Línea del error: " . $e->getLine() . "<br>";
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";

        } finally {
            $db = null;
        }
    }

        public function get_motor($siglas, $nombreCentral)
        {
            try {
                $consulta = $this->db->query("SELECT Marca, Modelo
                                                        from motor,
                                                        centrales
                                                        where motor.Id_motor = centrales.Id_Centrales
                                                        and CM = '$siglas'
                                                        and Nombre_central = '$nombreCentral'");
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $this->centrales[] = $registro;
                }
                return $this->centrales;

            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function get_tablero_tra($siglas, $nombreCentral)
        {
            try {
                $consulta = $this->db->query("SELECT Marca, Modelo, Anio
                                                        FROM tablerot,
                                                        centrales
                                                        WHERE centrales.Id_Centrales = tablerot.Id_tablero
                                                        and CM = '$siglas'
                                                        and Nombre_central = '$nombreCentral'");
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $this->centrales[] = $registro;
                }
                return $this->centrales;

            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function get_cargador_bat($siglas, $nombreCentral)
        {
            try {
                $consulta = $this->db->query("SELECT Marca, Modelo, Anio, Cantidad, Voltaje
                                                        from cargadorbat,
                                                        centrales
                                                        WHERE cargadorbat.Id_central = centrales.Id_Centrales
                                                        and CM = '$siglas'
                                                        and Nombre_central = '$nombreCentral'");
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $this->centrales[] = $registro;
                }
                return $this->centrales;

            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function get_plantacd($siglas, $nombreCentral)
        {
            try {
                $consulta = $this->db->query("SELECT Marca, Modelo, Anio
                                                        FROM plantacd,
                                                        centrales
                                                        WHERE plantacd.Id_central = centrales.Id_Centrales
                                                        and CM = '$siglas'
                                                        and Nombre_central = '$nombreCentral'");
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $this->centrales[] = $registro;
                }
                return $this->centrales;

            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function get_rectificadores($siglas, $nombreCentral)
        {
            try {
                $consulta = $this->db->query("SELECT Cantidad, Modelo, Cap_amp
                                                        FROM rectificadores,
                                                        centrales
                                                        WHERE rectificadores.Id_central = centrales.Id_Centrales
                                                        and CM = '$siglas'
                                                        and Nombre_central = '$nombreCentral'");
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $this->centrales[] = $registro;
                }
                return $this->centrales;

            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

         public function get_rectificadores_formulas($siglas,$nombreCentral)
         {
             try {
                 $consulta = $this->db->query("select cap_instalada.Id_central,cap_ins, suma, ocu_planta, rectificacion from cap_instalada, suma_consumo, ocupacion_planta, rectificacion_planta,centrales
                                                        where cap_instalada.Id_central = suma_consumo.Id_central_consumo
                                                        and suma_consumo.Id_central_consumo = ocupacion_planta.Id_central
                                                        and ocupacion_planta.Id_central = rectificacion_planta.Id_central
                                                        and cap_instalada.Id_central = 	centrales.Id_Centrales
                                                        and CM = '$siglas'
                                                        and Nombre_central = '$nombreCentral';");
                 while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                     $this->centrales[] = $registro;
                 }
                 return $this->centrales;

             } catch (Exception $e) {
                 echo "Línea del error: " . $e->getLine() . "<br>";
                 echo 'Excepción capturada: ',  $e->getMessage(), "\n";

             } finally {
                 $db = null;
             }

         }




        public function get_tablerocd($siglas, $nombreCentral)
        {
            try {
                $consulta = $this->db->query("SELECT Cantidad, Marca, pos_lib,Modelo 
                                                FROM tablerocd,
                                                centrales
                                                WHERE tablerocd.Id_central = centrales.Id_Centrales
                                                and CM = '$siglas'
                                                and Nombre_central = '$nombreCentral'");
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $this->centrales[] = $registro;
                }
                return $this->centrales;

            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function get_bancos($siglas, $nombreCentral)
        {
            try {
                $consulta = $this->db->query("SELECT Cantidad, Celdas, Marca, Modelo, Cap_AH, Anio, porcentaje_vida.porc_vida, Respaldo, Barra
                                                        FROM bancos,
                                                        centrales,
                                                        respaldobat,
                                                        porcentaje_vida
                                                        WHERE bancos.Id_central = centrales.Id_Centrales
                                                        and bancos.Id_respaldo = respaldobat.Id_respaldo
                                                        and respaldobat.Id_respaldo = porcentaje_vida.Id_central
                                                        and centrales.CM = '$siglas'
                                                        and centrales.Nombre_central = '$nombreCentral'");
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $this->centrales[] = $registro;
                }
                return $this->centrales;

            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function get_inversores($siglas, $nombreCentral)
        {
            try {
                $consulta = $this->db->query("SELECT Cantidad, Marca, Modelo, Cap_kva, Anio
                                                        FROM inversores,
                                                        centrales
                                                        WHERE inversores.Id_central = centrales.Id_Centrales
                                                        and CM = '$siglas'
                                                        and Nombre_central = '$nombreCentral'");
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $this->centrales[] = $registro;
                }
                return $this->centrales;

            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function get_comentario($siglas)
        {
            try {
                //$consulta = $this->db->query();
                $obtener = $this->db->query("SELECT cm,central,usuario,mensaje FROM comentarios WHERE cm = '$siglas'");
                while ($registro = $obtener->fetch(PDO::FETCH_ASSOC)) {
                    $this->centrales[] = $registro;
                }
                return $this->centrales;
            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }


        public function actualizar_datos_generales($siglas_actual,$nombre_central_actual,$nombre_central,$siglas,$tecnologia,$cce,$direccion,$municipio,$rpu,$no_medidor)
        {
            try {
                $consulta = "UPDATE centrales, localizacion, cfe SET centrales.Nombre_central = :newnombre,centrales.Siglas = :newsiglas,centrales.Tecnologia = :newtec,centrales.CCE = :newcce,localizacion.Direccion = :newdirec,localizacion.Municipio = :newmun,cfe.Rpu = :newrpu,cfe.No_medidor =  :newmedidor where centrales.Id_Centrales = localizacion.Id_localizacion and localizacion.Id_CFE = cfe.Id_CFE and CM = :siglas and Nombre_central = :nombre";
                $modificar = $this->db->prepare($consulta);
                $modificar->execute(array(":newnombre" =>$nombre_central_actual, ":newsiglas"=>$siglas_actual,
                                          ":newtec" =>$tecnologia, ":newcce" =>$cce,":newdirec"=>$direccion, ":newmun"=>$municipio,
                                          ":newrpu" =>$rpu, ":newmedidor" =>$no_medidor, ":siglas" =>$siglas, ":nombre"=>$nombre_central));
                $modificar->closeCursor();
            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function actualizar_datos_transformador($nombreCentral,$siglas,$tipo,$marca,$capacidad,$anio)
        {
            try {
                //$consulta = $this->db->query();
                $sql = "UPDATE transformador, centrales SET transformador.Tipo = :newtipo, transformador.Marca = :newmarca, transformador.Capacidad = :newcapacidad, transformador.anio = :newanio WHERE centrales.Id_Centrales =  transformador.Id_transformador AND CM = '$siglas' AND Nombre_central = '$nombreCentral'";
                $modificar = $this->db->prepare($sql);
                $modificar->execute(array(":newtipo" => $tipo, ":newmarca"=>$marca,":newcapacidad"=>$capacidad,":newanio"=>$anio));
                $modificar->closeCursor();
            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function actualizar_datos_factor_p($nombreCentral,$siglas,$factorP,$int,$ext)
        {
            try {
                //$consulta = $this->db->query();
                $sql = "UPDATE factorpot, centroc, centrales SET Factor = :newfac, Inte = :newint, Ext = :newext  where centrales.Id_Centrales = factorpot.Id_factor and factorpot.Id_centroC = centroc.Id_centro and CM = '$siglas' and Nombre_central = '$nombreCentral'";
                $modificar = $this->db->prepare($sql);
                $modificar->execute(array(":newfac" => $factorP, ":newint"=>$int,":newext"=>$ext));
                $modificar->closeCursor();
            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function actualizar_tablero_ca($nombreCentral,$siglas,$cantidad,$capacidad,$marca,$fecha,$posiciones, $modelo)
        {
            try {
                //$consulta = $this->db->query();
                $sql = "UPDATE tableroca, centrales SET Cantidad = :newcant, Cap_amp = :newcap, Marca = :newmarca, Fecha = :newdate, Pos_lib = :newpos, Modelo = :newmodelo where tableroca.Id_generador = centrales.Id_Centrales and CM = '$siglas' and Nombre_central = '$nombreCentral'";
                $modificar = $this->db->prepare($sql);
                $modificar->execute(array(":newcant" => $cantidad, ":newcap"=>$capacidad,":newmarca"=>$marca, "newdate"=>$fecha, "newpos"=>$posiciones, ":newmodelo"=>$modelo));
                $modificar->closeCursor();
            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

       public function insertar_tablero_ca($nombreCentral,$siglas,$cantidad,$capacidad,$marca,$fecha,$posiciones, $modelo)
        {
            try {
                //$consulta = $this->db->query();
                $sql = "INSERT INTO tableroca (Id_tablero,Id_generador,Cantidad,Cap_amp,Marca,Fecha,Pos_lib,Modelo) VALUES(null,(Select Id_Centrales from centrales where '$nombreCentral' = Nombre_central),:can, :cap, :mar, :fec, :pos,:mode)";

                $resultado = $this->db->prepare($sql);
                //$fecha = date("Y-m-d H:i:s";
                $resultado->execute(array(":can"=>$cantidad, ":cap"=>$capacidad, ":mar"=>$marca, ":fec"=>$fecha, ":pos"=>$posiciones, ":mode"=>$modelo));
                $resultado->closeCursor();

              } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function insertar_tablero_cd($nombreCentral,$siglas,$cantidad,$posiciones,$marca,$modelo)
        {
            try {
                //$consulta = $this->db->query();
                $sql = "INSERT INTO tablerocd(Id_tablero,Id_banco,Id_central,Modelo,pos_lib,Marca,Cantidad) VALUES(null,(select auto_Increment from INFORMATION_SCHEMA.tables where table_name = 'bancos'),(Select Id_Centrales from centrales where '$nombreCentral' = Nombre_central),:mod,:pos,:marca,:can )";

                $resultado = $this->db->prepare($sql);
                //$fecha = date("Y-m-d H:i:s";
                $resultado->execute(array(":mod"=>$modelo, ":pos"=>$posiciones, ":marca"=>$marca, ":can"=>$cantidad));
                $resultado->closeCursor();

            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function insertar_bancos($nombreAct,$siglasAct,$cantidad,$marca,$barra,$modelo,$anio,$celdas,$cap_ah)
        {
            try {
                //$consulta = $this->db->query();
                $sql = "INSERT INTO bancos(Id_bancos,Id_central,Id_respaldo,Barra,Cantidad,Celdas,Marca,Modelo,Cap_AH,Anio) VALUES(null,(Select Id_Centrales from centrales where '$nombreAct' = Nombre_central),(select auto_Increment from INFORMATION_SCHEMA.tables where table_name = 'bancos'),:can , :mar, :bar, :mod, :fec, :cel,:cap)";


                $resultado = $this->db->prepare($sql);
                //$fecha = date("Y-m-d H:i:s";
                $resultado->execute(array(":can"=>$cantidad,  ":mar"=>$marca, "bar"=>$barra,":mod"=>$modelo, ":fec"=>$anio,":cel"=>$celdas,":cap"=>$cap_ah));
                $resultado->closeCursor();

            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function insertar_inversores($nombreAct,$siglasAct,$cantidad,$capacidad,$marca,$modelo, $anio)
        {
            try {
                //$consulta = $this->db->query();
                $sql = "INSERT INTO inversores(Id_inversores,Id_central,Cantidad,Marca,Modelo,Anio,Cap_kva) VALUES(null,(Select Id_Centrales from centrales where '$nombreAct' = Nombre_central),:can , :mar, :mod, :fec, :cap)";


                $resultado = $this->db->prepare($sql);
                //$fecha = date("Y-m-d H:i:s";
                $resultado->execute(array(":can"=>$cantidad,  ":mar"=>$marca, ":mod"=>$modelo, ":fec"=>$anio,":cap"=>$capacidad));
                $resultado->closeCursor();

            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function actualizar_generador($nombreCentral,$siglas,$marca,$modelo,$capacidad)
        {
            try {
                //$consulta = $this->db->query();
                $sql = "UPDATE generador, centrales SET Marca = :newmarca, Modelo = :newmodel, Capacidad = :newcap where generador.Id_generador = centrales.Id_Centrales and CM = '$siglas' and Nombre_central = '$nombreCentral'";
                $modificar = $this->db->prepare($sql);
                $modificar->execute(array(":newmarca" => $marca, ":newmodel"=>$modelo,":newcap"=>$capacidad));
                $modificar->closeCursor();
            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function actualizar_motor($nombreCentral,$siglas,$marca,$modelo)
        {
            try {
                //$consulta = $this->db->query();
                $sql = "UPDATE motor, centrales SET Marca = :newmarca, Modelo = :newmodel where motor.Id_motor = centrales.Id_Centrales and CM = '$siglas' and Nombre_central = '$nombreCentral'";
                $modificar = $this->db->prepare($sql);
                $modificar->execute(array(":newmarca" => $marca, ":newmodel"=>$modelo));
                $modificar->closeCursor();
            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function actualizar_tablerot($nombreCentral,$siglas,$marca,$modelo,$anio)
        {
            try {
                //$consulta = $this->db->query();
                $sql = "UPDATE tablerot, centrales SET Marca = :newmarca, Modelo = :newmodel, Anio = :newanio WHERE centrales.Id_Centrales = tablerot.Id_tablero and CM = '$siglas' and Nombre_central = '$nombreCentral'";
                $modificar = $this->db->prepare($sql);
                $modificar->execute(array(":newmarca" => $marca, ":newmodel"=>$modelo, "newanio"=>$anio));
                $modificar->closeCursor();
            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function actualizar_cargador_bat($nombreCentral,$siglas,$marca,$modelo,$anio, $cantidad, $voltaje)
        {
            try {
                //$consulta = $this->db->query();
                $sql = "UPDATE cargadorbat, centrales SET Marca = :newmarca, Modelo = :newmodel, Anio = :newanio, Cantidad = :newcant, Voltaje = :newvoltaje  WHERE cargadorbat.Id_central = centrales.Id_Centrales and CM = '$siglas' and Nombre_central = '$nombreCentral'";
                $modificar = $this->db->prepare($sql);
                $modificar->execute(array(":newmarca" => $marca, ":newmodel"=>$modelo, "newanio"=>$anio, ":newcant"=>$cantidad, ":newvoltaje"=>$voltaje));
                $modificar->closeCursor();
            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function actualizar_plantacd($nombreCentral,$siglas,$marca,$modelo,$anio)
        {
            try {
                //$consulta = $this->db->query();
                $sql = "UPDATE plantacd, centrales SET Marca = :newmarca, Modelo = :newmodel, Anio = :newanio WHERE plantacd.Id_central = centrales.Id_Centrales and CM = '$siglas' and Nombre_central = '$nombreCentral'";
                $modificar = $this->db->prepare($sql);
                $modificar->execute(array(":newmarca" => $marca, ":newmodel"=>$modelo, "newanio"=>$anio));
                $modificar->closeCursor();
            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function actualizar_rectificadores($nombreCentral,$siglas,$cantidad,$marca,$pos_lib)
        {
            try {
                //$consulta = $this->db->query();
                $sql = "UPDATE tablerocd, centrales SET Cantidad = :newcant, Marca = :newmarca, pos_lib = :newposlib WHERE tablerocd.Id_central = centrales.Id_Centrales and CM = '$siglas' and Nombre_central = '$nombreCentral'";
                $modificar = $this->db->prepare($sql);
                $modificar->execute(array(":newcant" => $cantidad, ":newmarca"=>$marca, "newposlib"=>$pos_lib));
                $modificar->closeCursor();
            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }



    public function actualizar_bancos($nombreCentral,$siglas,$cantidad,$celdasxbancos,$marca,$modelo,$capacidadah,$anio,$respaldo,$barra_antisismica)
    {
        try {
            //$consulta = $this->db->query();
            $sql = "UPDATE bancos, centrales, respaldobat SET Cantidad = :newcant, Celdas = :newceldas,Marca = :newmarca, Modelo = :newmodelo, Cap_AH = :newcapah, Anio = :newanio, Respaldo = :newresp, Barra = :newbarra WHERE bancos.Id_central = centrales.Id_Centrales and bancos.Id_respaldo = respaldobat.Id_respaldo and CM = '$siglas' and Nombre_central = '$nombreCentral'";
            $modificar = $this->db->prepare($sql);
            $modificar->execute(array(":newcant" => $cantidad, "newceldas"=>$celdasxbancos,":newmarca"=>$marca, "newmodelo"=>$modelo,"newcapah"=>$capacidadah, "newanio"=>$anio, "newresp"=>$respaldo, "newbarra"=>$barra_antisismica));
            $modificar->closeCursor();
        } catch (Exception $e) {
            echo "Línea del error: " . $e->getLine() . "<br>";
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";

        } finally {
            $db = null;
        }
    }

    public function actualizar_inversores($nombreCentral,$siglas,$cantidad,$marca,$modelo,$cap_kva)
    {
        try {
            //$consulta = $this->db->query();
            $sql = "UPDATE inversores, centrales, SET Cantidad = :newcant, Marca = :newmarca, Modelo = :newmodelo, Cap_kva = :newcapkva WHERE inversores.Id_central = centrales.Id_Centrales and CM = '$siglas' and Nombre_central = '$nombreCentral'";
            $modificar = $this->db->prepare($sql);
            $modificar->execute(array(":newcant" => $cantidad, ":newmarca"=>$marca, "newmodelo"=>$modelo,"newcapkva"=>$cap_kva));
            $modificar->closeCursor();
        } catch (Exception $e) {
            echo "Línea del error: " . $e->getLine() . "<br>";
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";

        } finally {
            $db = null;
        }
    }


      public function actualizar_comentario($nombreAct,$usuario,$central,$cm,$mensaje)
    {
        try {   
            //$consulta = $this->db->query();
            $sql = "INSERT INTO comentarios(Id_feedback,Id_central,usuario,cm,central,mensaje) VALUES(null,(Select Id_Centrales from centrales where '$nombreAct' = Nombre_central),:usu ,:cm , :cen, :mes)";
            $modificar = $this->db->prepare($sql);
            $modificar->execute(array(":usu" => $usuario,":cm" => $cm, ":cen"=>$central, ":mes"=>$mensaje));
            $modificar->closeCursor();
        } catch (Exception $e) {
            echo "Línea del error: " . $e->getLine() . "<br>";
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";

        } finally {
            $db = null;
        }
    }

}

?>
