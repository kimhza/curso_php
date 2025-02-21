<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Login</title>
</head>
<?php 
    session_start();
    $user = '';
    $password = '';
    $mensaje = '';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user = isset($_REQUEST['user']) ? $_REQUEST['user'] : null;
        $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : null;

        // Valores ejm base de datos
        $db_user = 'Hola';
        $db_pwd = '1234';

        if ($user == $db_user && $password == $db_pwd) {
            $_SESSION['user'] = $_REQUEST['user'];
            header('Location:  home.php');
            die();
        } else {
            $mensaje = 'Usuario o contraseña incorrectos';
        }
    }
?>

<body>
    <main>
        <div class="container_form">
            <form method="post">
                <div>
                    <label for="user">Usuario</label>
                    <input type="text" name="user" id="user">
                </div>
                <div>
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password">
                </div>
                <input type="submit" value="Ingresar" id="send">
            </form>
            <?php if ($mensaje): ?>
            <div class="container_error">
                <p class="message_error">Usuario o contraseña incorrectos.</p>
            </div>
            <?php endif; ?>
        </div>
    </main>
</body>

</html>