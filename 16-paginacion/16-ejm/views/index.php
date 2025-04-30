<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paginador</title>
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


        <div class="paginacion">
            <?php if ($paginaActual > 1): ?>
            <a class="btn-accion" href="index.php?pagina=<?php echo $paginaActual - 1; ?>"> ⬅️ </a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPaginas; $i++):
                if ($i == $paginaActual): ?>
            <strong><?php echo $i; ?></strong>
            <?php else: ?>
            <a href="index.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php endif;
            endfor; ?>

            <?php if ($paginaActual < $totalPaginas): ?>
            <a class="btn-accion" href="index.php?pagina=<?php echo $paginaActual + 1; ?>"> ➡️ </a>
            <?php endif; ?>
        </div>

        <p>Total Series Guardadas: <?= $totalSeries; ?></p>
    </main>
</body>

</html>