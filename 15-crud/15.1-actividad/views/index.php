<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
    <main>
        <h2>Concurso de Relatos</h2>
        <p>A continuación, se listan los relatos enviados al Concurso:</p>

        <table>
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Descripción</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($relatos as $relato): ?>
                <tr>
                    <td><?= htmlspecialchars($relato['titulo']) ?></td>
                    <td><?= htmlspecialchars($relato['relato']) ?></td>
                    <td><?= htmlspecialchars($relato['nombre']) ?></td>
                    <td><?= htmlspecialchars($relato['email']) ?></td>
                    <td> <a class="btn-accion btn-accion-editar"
                            href="index.php?accion=editar&id=<?= $relato['id']?>">Editar</a>
                    </td>
                    <td> <a class="btn-accion btn-accion-eliminar"
                            href="index.php?accion=eliminar&id=<?= $relato['id'] ?> ">Eliminar</a> </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p>Aqui puedes añadir un nuevo relato:</p>
        <a class="btn-accion btn-accion-crear" href="index.php?accion=crear">Crear nuevo relato</a>
    </main>
</body>

</html>