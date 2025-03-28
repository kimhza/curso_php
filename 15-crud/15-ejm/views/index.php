<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Libros</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>

<body>
    <h1>Listado de libros:</h1>
    <a class="btn-accion btn-accion-crear" href="<?= BASE_URL ?>/create">Nuevo Libro</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Disponible</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($libros as $libro): ?>
        <tr>
            <td><?= $libro['codigo'] ?></td>
            <td><?= $libro['titulo'] ?></td>
            <td><?= $libro['autor'] ?></td>
            <td><?= $libro['disponible'] == 1 ? 'Si' : 'No' ?></td>
            <td>
                <a href="<?= BASE_URL ?>/edit/<?= $libro['codigo'] ?>" class="btn-accion btn-accion-editar">Editar</a>
                <a href="<?= BASE_URL ?>/delete/<?= $libro['codigo'] ?>"
                    class="btn-accion btn-accion-eliminar">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>