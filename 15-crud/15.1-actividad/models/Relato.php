<?php 

require_once '../config/Database.php';

class Relato {
    
    public $id;
    public $titulo;
    public $relato;
    public $nombre;
    public $email;
    
    public static function obtenerTodos() {
        $conexion = Database::obtenerConexion(); 
        $consulta = "SELECT * FROM tbl_relatos";
        $cons_prep = $conexion->query($consulta);
        return $cons_prep->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerPorCodigo($id) {
        $conexion = Database::obtenerConexion(); 
        $consulta = "SELECT * FROM tbl_relatos WHERE id = :id";
        $cons_prep = $conexion->prepare($consulta);
        $cons_prep->bindParam(':id', $id);
        $cons_prep->execute();
        return $cons_prep->fetch(PDO::FETCH_ASSOC);
    }

    public static function crear($titulo, $relato, $nombre, $email) {
        $conexion = Database::obtenerConexion();
        $consulta = "INSERT INTO tbl_relatos (titulo, relato, nombre, email) VALUES (:titulo, :relato, :nombre, :email);";
        $cons_prep = $conexion->prepare($consulta);
        $cons_prep->bindParam(':titulo', $titulo);
        $cons_prep->bindParam(':relato', $relato);
        $cons_prep->bindParam(':nombre', $nombre);
        $cons_prep->bindParam(':email', $email);
        return $cons_prep->execute();
    }

    public static function editar($id, $titulo, $relato, $nombre, $email) {
        $conexion = Database::obtenerConexion();
        $consulta = "UPDATE tbl_relatos SET titulo = :titulo, relato = :relato, nombre = :nombre, email = :email WHERE id = :id";
        $cons_prep = $conexion->prepare($consulta);
        $cons_prep->bindParam('id', $id);
        $cons_prep->bindParam('titulo', $titulo);
        $cons_prep->bindParam(':relato', $relato);
        $cons_prep->bindParam(':nombre', $nombre);
        $cons_prep->bindParam(':email', $email);
        $cons_prep->execute();
    }

    public static function eliminar($id) {
        $conexion = Database::obtenerConexion();
        $consulta = "DELETE FROM tbl_relatos WHERE id = :id;";
        $cons_prep = $conexion->prepare($consulta);
        $cons_prep->bindParam('id', $id);
        $cons_prep->execute(); 
    }
}