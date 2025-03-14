<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Formulario Optimizacion de imagen</h3>
    <form method="post" enctype="multipart/form-data">
        <div>
            <label for="imagen">Carga una imagen</label>
            <input type="file" name="imagen" id="imagen">
        </div>
        <input type="submit" value="Enviar">
    </form>
    <?php 
$errores = [];
$fichero_subido = '';
// Anchura miniatura
define('WIDTH_THUMBNAIL', 100);
define('PATH_AVATAR_THUMBNAIL', './subidos/thumbnails/');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES)) {
    
    // Validación de imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagen = $_FILES['imagen'];
        $dir_subida = './subidos/';
        if (!is_dir($dir_subida)) {
            if (mkdir($dir_subida, 0775, true)) {
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
            } else {
            

                //creo la miniatura
                $imagen = new Imagick($avatar);
                $imagen->thumbnailImage(WIDTH_THUMBNAIL, 0);
                $rutaThumbnail = PATH_AVATAR_THUMBNAIL . $nombreFoto;
                file_put_contents($rutaThumbnail, $imagen);

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

    <div>
        <h4>Imagen de Perfil</h4>
        <img src="<?= $fichero_subido ?>" alt="">
    </div>
</body>

</html>