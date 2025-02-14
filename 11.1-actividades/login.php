<html>

<body>
    <?php 
            // Comprobamos que nos llega los datos del formulario
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Variables que teóricamente estarían en una base de datos
                $apodoBueno = 'bulma';
                $contrasenyaBuena = '123';
                
                // Variables del formulario
                $apodo = isset($_REQUEST['apodo']) ? $_REQUEST['apodo'] : null;
                $contrasenya = isset($_REQUEST['contrasenya']) ? $_REQUEST['contrasenya'] : null;

                // Comprobamos si los datos son correctos
                if ($apodoBueno == $apodo && $contrasenyaBuena == $contrasenya) {
                    // Si son correctos, creamos la sesión
                    session_start();
                    $_SESSION['apodo'] = $_REQUEST['apodo'];
                    // Redireccionamos a la página segura
                    header('Location: perfil.php');
                    die();
                } else {
                    // Si no son correctos, informamos al usuario
                    echo '<p style="color: red">El apodo o la contraseña es incorrecta.</p>';
                }
            }
        ?>
    <form method="post">
        <p>
            <input type="text" name="apodo" placebolder="Apodo">
        </p>
        <p>
            <input type="password" name="contrasenya" placebolder="Contraseña">
        </p>
        <p>
            <input type="submit" value="Entrar">
        </p>
    </form>
</body>

</html>