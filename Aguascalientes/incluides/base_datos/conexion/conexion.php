<?php
date_default_timezone_set('America/Mexico_City');
$host = "mocha3035.mochahost.com";
$user = "inventar_admin";
$clave = "Digitalayayayayayay1.";
$bd = "inventar_sistemadn";

$conexion = mysqli_connect($host, $user, $clave, $bd);

if (!$conexion) {
    die("No se pudo conectar a la base de datos: " . mysqli_connect_error());
}

mysqli_set_charset($conexion, "utf8"); // Establecer el juego de caracteres
?>
