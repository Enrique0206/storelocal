<?php
//creando calse conexion
class Conexion {
    //singleton - asegura que solo usemos un objeto creado y no estar creado a cada momento
    private static $instance = NULL; // lo retornado verifica el objetocon los datos obtenidos
    
    private function __construct() {
        
    }
	//si no tiene valor crea un objeto pdo a partir de las constantes (ver constantes.php) para armar la conexion
    public static function getConexion() {
        if(self::$instance == NULL){
            $host = Constantes::DB_HOST;
            $dbname = Constantes::DB_SCHEMA;
            self::$instance = new PDO("mysql:host=$host;dbname=$dbname", Constantes::DB_USERNAME, Constantes::DB_PASSWORD);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); //correcion y manjeo de errores
        }
        return self::$instance; //devuelve le objeto pdo
    }
    
}
