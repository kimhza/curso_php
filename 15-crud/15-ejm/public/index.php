<?php
define('BASE_URL', 'http://localhost:8000/15-crud/15-ejm/public');

include_once '../config/config.php';
include_once '../models/Libro.php';
include_once '../controllers/LibroController.php';

$req = $_SERVER['REQUEST_URI'];
$posicion = strpos($req, "public");
$request = substr($req, $posicion + strlen("public"));
$libroController = new LibroController();

if ($request === '/') {
    $libroController->index();
} elseif ($request === '/create') {
    $libroController->create();
} elseif ($request === '/save' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $libroController->save();
} elseif (strpos($request, '/edit') === 0) {
    $codigo = substr($request, strlen('/edit/'));
    if (is_numeric($codigo)) {
        $libroController->edit($codigo);
    } else {
        echo "El ID es incorrecto";
    }
} elseif (strpos($request, '/update') === 0 && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = substr($request, strlen('/update/'));
    if (is_numeric($codigo)) {
        $libroController->update($codigo);
    } else {
        echo "El ID es incorrecto";
    }
} elseif (strpos($request, '/delete') === 0) {
    $codigo = substr($request, strlen('/delete/')); 
    if (is_numeric($codigo)) {
        $libroController->delete($codigo);
    } else {
        echo "El ID es incorrecto";
    }
} else {
    echo 'Error: No se encuentra la Página.';
}