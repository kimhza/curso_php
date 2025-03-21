<?php
$nombre = '';
$idioma = '';
$idioma_cookie = '';
$idioma_sel = '';
$color = '';

// Array con saludos en diferentes idiomas
$arr_saludo = [
    'ES' => ['saludo'=>'Bienvenido', 'color' => 'yellow'],
    'EN' => ['saludo'=>'Welcome', 'color' => 'red'],
    'IT' => ['saludo'=>'Benvenuto', 'color' => 'green'],
    'FR' => ['saludo'=>'Bienvenue', 'color' => 'blue'], 
];

// Verificar si existe una cookie de idioma
$idioma_cookie = isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : '';

// Si se envia el formulario, actualizar la cookie con el idioma seleccionado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los valores del formulario
    $nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : '';
    $idioma = isset($_REQUEST['idioma']) ? $_REQUEST['idioma'] : '';

    // Si se seleccionó un idioma, actualizar la cookie
    if ($idioma) {
        // Se establece la cookie por 1h
        setcookie('idioma', $idioma, time() + 3600);  
        // se actualiza el idioma con el valor almacenado en la cookie
        $idioma_cookie = $idioma;
    }
}

// Asignar el saludo y color basado en el idioma de la cookie
$idioma_sel = isset($arr_saludo[$idioma_cookie]['saludo']) ? $arr_saludo[$idioma_cookie]['saludo'] : '';
$color = isset($arr_saludo[$idioma_cookie]['color']) ? $arr_saludo[$idioma_cookie]['color'] : 'white';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-color: <?= $color ?>;">
    <h2>Idioma</h2>
    <form action="" method="POST">
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" required>
        </div>
        <div>
            <label for="idioma">Selecciona un idioma: </label>
            <select name="idioma" id="idioma" required>
                <option value="ES" <?= $idioma_cookie == 'ES' ? 'selected' : '' ?>>Español</option>
                <option value="EN" <?= $idioma_cookie == 'EN' ? 'selected' : '' ?>>Inglés</option>
                <option value="IT" <?= $idioma_cookie == 'IT' ? 'selected' : '' ?>>Italiano</option>
                <option value="FR" <?= $idioma_cookie == 'FR' ? 'selected' : '' ?>>Francés</option>
            </select>
        </div>
        <input type="submit" value="Enviar">
    </form>

    <!-- Mostrar el saludo y el nombre -->
    <h3><?= $idioma_sel . ' ' . $nombre ?></h3>
</body>

</html>