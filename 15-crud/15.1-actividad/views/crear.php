<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
    <h1>Crear Relato</h1>

    <form action="index.php?accion=guardar" method="POST">
        <div>
            <label for="titulo">Titulo</label>
            <input id="titulo" name="titulo" type="text" required>
        </div>
        <div>
            <label for="relato">Descripción Relato</label>
            <input id="relato" name="relato" type="text" required>
        </div>
        <div>
            <label for="nombre">Autor</label>
            <input id="nombre" name="nombre" type="text" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input id="email" name="email" type="email" required>
        </div>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>