<?php
date_default_timezone_set('America/Mexico_City');
$host = "localhost";
$user = "root";
$clave = "";
$bd = "sistema";

$conexion = mysqli_connect($host, $user, $clave, $bd);

if (!$conexion) {
    die("No se pudo conectar a la base de datos: " . mysqli_connect_error());
}

mysqli_set_charset($conexion, "utf8"); // Establecer el juego de caracteres
?>
