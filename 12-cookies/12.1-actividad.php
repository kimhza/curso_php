<?php
    $cookies_datos = isset($_COOKIE['cookies_datos']) && $_COOKIE['cookies_datos'] == 'acepto';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['aceptar_cookies'])) {
        setcookie('cookies_datos', 'acepto', time() + 3600, '/'); // La cookie expira en 1 hora
        header('Location: ' . $_SERVER['REQUEST_URI']); // Recarga la página para que la cookie esté disponible
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    #div-cookie {
        display: none;
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 10px;
        background-color: lightblue;
    }
    </style>
</head>

<body>
    <h2>Bienvenido a la Página Web</h2>
    <div id="div-cookie" style="display: <?php echo $cookies_datos ? 'none' : 'block'; ?>">
        <p>¿Aceptas la política de tratamiento de datos?</p>
        <form method="POST" action="">
            <button type="submit" name="aceptar_cookies">Aceptar</button>
        </form>
    </div>
</body>

</html>