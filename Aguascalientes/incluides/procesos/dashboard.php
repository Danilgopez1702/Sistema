<?php
require("../../../base_datos/conexion/conexion.php");

$query_activos = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '0'");
$activos = mysqli_num_rows($query_activos);

$query_vencer = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '1'");
$vencer = mysqli_num_rows($query_vencer);

$query_morosos = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '2'");
$morosos = mysqli_num_rows($query_morosos);

$query_inactivos = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '3'");
$inactivos = mysqli_num_rows($query_inactivos);

$query_recuperado = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '4'");
$recuperado = mysqli_num_rows($query_recuperado);

$query_sinrec = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '5'");
$sinrec = mysqli_num_rows($query_sinrec);

$query_cancelado = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '6'");
$cancelado = mysqli_num_rows($query_cancelado);

$query_dificil = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '7'");
$dificil = mysqli_num_rows($query_dificil);

$query_reparaciones = mysqli_query($conexion, "SELECT * FROM `reportes` WHERE `tipo_reportes` = 1");
$reparaciones = mysqli_num_rows($query_reparaciones);

$query_migraciones = mysqli_query($conexion, "SELECT * FROM `reportes` WHERE `tipo_reportes` = 2");
$migraciones = mysqli_num_rows($query_migraciones);

$query_ventas = mysqli_query($conexion, "SELECT * FROM `reportes` WHERE `tipo_reportes` = 3");
$ventas = mysqli_num_rows($query_ventas);

$query_cambio = mysqli_query($conexion, "SELECT * FROM `reportes` WHERE `tipo_reportes` = 4");
$cambio = mysqli_num_rows($query_cambio);


?>