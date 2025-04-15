<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>
    <h1>Modificar Relato</h1>

    <form action="index.php?accion=actualizar" method="POST">
        <input id="id" name="id" type="hidden" value="<?= $relato['id'] ?>">
        <div>
            <label for="titulo">Titulo</label>
            <input id="titulo" name="titulo" type="text" value="<?= $relato['titulo'] ?>" required>
        </div>
        <div>
            <label for="relato">Descripción Relato</label>
            <input id="relato" name="relato" type="text" value="<?= $relato['relato'] ?>" required>
        </div>
        <div>
            <label for="nombre">Autor</label>
            <input id="nombre" name="nombre" type="text" value="<?= $relato['nombre'] ?>" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="<?= $relato['email'] ?>" required>
        </div>
        <button type="submit">Enviar</button>
    </form>
</body>

</html>