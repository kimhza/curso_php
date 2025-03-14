<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!--
Siempre se debe validar la informacion de los formularios en PHP, 
ya que aunque se valide en Js, los datos pueden ser alterados desde el navegador.
Hay que considerar que el usuario puede ingresar:
* Letras en lugar de numeros.
* Dejar campos vacios cuando deben ser obligatorios.
* Dar malos formato.
* Longitud muy corta o larga.
* Codigo malintencionado.

Aunque hay muchas maneras de validar datos, en gral
se deben seguir los siguientes pasos:
1- Enviar datos desde el formulario.
2- Recoger los datos.
3- Validar cada campo.
4- Mostrar al usuario los errores con mensajes.
5- Si existen errores, mantenerse en la pag.
6- Si no existen errores, generar la accion e informar al usuario del paso satisfactorio.
-->

    <!-- De forma nativa en PHP existe una fx (filter_var), que permite filtrar una variable 
con el filtro especificado.
-- Filter_var -> Permite depurar y validar datos.
Sintaxis:
filter_var ( mixed $value , int $filter = FILTER_DEFAULT , array|int $options = 0 ) : mixed

Filtros de validacion:
https://www.phptutorial.net/php-tutorial/php-filter_var/ 
-->
    <?php
    //Solo permite validar si cumple con el formato especificado.
    filter_var('correo@ejemplo.com', FILTER_VALIDATE_EMAIL);
    ?>

    <?php
    //======================================================================
    // PROCESAR FORMULARIO
    //======================================================================
    // Comprobamos si nos llega los datos por POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //-----------------------------------------------------
        // Funciones Para Validar
        //-----------------------------------------------------

        /**
         * Método que valida si un texto no esta vacío
         * @param {string} - Texto a validar
         * @return {boolean}
         */
        function validar_requerido(string $texto): bool
        {
            return !(trim($texto) == '');
        }

        /**
         * Método que valida si es un número entero
         * @param {string} - Número a validar
         * @return {bool}
         */
        function validar_entero(string $numero): bool
        {
            return filter_var($numero, FILTER_VALIDATE_INT);
        }

        /**
         * Método que valida si el texto tiene un formato válido de E-Mail
         * @param {string} - Email
         * @return {bool}
         */
        function validar_email(string $texto): bool
        {
            return filter_var($texto, FILTER_VALIDATE_EMAIL);
        }

        //-----------------------------------------------------
        // Variables
        //-----------------------------------------------------
        $errores = [];
        $nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : null;
        $edad = isset($_REQUEST['edad']) ? $_REQUEST['edad'] : null;
        $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;

        //-----------------------------------------------------
        // Validaciones
        //-----------------------------------------------------
        // Nombre
        if (!validar_requerido($nombre)) {
            $errores[] = 'El campo Nombre es obligatorio.';
        }
        // Edad
        if (!validar_entero($edad)) {
            $errores[] = 'El campo de Edad debe ser un número.';
        }
        // Email
        if (!validar_email($email)) {
            $errores[] = 'El campo de Email tiene un formato no válido.';
        }

        //-----------------------------------------------------
        // Lógica
        //-----------------------------------------------------
        if (!isset($errores)) {
            // Enviamos el correo
        }
    }
    ?>

    <!-- Mostramos errores por HTML -->
    <?php if (isset($errores)): ?>
    <ul class="errores">
        <?php foreach ($errores as $error): ?>
        <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>

    <!-- Formulario -->
    <form method="post">
        <p>
            <!-- Campo nombre -->
            <input type="text" name="nombre" placeholder="Nombre">
        </p>
        <p>
            <!-- Campo edad -->
            <input type="text" name="edad" placeholder="Edad">
        </p>
        <p>
            <!-- Campo Email -->
            <input type="text" name="email" placeholder="Email">
        </p>
        <p>
            <!-- Botón submit -->
            <input type="submit" value="Enviar">
        </p>
    </form>
</body>

</html>