<?php 
// Comprobamos si existe la sesión de apodo
session_start();
if (!isset($_SESSION['apodo'])) {
    // En caso contrario devolvemos a la página login.php
    header('Location: login.php');
    die();
}
?>
<html>

<body>
    <!-- Saludamos -->
    <h1>Bienvenido <?= $_SESSION['apodo'] ?></h1>
    <!-- Botón para cerrar la sesión -->
    <a href="logout.php">Cerrar sesión</a>
</body>

</html>