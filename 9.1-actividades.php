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
            <input type="text" name="apodo" id="apodo">
        </div>
        <div>
            <label for="edad">Edad</label>
            <input type="number" name="edad" id="edad">
        </div>
        <div>
            <label for="imagen">Imagen de Perfil</label>
            <input type="file" name="imagen" id="imagen">
        </div>
        <input type="submit" value="Enviar">
    </form>

    <?php 
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $apodo = isset($_REQUEST['apodo']) ? $_REQUEST['apodo'] : '';
        $edad = isset($_REQUEST['edad']) ? $_REQUEST['edad'] : '';

        $dir_subida = './subidos/';
        $fichero_subido = $dir_subida . basename($_FILES['imagen']['name']);

        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero_subido)) {
            echo '<p style="color: green;">Se subió perfectamente.</p>';
        } else {
            echo '<p style="color: red;">¡Ups! Algo ha pasado.</p>';
        }
    
     }
    ?>

    <table style="margin-top: 20px;">
        <tr>
            <th>Apodo</th>
            <th>Edad</th>
            <th>Imagen</th>
            <th>Ruta</th>
        </tr>
        <tr>
            <td><?= $apodo; ?></td>
            <td><?= $edad; ?></td>
            <td><?= '<img width="100" src="' . $fichero_subido . '">' ?></td>
            <td><?= $fichero_subido ?></td>
        </tr>
    </table>

</body>

</html>