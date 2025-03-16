<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
</head>

<body>
    <!-- COOKIES
Una cookie es una variable que se guarda en el navegador con un periodo de vida.
Aunque el usuario abandone el sitio, la cookie permanece almacenada 
en el navegador si vuelve mas adelante podemos recuperar la info.
Siempre y cuando no haya borrado las cookies del navegador.

Usos:
* Guarda la configuracion para mejorar la experiencia del usuario.
Ejm: autologin, cambiar el idioma al elegido por 1era vez por el usuario, evitar mostrar anuncios rechazados.
* Usos comerciales: Sugerencias personalizadas de acuerdo a la busqueda o a la que tenemos en el carrito de compras.
* Crear estadisticas
-->

    <?php
/* Crear Cookies 
La sintaxis para crear una cookie es -> setcookie('nombre', 'valor', 'caducidad');
*/

$caducidad = time() * 60; //Caduca en 60 segundos
setcookie('idioma', 'es', $caducidad);

/* Obtener cookies
podemos obtenerla del array $_COOKIE['nombre_cookie'];
*/
echo $_COOKIE['idioma'];

/* Actualizar cookie
Para actualizar el valor de la cookie, seteamos el nombre y el valor, asi: */
setcookie('idioma', 'fr');

//Revisamos que valor nos arroja la cookie idioma
echo $_COOKIE['idioma'];

/*Borrar cookies
Existen 2 maneras de borrar cookies, una forma es con unset($_COOKIE['nombre_cookie']);
y la segunda forma es caducandola, asi: setcookie('idioma', 'es', time() - 1)
*/
unset($_COOKIE['idioma']);

?>


</body>

</html>