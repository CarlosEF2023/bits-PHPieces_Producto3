<?php
/* Configuración Docker*/
define('DB_HOST', 'mysql-db-prdto3'); 
define('DB_PASS', 'root'); 

/** */
/* Configuración Local*/
// define('DB_HOST','localhost'); 
// define('DB_PASS',''); 
/** */
define('DB_USER', 'root'); 
define('DB_NAME', "wordpress1"); 
define('DB_CHARSET', 'utf8');

class database_mysqli{
    private $conexion;
    
    public function __construct() {
        $this->conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); 
		if ( $this->conexion->connect_errno ) { 
			echo "Fallo al conectar a MySQL: ". $this->conexion->connect_error; 
			exit();     
		} else {
            echo "Conexión exitosa";
			$this->conexion->set_charset(DB_CHARSET);
		}	
    }
}
?>
