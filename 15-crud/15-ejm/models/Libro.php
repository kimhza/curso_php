<?php
include_once '../config/Database.php';

class Libro
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
    }

    public function create($titulo, $autor, $disponible)
    {
        $sql = "INSERT INTO libros (titulo, autor, disponible) VALUES (:titulo, :autor, :disponible)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':disponible', $disponible);
        return $stmt->execute();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM libros";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($codigo)
    {
        $sql = "SELECT * FROM libros WHERE codigo = :codigo";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($codigo, $titulo, $autor, $disponible)
    {
        $sql = "UPDATE libros SET titulo = :titulo, autor = :autor, disponible = :disponible WHERE codigo = :codigo";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':disponible', $disponible);
        return $stmt->execute();
    }

    public function delete($codigo)
    {
        $sql = "DELETE FROM libros WHERE codigo = :codigo";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':codigo', $codigo);
        return $stmt->execute();
    }
}