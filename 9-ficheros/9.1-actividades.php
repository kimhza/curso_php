<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Actividad 7.1 -->
    <h3>Formulario de Registro de Perfil</h3>
    <form method="post" enctype="multipart/form-data">
        <div>
            <label for="apodo">Apodo</label>
            <input type="text" name="apodo" id="apodo" required>
        </div>
        <div>
            <label for="edad">Edad</label>
            <input type="number" name="edad" id="edad" required>
        </div>
        <div>
            <label for="imagen">Imagen de Perfil</label>
            <input type="file" name="imagen" id="imagen" required>
        </div>
        <input type="submit" value="Enviar">
    </form>

    <?php 
     $apodo = '';
     $edad = '';
     $fichero_subido = '';
     $errores = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $apodo = isset($_REQUEST['apodo']) ? $_REQUEST['apodo'] : '';
        $edad = isset($_REQUEST['edad']) ? $_REQUEST['edad'] : '';
        $dir_subida = './subidos/';
        $fichero_subido = $dir_subida . basename($_FILES['imagen']['name']);

        // Validacion del campo apodo
        if (empty($_POST['apodo']) || strlen($_POST['apodo']) < 3) {
            $errores[] = 'El apodo es obligatorio y debe tener al menos 3 caracteres.';
        } else {
            $apodo = htmlspecialchars($_POST['apodo']);
        }

        //Validacion del campo edad
        $edad = filter_var($_POST['edad'], FILTER_VALIDATE_INT, [
            'options' => [
                'min_range' => 1,
                'max_range' => 110
            ]
        ]);

        if (!$edad) {
            $errores[] = 'La edad debe ser un número entero entre 1 y 110.';
        }

        // Validacion del fichero imagen
        if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] != UPLOAD_ERR_OK) {
            $errores[] = 'No se ha subido ninguna imagen o ha ocurrido un error en la subida.';
        } else {
            $imagen = $_FILES['imagen'];
            $extensiones_validas = ['jpg', 'jpeg', 'png'];
            $extension_imagen = strtolower(pathinfo($imagen['name'], PATHINFO_EXTENSION));

            if (!in_array($extension_imagen, $extensiones_validas)) {
                $errores[] = 'La imagen debe ser JPG, JPEG o PNG.';
            }

            if ($imagen['size'] > 2000000) { // 2MB máximo
                $errores[] = 'La imagen no debe superar los 2MB.';
            } else {
                if (!move_uploaded_file($imagen['tmp_name'], $fichero_subido)) {
                    $errores[] = '¡Ups! Algo ha pasado al subir la imagen.';
                }
            }
        }

        // Si no hay errores, mostrar los datos
        if (empty($errores)) {
            echo '<p style="color: green;">Formulario enviado correctamente.</p>';
        } else {
            echo '<ul style="color: red;">';
            foreach ($errores as $error) {
                echo '<li>' . htmlspecialchars($error) . '</li>';
            }
            echo '</ul>';
        }
    }
    ?>

    <div
        style="display: flex; gap: 10px; background-color: #ffefef; width: fit-content; padding: 20px; border-radius: 20px;">
        <div><?= '<img width="100" height="100" style="border-radius: 50%" src="' . $fichero_subido . '">' ?></div>
        <div style="display: flex; flex-direction: column; justify-content:center;">
            <p style="margin: 4px;"><b>Apodo:</b> <?= $apodo; ?></p>
            <p style="margin: 4px;"><b>Edad:</b> <?= $edad; ?> años</p>
        </div>
    </div>

</body>

</html>