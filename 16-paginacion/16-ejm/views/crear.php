<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main>
        <h1>Actualizar registro de serie:</h1>
        <form action="index.php?accion=guardar" method="POST">
            <div>
                <label for="titulo">Titulo</label>
                <input id="titulo" name="titulo" type="text" value="" required>
            </div>
            <div>
                <label for="valoracion">Valoracion</label>
                <input id="valoracion" name="valoracion" type="number" value="" min="0" max="10" required>
            </div>
            <button type="submit">Actualizar</button>
        </form>
    </main>
</body>

</html>