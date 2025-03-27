<?php 

// Creo las variables
$hostDB = '127.0.0.1';
$nameDB = 'bike_store';
$userDB = ''; //nombre de usuario
$pwdDB = ''; //contraseña

// Conecto la DB
$hostPDO = "mysql:host=$hostDB;dbname=$nameDB;";
$objPDO = new PDO($hostPDO, $userDB, $pwdDB);

// Preparo la consulta
$selQuery = $objPDO->prepare('select * from brands;');

// Ejecuto la consulta
$selQuery->execute();

// Muestro los resultados
$resultados = $listOrders->fetchAll();
var_dump($resultados);
/*
foreach ($resultados as $posicion => $columna) {
    echo $columna['brand_name'];
}*/
?>