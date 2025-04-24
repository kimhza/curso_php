<?php 

require_once '../config/Constants.php';

class Database {

    private $conexion;

    public function __construct() {
        try {
            $this->conexion = new PDO(
                'mysql:host='.DB_HOST.';dbname='.DB_NAME.';port='.DB_PORT, DB_USER, DB_PASS
            );
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die('Error de conexión: '. $e->getMessage());
        }
    }

    public function obtenerConexion() {
        return $this->conexion;
    }
}