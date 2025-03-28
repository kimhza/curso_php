<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nuevo Libro</title>
</head>

<body>
    <h1>Crear Nuevo Libro</h1>
    <form action="<?= BASE_URL ?>/save" method="POST">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" id="titulo" required><br>

        <label for="autor">Autor:</label>
        <input type="text" name="autor" id="autor" required><br>

        <label for="autor">Disponible:</label>
        <select name="disponible" id="disponible">
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
        <br>

        <button type="submit">Guardar</button>
    </form>
</body>

</html>