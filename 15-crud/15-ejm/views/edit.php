<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Libro</title>
</head>

<body>
    <h1>Editar Libro</h1>
    <form action="<?= BASE_URL ?>/update/<?= $libro['codigo'] ?>" method="POST">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" id="titulo" value="<?= $libro['titulo'] ?>" required><br>

        <label for="autor">Autor:</label>
        <input type="text" name="autor" id="autor" value="<?= $libro['autor'] ?>" required><br>

        <label for="autor">Disponible:</label>
        <select name="disponible" id="disponible" value="<?= $libro['disponible'] ?>">
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
        <br>
        <button type="submit">Actualizar</button>
    </form>
</body>

</html>