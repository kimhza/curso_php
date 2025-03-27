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
$insertQuery = $objPDO->prepare('insert into brands (brand_name) values (:brand_name);');

// Ejecuto la consulta
$insertQuery->execute(
    array(
        'brand_name' => 'Noni'
    )
);

// Valido que si haya insertado el registro
if ($insertQuery->rowCount() > 0) {
    echo 'Registro insertado correctamente';
} else {
    echo 'No se inserto el registro';
}