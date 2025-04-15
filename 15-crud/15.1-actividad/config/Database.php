<?php 

require_once '../config/Constants.php';

class Database {

    public static function obtenerConexion() {
        try {
            $conexion = new PDO(
                'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';port=' . DB_PORT,
                DB_USER,
                DB_PASS
            );
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch(PDOException $e) {
            die('Error de conexión: '.$e->getMessage());
        }
    }
}