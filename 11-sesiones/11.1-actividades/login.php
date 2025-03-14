<html>

<body>
    <main>
        <?php 
    // Comprobamos que nos llega los datos del formulario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Datos de inicio de sesion
        $apodoDB = 'usuario';
        $contrasenaDB = '12345';
        
        // Variables del formulario
        $apodo = isset($_REQUEST['apodo']) ? $_REQUEST['apodo'] : null;
        $contrasena = isset($_REQUEST['contrasena']) ? $_REQUEST['contrasena'] : null;

        // Si los datos ingresados en el formulario coincide con los almacenados
        if ($apodoDB == $apodo && $contrasenaDB == $contrasena) {
            // Si los datos coinciden, se crea la sesión
            session_start();
            // Guardamos en el array  de sesion el apodo
            $_SESSION['apodo'] = $_REQUEST['apodo'];
            // Redireccionamos a una pagina
            header('Location: perfil.php');
            die();
        } else {
            // Si los datos no son correctos, mostramos mensaje de error
            echo '<p style="color: red">El apodo o la contraseña es incorrecta.</p>';
        }
    }
?>
        <h2>Login</h2>
        <form method="post">
            <p>
                <label for="apodo">Apodo</label>
                <input type="text" name="apodo" placebolder="Apodo">
            </p>
            <p>
                <label for="contrasena">Contraseña</label>
                <input type="password" name="contrasena" placebolder="Contraseña">
            </p>
            <p>
                <input type="submit" value="Entrar">
            </p>
        </form>
    </main>
</body>

</html>