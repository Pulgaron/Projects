<?php 
	class Conectar {
		public static function conexion() {
			try{
				//$conexion = new PDO('mysql:host=localhost; dbname=wi531370_sgisv', 'wi531370_root','14muKAwuvu');
				$conexion = new PDO('mysql:host=localhost; dbname=sgisv', 'root','Oscarrai96');
				$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$conexion->exec("SET CHARACTER SET UTF8");

			}catch(Exception $e) {
				die("Error: " . $e->getMessage());
				echo "Linea del error " . $e->getLine();
			}
			return $conexion;
		}
	}
 ?>