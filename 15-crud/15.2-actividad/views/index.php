<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Series</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
    <main>
        <h1>Listado de series</h1>
        <p><a class="btn-accion btn-accion-crear" href="index.php?accion=crear">Agregar serie</a></p>
        <table>
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Valoración</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($series as $serie): ?>
                <tr>
                    <td> <?= $serie['titulo'] ?> </td>
                    <td> <?= $serie['valoracion'] ?> </td>
                    <td>
                        <a class="btn-accion btn-accion-editar"
                            href="index.php?accion=editar&id=<?= $serie['id']?>">Editar</a>
                        <a class="btn-accion btn-accion-eliminar"
                            href="index.php?accion=eliminar&id=<?= $serie['id'] ?> ">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p>Total Series Guardadas: <?= $conteo; ?></p>
    </main>
</body>

</html>