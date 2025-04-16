<?php 

require_once '../models/Relato.php';

class RelatoController {

    public function listar() {
        $relatos = Relato::obtenerTodos();
        $conteo = Relato::contar_relatos(); 
        require_once '../views/index.php';
    }

    public function crear() {
        require_once '../views/crear.php';
    }

    public function editar() {
        $id = $_GET['id'];
        $relato = Relato::obtenerPorCodigo($id);
        if ($relato) {
            require_once '../views/editar.php';
        } else {
            echo "Relato no encontrado";
        }
    }

    public function eliminar() {
        $id = $_GET['id'];
        Relato::eliminar($id);
        header('Location: index.php');
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $relato = $_POST['relato'];
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            Relato::crear($titulo, $relato, $nombre, $email);
            header('Location:index.php');
        } else {
            require_once '../views/index.php';
        }
    }

    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $titulo = $_POST['titulo'];
            $relato = $_POST['relato'];
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            Relato::editar($id, $titulo, $relato, $nombre, $email);
            header('Location:index.php');
        } else {
            require_once '../views/index.php';
        }
    }
}