<?php 

include_once '../config/Database.php';
include_once '../controllers/SerieController.php';
include_once '../models/Serie.php';

$accion = isset($_GET['accion']) ? $_GET['accion'] : null;
$codigo = isset($_GET['codigo']) ? $_GET['codigo'] : null;

$seriecontroller = new SerieController();

if ($accion === 'crear') {
    $seriecontroller->crear();
} else if ($accion === 'editar' && $codigo) {
    $seriecontroller->editar();
} else if ($accion === 'eliminar' && $codigo) {
    $seriecontroller->eliminar();
} else if ($accion === 'actualizar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $seriecontroller->guardar();
} else if ($accion === 'guardar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $seriecontroller->guardar();
} else {
    $seriecontroller->listar();
}