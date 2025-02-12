<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
:root,
body {
    font-family: 'Franklin Gothic Medium',
        'Arial Narrow',
        Arial,
        sans-serif;
}

h1,
h2,
h3 {
    text-align: center;
}

.container-form {
    margin-top: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

#form-login {
    display: flex;
    flex-direction: column;
    gap: 10px;
    max-width: fit-content;
}

.form-field {
    display: flex;
    flex-direction: column;
    gap: 2px;
}
</style>

<body>
    <div class="container-form">
        <!-- Actividad 7.2 -->
        <h2>Login</h2>
        <form id="form-login" action="productos.php" method="post">
            <div class="form-field">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre">
            </div>
            <div class="form-field">
                <label for="pwd1">Contraseña</label>
                <input type="password" name="pwd1" id="pwd1">
            </div>
            <div class="form-field">
                <label for="pwd2">Confirma la contraseña:</label>
                <input type="password" name="pwd2" id="pwd2">
            </div>
            <input type="submit" value="Ingresar">
        </form>

        <?php
        $nombre = '';
        $pwd1 = '';
        $pwd2 = '';
        $errores = [];
        define("USER", "prueba");
        define("PASSWORD", "Hola123");

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '' ;    
        $pwd1 = isset($_POST['pwd1']) ? $_POST['pwd1'] : '' ;  
        $pwd2 = isset($_POST['pwd2']) ? $_POST['pwd2'] : '' ;  

            //Validacion del campo nombre
            if (empty($nombre) || strlen($nombre) < 5) {
                $errores[] = 'El nombre es obligatorio y debe tener mas de 5 caracteres.';
            } else {
                $nombre = htmlspecialchars($_POST['nombre']);
            }

            //Validacion de campos password
            if (empty($pwd1) || empty($pwd2) || $pwd1 !== $pwd2) {
                $errores[] = 'Uno o mas de las contraseñas estan vacias o no son iguales';
            } else {
                $pwd1 = htmlspecialchars($_POST['pwd1']);
                $pwd2 = htmlspecialchars($_POST['pwd2']);
            }

            // Si usuario y contraseñas son iguales a las constantes, redirige a la pg productos.php
            if (USER == $nombre && PASSWORD == $pwd1 && PASSWORD == $pwd2) {
                header('Location: ./productos.php');
                exit();
            } else {
                $errores[] = "El usuario o la contraseña no coinciden con los datos almacenados.";
            }

            // Si hay errores los muestra como una lista desordenada
            if (!empty($errores)) {
                echo '<ul style="color: red;">';
                foreach ($errores as $error) {
                    echo '<li>' . htmlspecialchars($error) . '</li>';
                }
                echo '</ul>';
            }
        }
        ?>
    </div>
</body>

</html>