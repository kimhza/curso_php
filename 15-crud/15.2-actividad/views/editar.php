<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Serie</title>
</head>

<body>
    <main>
        <h1>Actualizar registro de serie:</h1>
        <form action="index.php?accion=actualizar" method="POST">
            <input id="id" name="id" type="hidden" value="<?= $serie['id'] ?>">
            <div>
                <label for="titulo">Titulo</label>
                <input id="titulo" name="titulo" type="text" value="<?= $serie['titulo'] ?>" required>
            </div>
            <div>
                <label for="valoracion">Titulo</label>
                <input id="valoracion" name="valoracion" type="text" value="<?= $serie['valoracion'] ?>" required>
            </div>
            <button type="submit">Actualizar</button>
        </form>
    </main>
</body>

</html>