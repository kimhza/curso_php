<?php 

require_once '../config/Database.php';

class Serie { 
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function obtenerTodos() {
        $consulta = 'SELECT * FROM series';
        $objStmt = $this->pdo->query($consulta);
        $arrResultado = $objStmt->fetchAll(PDO::FETCH_ASSOC);
        return $arrResultado;
    }

    public function obtenerPorId($id) {
        $consulta = 'SELECT * FROM series WHERE id = :id';
        $objStmt = $this->pdo->prepare($consulta);
        $objStmt->bindParam(':id', $id);
        $objStmt->execute();
        $arrResultado = $objStmt->fetch(PDO::FETCH_ASSOC);
        return $arrResultado;
    }

    public function crear($titulo, $valoracion) {
        $consulta = 'INSERT INTO series (titulo, valoracion) VALUES (:titulo, :valoracion)';
        $objStmt = $this->pdo->prepare($consulta);
        $objStmt->bindParam(':titulo', $titulo);
        $objStmt->bindParam(':valoracion', $valoracion);
        $objStmt->execute();
    }

    public function editar($id, $titulo, $valoracion) {
        $consulta = 'UPDATE series SET titulo = :titulo, valoracion = :valoracion WHERE id = :id';
        $objStmt = $this->pdo->prepare($consulta);
        $objStmt->bindParam(':titulo', $titulo);
        $objStmt->bindParam(':valoracion', $valoracion);
        $objStmt->execute();
    }

    public function eliminar($id) {
        $consulta = 'DELETE FROM series WHERE id = :id';
        $objStmt = $this->pdo->prepare($consulta);
        $objStmt->bindParam(':id', $id);
        $objStmt->execute();
    }

    public function contarSeries() {
        $consulta = 'SELECT COUNT(*) AS conteo FROM series';
        $consPrep = $this->pdo->query($consulta);
        $consPrep->execute();
        $arrResultado = $consPrep->fetch(PDO::FETCH_ASSOC);
        return $arrResultado['conteo'];
    }
}