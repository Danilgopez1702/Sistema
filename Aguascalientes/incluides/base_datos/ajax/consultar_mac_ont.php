<?php
include('../conexion/conexion.php');

$ont = $_POST['ont'];

$query = mysqli_query($conexion, "SELECT  `mac_ont_inventario` FROM `inventario` WHERE `mac_ont_inventario` = '$ont' or `ont_inventario`= '$ont'");
$consultas = mysqli_fetch_assoc($query);
$mac = $consultas['mac_ont_inventario'];
echo $mac;
?>