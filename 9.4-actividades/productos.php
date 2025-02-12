<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Productos</h1>
    <h2>Registro Productos</h2>
    <form method="post" enctype="multipart/form-data">
        <div>
            <label for="serie">Nro serie</label>
            <input type="number" name="serie" id="serie">
        </div>
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre">
        </div>
        <div>
            <label for="precio">Precio</label>
            <input type="text" name="precio" id="precio">
        </div>
        <div>
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" id="imagen">
        </div>
        <input type="submit" value="Agregar">
    </form>

    <?php
    $serie = '';
    $nombre = '';
    $precio = '';
    $errores = [];
    $fichero_subido = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $serie = $_POST['serie'] ?? '';
        $nombre = $_POST['nombre'] ?? '';
        $precio = $_POST['precio'] ?? '';

        // Validación de serie
        if (filter_var($serie, FILTER_VALIDATE_INT) === false) {
            $errores[] = 'El campo serie debe ser un numero entero';
        }

        // Validación de nombre
        if (empty($nombre) || strlen($nombre) < 5) {
            $errores[] = 'El nombre está vacío o tiene una longitud menor a 5';
        } else {
            $nombre = htmlspecialchars($nombre);
        }

        // Validación de precio
        if (filter_var($precio, FILTER_VALIDATE_INT) === false) {
            $errores[] = 'El campo precio debe ser un número entero';
        }

        // Validación de imagen
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $imagen = $_FILES['imagen'];
            $dir_subida = './imagenes_productos/';
            if (!is_dir($dir_subida)) {
                if (mkdir($dir_subida, 0777, true)) {
                    echo "El directorio $dir_subida fue creado correctamente";
                } else {
                    echo "No se pudo crear el directorio $dir_subida.";
                }
            } else {
                echo "El directorio $dir_subida ya existe.";
            }

            $fichero_subido = $dir_subida . basename($imagen['name']);
            $extensiones_validas = ['jpg', 'jpeg', 'png'];
            $extension_imagen = strtolower(pathinfo($imagen['name'], PATHINFO_EXTENSION));

            // Validación de extensión de imagen
            if (!in_array($extension_imagen, $extensiones_validas)) {
                $errores[] = 'La imagen debe ser JPG, JPEG o PNG.';
            }

            // Validación de tamaño de archivo de imagen
            if ($imagen['size'] > 2000000) { // 2MB máximo
                $errores[] = 'La imagen no debe superar los 2MB.';
            } else {
                if (!move_uploaded_file($imagen['tmp_name'], $fichero_subido)) {
                    $errores[] = '¡Ups! Algo ha pasado al subir la imagen.';
                }
            }
        } else {
            $errores[] = 'No se ha subido ninguna imagen o ha ocurrido un error en la subida.';
        }

        // Si hay errores, se muestran en una lista desordenada
        if (!empty($errores)) {
            echo '<ul style="color: red;">';
            foreach ($errores as $error) {
                echo '<li>' . htmlspecialchars($error) . '</li>';
            }
            echo '</ul>';
        }
    }
    ?>

    <?php if (empty($errores)): ?>
    <h3>Listado de productos</h3>
    <table>
        <tr>
            <th>Serie</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Imagen</th>
        </tr>
        <tr>
            <td><?= htmlspecialchars($serie) ?></td>
            <td><?= htmlspecialchars($nombre) ?></td>
            <td><?= htmlspecialchars($precio) ?></td>
            <td><img width="100" height="100" src="<?= $fichero_subido ?>" alt="Imagen del producto"></td>
        </tr>
    </table>
    <?php endif; ?>

</body>

</html>