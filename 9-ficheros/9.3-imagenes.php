<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil</title>
</head>

<body>
    <?php

//======================================================================
// VARIABLES
//======================================================================
$errorAvatar = 0;
$avatar = null;
$rutaThumbnail = null;

// Definir directorio donde se guardará
define('PATH_AVATAR', './subidos/');
define('PATH_AVATAR_THUMBNAIL', './subidos/thumbnails/');

// Tamanyo max avatar: 2 Mb
define('MAX_SIZE_AVATAR_MB', 2);
define('MAX_SIZE_AVATAR', MAX_SIZE_AVATAR_MB * 1024 * 1024);
// En /etc/php/7.4/cli/php.ini edita las siguientes variables
// upload_max_filesize=100Mb
// post_max_size=100Mb

// Anchura miniatura
define('WIDTH_THUMBNAIL', 100);

//======================================================================
// PROCESAR FORMULARIO
//======================================================================

// Comprobamos si nos llega los datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES)) {

    //-----------------------------------------------------
    //  Recoger avatar
    //-----------------------------------------------------

    // Verifica si existe el directorio, y en caso contrario lo crea
    if (!is_dir(PATH_AVATAR_THUMBNAIL)) {
        mkdir(PATH_AVATAR_THUMBNAIL, 0775, true);
    }
    // Definir la ruta final del archivo
    $nombreFoto = sha1_file($_FILES['avatar']['tmp_name']) . basename($_FILES['avatar']['name']);
    $ficheroSubido = PATH_AVATAR . $nombreFoto;

    //-----------------------------------------------------
    //  Control de errores
    //-----------------------------------------------------

    // Tamanyo maximo
    if ($_FILES['avatar']['size'] > MAX_SIZE_AVATAR) {
        $errorAvatar = 1;
    }

    // Solo JPG y PNG
    if ($_FILES['avatar']['type'] !== 'image/png' && $_FILES['avatar']['type'] !== 'image/jpeg') {
        $errorAvatar = 2;
    }

    // Obligatorio
    if ($_FILES['avatar']['size'] === 0) {
        $errorAvatar = 3;
    }

    //-----------------------------------------------------
    //  Procesar imagen
    //-----------------------------------------------------

    if ($errorAvatar === 0) {
        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $ficheroSubido)) {
            // Mueve el archivo de la carpeta temporal a la ruta definida
            $avatar = $ficheroSubido;

            // Creamos una miniatura
            // No olvides instalarlo con: sudo apt install php-imagick
            $imagen = new Imagick($avatar);

            // Si se proporciona 0 como parámetro de ancho o alto,
            // se mantiene la proporción de aspecto
            $imagen->thumbnailImage(WIDTH_THUMBNAIL, 0);
            $rutaThumbnail = PATH_AVATAR_THUMBNAIL . $nombreFoto;
            file_put_contents($rutaThumbnail, $imagen);
        }
    }
}
?>
    <?php if (isset($rutaThumbnail)): ?>
    <img src="<?= $rutaThumbnail; ?>" alt="mi avatar" width="<?= WIDTH_THUMBNAIL ?>">
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data">
        <p>
            <label>
                Foto:
                <input type="file" name="avatar">
            </label>
        </p>
        <?php if ($errorAvatar === 1): ?>
        <p style="color: red">
            Tamaño demasiado grande, intente que tenga menos de <?= MAX_SIZE_AVATAR_MB ?>Mb
        </p>
        <?php elseif ($errorAvatar === 2): ?>
        <p style="color: red">
            Solo admitido imagenes en JPG o PNG.
        </p>
        <?php elseif ($errorAvatar === 3): ?>
        <p style="color: red">
            Debes incluir una imagen
        </p>
        <?php endif; ?>
        <p>
            <input type="submit" value="Guardar">
        </p>
    </form>
</body>

</html>