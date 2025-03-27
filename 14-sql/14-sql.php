<?php  

// Para conectarse a una DB:

/*
1. Se definen las variables:
$hostDB = 'direccion del servidor donde se encuentra la DB';
$nombreDB = 'nombre de la base de datos';
$usuarioDB = 'nombre de usuario';
$contrasenyaDB = 'contrasena usuario';

2. Conexion a DB:
Se crea la cadena de conexion y se almacena en $hostPDO
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";

Se crea el objeto $miPDO que manjea la conexion a la DB y se pasa a cadena de conexion, usuario y contraseña
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);

3. Preparacion de la consulta
Se prepara una consulta sql que se va a ejecutar.
Se debe usar prepare() para evitar ataques de inyeccion
$miConsulta = $miPDO->prepare('SELECT * FROM Escuelas;');

4. Ejecucion de la consulta
Se ejecuta la consulta que fue preparada previamente.
$miConsulta->execute();

5. Obtener los resultados
Desps de ejecutar la consulta se recuperan todos los datos y se almacenan en $resultados.
Luego con fetchAll() se devuelven todos los registros en forma de array.
$resultados = $miConsulta->fetchAll();

6. Mostrar los resultados
Con el bucle foreach se itera cada fila de los resultados

foreach ($resultados as $fila) {
    echo $fila['nombre'];
}
*/

?>