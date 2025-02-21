<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Sesion ó Cookie de Sesion:
Variable que se guarda temporalmente en el navegador y solo nosotros podemos ver el contenido.
Usada para:
* Proteger paginas: Solo ingresen usuarios autorizados.
* Guardar info sensible del usuario (nombre, id, ubicacion, birthdate)
* Aumentar la seguridad: Cuando el usuario cierra la sesion se eliminará cualquier dato almacenado.

Sesion != Cookie: 
* Ambas se guardan en el navegador del cliente.
* Con sesion se eliminan los datos cuando el usuario finaliza la sesion
* Las cookies pueden permanecer por mas tiempo almacenadas en el navegador

1. Crear una sesion:
* session_start() -> Para activar la sesion. Inmediatamente se dispone del array $_SESSION.
Ejm: 
$_SESSION['nombre'] = 'Goku'; 
$_SESSION['raza'] = 'Saiyan';
echo $_SESSION['nombre'];

Podemos ver que contiene el array con: var_dump($_SESSION)

2. Comprobar si existe:
Una variable de sesion es util para saber si el usuario puede entrar a una pg concreta.
// Creamos la variable en algún momento
session_start();
$_SESSION['apodo'] = 'Bulma';

// Comprobamos si existe con isset()
if (isset($_SESSION['apodo'])) {
    // Si esta identificado, en otras palabras existe la variable, le saludamos
    echo 'Hola ' . $_SESSION['apodo'];
} else {
    // En caso contrario redirigimos el visitante a otra página
    header('Location: http://dragonball.jp/login.php');
    die();
}

!!! Nota: 
Al hacer una redireccion con header() siempre finaliza con die() o exit()
para evitar problemas de seguridad.

3. Borrar una sesion:
Las sesiones solo se borran con la fx nativa de PHP: session_destroy()
** unset() esta deprecated!!!

4. Modificar info en una sesion:
Se realiza de igual manera que una array:
Ejm: $_SESSION['apodo'] = 'Picolo';


5. 
-->
</body>

</html>