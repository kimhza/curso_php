<?php

// Variables
$hostDB = 'Chinook_Sqlite.sqlite';

// Conecta con base de datos
$hostPDO = "sqlite:$hostDB";
$miPDO = new PDO($hostPDO);

// Prepara SELECT
$miConsulta = $miPDO->prepare('SELECT * FROM Artist;');
// Ejecuta
$miConsulta->execute();

// Almaceno todos los resultados en el arr $resultados
$resultados = $miConsulta->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo con sqllite</title>
</head>

<body>
    <h2>Listado de artistas</h2>

    <label for="artistas">Artistas</label>
    <select name="artistas" id="artistas">
        <?php foreach ($resultados as $posicion => $columna) {?>
        <option value="<?= $columna['Name'] ?>"><?= $columna['Name'] ?></option>
        <?php } ?>
    </select>
</body>

</html>