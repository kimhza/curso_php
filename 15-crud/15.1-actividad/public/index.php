<?php
include_once '../config/Database.php';
include_once '../models/Relato.php';
include_once '../controllers/RelatoController.php';

$accion = isset($_GET['accion']) ? $_GET['accion'] : null;
$codigo = isset($_GET['id']) ? $_GET['id'] : null;

$relatoController = new RelatoController();

if ($accion === 'crear') {
    $relatoController->crear();
} else if ($accion === 'editar' && $codigo) {
    $relatoController->editar();
} else if ($accion === 'eliminar' && $codigo) {
    $relatoController->eliminar();
} else if ($accion === 'actualizar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $relatoController->actualizar();
} else if ($accion === 'guardar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $relatoController->guardar();
} else {
    $relatoController->listar();
}