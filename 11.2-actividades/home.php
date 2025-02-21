<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php"); // Redirigir al inicio de sesión si no está autenticado
    exit();
}

if (isset($_POST['logout'])) {
    session_unset(); // Elimina todas las variables de sesión
    session_destroy(); // Destruye la sesión
    header("Location: login.php"); 
    exit();
}
?>

<body>
    <nav class="menu_home">
        <ul>
            <li>Inicio</li>
            <li>
                <a href="logout.php">Cerrar sesión</a>
            </li>
        </ul>
    </nav>
    <main>
        <h2>Pagina de ejemplo</h2>
    </main>
</body>

</html>