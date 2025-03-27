<?php

//Conexion a DB
$hostDB = 'Chinook_Sqlite.sqlite';
$hostPDO = "sqlite:$hostDB";
$miPDO = new PDO($hostPDO);

// Preparo consulta select
$miConsulta = $miPDO->prepare('SELECT * FROM Employee;');

// Ejecuto consulta
$miConsulta->execute();

// Retornamos todas las filas en el arr $resultados
$employees = $miConsulta->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
table {
    border-collapse: collapse;
}

td,
th {
    border: 1px solid black;
    padding: 8px;
    text-align: left;
}
</style>

<body>
    <h2>Tabla de Empleados</h2>
    <table>
        <tr>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Title</th>
            <th>City</th>
        </tr>
        <?php foreach ($employees as $employee): ?>
        <tr>
            <td><?= $employee['FirstName']; ?></td>
            <td><?= $employee['LastName']; ?></td>
            <td><?= $employee['Title']; ?></td>
            <td><?= $employee['City']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>