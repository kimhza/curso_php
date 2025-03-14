<?php 
// Iniciamos la sesion
session_start();
// Si no existe la sesion de apodo, redirigimos a la pagina login.php
if (!isset($_SESSION['apodo'])) {
    header('Location: login.php');
    die();
}
?>
<html>

<body>
    <!-- Deberia mostrar un mensaje con el apodo -->
    <h1>Bienvenido <?= $_SESSION['apodo'] ?></h1>
    <!-- Botón para cerrar la sesión -->
    <a href="logout.php">Cerrar sesión</a>
</body>

</html>