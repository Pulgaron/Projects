<?php 
	
	class coordenadas_prueba
	{
		
		private $db;
		private $coordenadas;
		
               public function __construct()
		{
			require_once("conexion.php");
			$this->db = Conectar::conexion();
			$this->coordenadas = array();
		}

    
    public function get_coord()
		{
			try {
				$consulta = $this->db->query("SELECT estacion, latitud, longitud FROM coordenadas_erds");
				while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
					$this->coordenadas[] = $registro;			
				}		
                                $db = null;
				return $this->coordenadas;
			} catch (Exception $e) {
				echo "Línea del error: " . $e->getLine() . "<br>";
                                echo 'Excepción capturada: ',  $e->getMessage(), "\n";
                                $db = null;
			} /*finally {
				$db = null;
			}*/

		}
 
    
}


?>