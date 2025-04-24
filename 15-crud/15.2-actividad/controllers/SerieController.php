<?php 

require_once '../models/Serie.php';

class SerieController {

    private $modelo;

    public function __construct() {
        $db = new Database();
        $conexion = $db->obtenerConexion();
        $this->modelo = new Serie($conexion);
    }

    public function listar() {
        $series = $this->modelo->obtenerTodos();
        $conteo = $this->modelo->contarSeries();
        require_once '../views/index.php';
    }

    public function crear() {
        require_once '../views/crear.php';
    }

    public function editar() {
        $id = $_GET['id'];
        $serie = $this->modelo->obtenerPorId($id);
        if ($serie) {
            require_once '../views/editar.php';
        } else {
            echo 'La serie no existe';
        }
    }

    public function eliminar() {
        $id = $_GET['id'];
        $this->modelo->eliminar($id);
        header('Location: index.php');
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['id']) {
                $id = $_POST['id'];
                $titulo = $_POST['titulo'];
                $valoracion = $_POST['valoracion'];
                $this->modelo->editar($id, $titulo, $valoracion);
            } else {
                $titulo = $_POST['titulo'];
                $valoracion = $_POST['valoracion'];
                $this->modelo->crear($titulo, $valoracion);
            }
        }
        header('Location: index.php');
    }
}