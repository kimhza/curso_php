<?php
include_once '../models/Libro.php';

class LibroController
{
    private $libroModel;

    public function __construct()
    {
        $this->libroModel = new Libro();
    }

    public function index()
    {
        $libros = $this->libroModel->getAll();
        include '../views/index.php';
    }

    public function create()
    {
        include '../views/create.php';
    }

    public function save()
    {
        if ($_POST) {
            $titulo = $_POST['titulo'];
            $autor = $_POST['autor'];
            $disponible = $_POST['disponible'];
            $this->libroModel->create($titulo, $autor, $disponible);
            header('Location: '.BASE_URL.'/');
        }
    }

    public function edit($codigo)
    {
        $libro = $this->libroModel->getById($codigo);
        if ($libro) {
            include '../views/edit.php';
        } else {
            header('Location: '.BASE_URL.'/');
        }
    }

    public function update($codigo)
    {
        if ($_POST) {
            $titulo = $_POST['titulo'];
            $autor = $_POST['autor'];
            $disponible = $_POST['disponible'];
            $this->libroModel->update($codigo, $titulo, $autor, $disponible);
            header('Location: '.BASE_URL.'/');
        }
    }

    public function delete($codigo)
    {
        $this->libroModel->delete($codigo);
        header('Location: '.BASE_URL.'/');
    }
}