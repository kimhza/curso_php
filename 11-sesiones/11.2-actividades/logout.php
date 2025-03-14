<?php 
// Inicia la sesiones
session_start();
// Destruye las sesiones
session_destroy();
// Redigire a login.php
header('Location: login.php');
die();