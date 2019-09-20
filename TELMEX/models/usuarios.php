<?php

class Usuarios_Models
{
  private $db;
  private $usuarios;
  private $value;
  private $bandera;
  public function __construct()
  {
    #require_once("../models/Conexion.php");
    require_once("conexion.php");
    $this->db = Conectar::conexion();
    $this->usuarios = array();
    $this->value = 0;
    $this->bandera = false;
  }

  public function my_data($id)
  {
    try {
      $consulta = $this->db->query("SELECT * FROM usuarios WHERE Id_usuario='$id'");
      while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $this->usuarios[] = $registro;
      }
      return $this->usuarios;

    } catch (Exception $e) {
      echo "Línea del error: " . $e->getLine() . "<br>";
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";

    } finally {
      $db = null;
    }
  }




  public function get_usuarios($Tipo)
  {
    try {
      $consulta = $this->db->query("SELECT * FROM usuarios WHERE Status = '$Tipo'");
      while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $this->usuarios[] = $registro;
      }
      return $this->usuarios;

    } catch (Exception $e) {
      echo "Línea del error: " . $e->getLine() . "<br>";
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";

    } finally {
      $db = null;
    }
  }

    public function status_change($id,$tipo)
    {
        try {
            $consulta = $this->db->query("SELECT * FROM usuarios WHERE Id_usuario ='$id'");
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $this->usuarios[] = $registro;
            }
            #Aplicar update!
            $cambio = "UPDATE usuarios SET Status=:newstatus WHERE Id_usuario = '$id'";
            $modificar = $this->db->prepare($cambio);
            $modificar->execute(array(":newstatus"=>$tipo));
            $modificar->closeCursor();
            return $this->usuarios;

        } catch (Exception $e) {
            echo "Línea del error: " . $e->getLine() . "<br>";
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";

        } finally {
            $db = null;
        }
    }


  public function busca_usuario_registrado($Apodo,$contrasenia)
  {
    try {
      $consulta = $this->db->query("SELECT * FROM usuarios WHERE Apodo = '$Apodo'");
      $this->value = -2;//menos 2 no hay registros
      while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $this->value = -1;//Si hay apodo
        if (password_verify($contrasenia,$registro['Contrasenia'])) {
          $this->value = $registro['Id_usuario'];//Mayor que cero si existe el registro
          break;
        }
      }
      return $this->value;
    } catch (Exception $e) {
      echo "Línea del error: 8" . $e->getLine() . "<br>";
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }finally {
      $db = null;
    }
  }

  public function busca_cm($Id_usuario)
  {
    try {
      $consulta = $this->db->query("SELECT * FROM usuarios WHERE Id_usuario = '$Id_usuario'");
      
         while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $this->value = $registro['CM'];
          }
        return $this->value;
      
    } catch (Exception $e) {
      echo "Línea del error: 8" . $e->getLine() . "<br>";
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }finally {
      $db = null;
    }
  }

  public function estado_organigrama($id)
  {
    try {
      $consulta = $this->db->query("SELECT * FROM usuarios WHERE Id_usuario = '$id'");
      while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $estado = $registro['Status'];
      }
      return $estado;
    } catch (Exception $e) {
      echo "Línea del error: " . $e->getLine() . "<br>";
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    } finally {
      $db = null;
    }
  }

  public function verifica_existencia($Apodo,$Correo)
  {
    $consulta = $this->db->query("SELECT * FROM usuarios WHERE Nombre = '$Apodo' or Correo = '$Correo'");
    $this->bandera = false;
    while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->bandera = true;
      }
    return $this->bandera;

  }

  public function nuevo_usuario($Nombre,$Apellido,$Apodo,$CM,$contrasenia,$Correo)
  {
    try{
      //Genera la sal de forma automatica para la encriptación!
      //La sal debe crearse automatica, esta obsoleto
      $pass_cifrado = password_hash($contrasenia, PASSWORD_DEFAULT, array("cost"=>12));
      $sql = "INSERT INTO usuarios (
      Nombre,Apellido,Apodo,CM,Correo,Contrasenia,Status) VALUES (:nom, :ape, :apo, :cm, :cor, :con,:sta)";

      $resultado = $this->db->prepare($sql);
      //$fecha = date("Y-m-d H:i:s");
      $resultado->execute(array(":nom"=>$Nombre, ":ape"=>$Apellido, ":apo"=>$Apodo, ":cm"=>$CM, ":cor"=>$Correo, ":con"=>$pass_cifrado,":sta"=>'P'));
      $resultado->closeCursor();  
    }catch(Exception $e){
      echo "Línea del error: " . $e->getLine() . "<br>";
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }finally {
      $db = null;
    }
  }

  public function olvide_cuenta($Correo)
    {
      $consulta = $this->db->query("SELECT * FROM USUARIOS WHERE Correo = '$Correo'");
      while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $this->usuarios[] = $registro;
      }
      return $this->usuarios;
    }

    public function add_clave_olvido($id,$codigo)
    {
      try {
        $add_clave = "UPDATE USUARIOS SET CLAVE_OLVIDO=:newclave WHERE Id_usuario = '$id'";
        $resultado = $this->db->prepare($add_clave);
        $resultado->execute(array(":newclave"=>$codigo));
        $resultado->closeCursor();

      } catch (Exception $e) {
        echo "Línea del error: " . $e->getLine() . "<br>";
          echo 'Excepción capturada: ',  $e->getMessage(), "\n";
      }finally {
        $db = null;
      }
    }

    public function cambiar_contra($contrasenia,$codigo)
    {
      try {
        $pass_cifrado = password_hash($contrasenia, PASSWORD_DEFAULT, array("cost"=>12));
        $nuevopass = "UPDATE USUARIOS SET Contrasenia=:newcontra WHERE CLAVE_OLVIDO = '$codigo'";
        $modificar = $this->db->prepare($nuevopass);
        $modificar->execute(array(":newcontra"=>$pass_cifrado));
        #Esto es necesario para reiniciar el código!, ya no sea utilizable y se necesario solicitar otro...!
        $consulta = $this->db->query("SELECT * FROM USUARIOS WHERE CLAVE_OLVIDO = '$codigo'");
        $this->value = 0;
        #$DKL_bandera = 0;
        while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->value = $registro['Id_usuario'];//Mayor que cero si existe el registro
            #$DKL_bandera = $registro['idUser'];//Mayor que cero si existe el registro
        }
        $modificar->closeCursor();
        return $this->value;
        #$DKL_bandera;
      } catch (Exception $e) {
        echo "Línea del error: " . $e->getLine() . "<br>";
          echo 'Excepción capturada: ',  $e->getMessage(), "\n";
      }finally {
        $db = null;
      }

    }
}
 ?>
