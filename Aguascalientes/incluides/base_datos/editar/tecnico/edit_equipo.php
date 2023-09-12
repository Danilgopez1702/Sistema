<?php
session_start();
require("../../conexion/conexion.php");

$num_cliente = $_POST['guardar_numero'];
$id_tecnico = $_SESSION['id_usuario'];
$tipo_instalacion = $_POST['instalacion_nueva'];
$antena = $_POST['antena'];
$ip = $_POST['ip'];
$zona_onu = $_POST['zona_onu'];
$bote_onu = $_POST['bote_onu'];
$puerto_onu = $_POST['puerto_onu'];
$onu = $_POST['onu'];
$router = $_POST['router'];
$bandera_onu = $_POST['bandera_onu'];
$antena = $_POST['antena'];
$zona_ont = $_POST['zona_ont'];
$bote_ont = $_POST['bote_ont'];
$puerto_ont = $_POST['puerto_ont'];
$ont = $_POST['ont'];
$bandera_ont = $_POST['bandera_ont'];

if ($tipo_instalacion == 1) {

    $sql_subida = mysqli_query($conexion, "UPDATE `cliente` SET `ip_cliente`='$ip',`id_instalador`='$id_tecnico',`radio_cliente`='$antena' WHERE `numero_cliente` = '$num_cliente'");

    $sql_inventario = mysqli_query($conexion, "UPDATE `inventario` SET `asignado_inventario`='2',`id_cliente`='$num_cliente' WHERE `radio_inventario` = '$antena' ");

} else if ($tipo_instalacion == 2) {

    $sql_subida = mysqli_query($conexion, "UPDATE `cliente` SET `id_instalador`='$id_tecnico',`router_cliente`='$router',`onu_cliente`='$onu',
    `bandera_cliente`='$bandera_onu',`bote_cliente`='$bote_onu',`puerto_cliente`='$puerto_onu',`id_zona`='$zona_onu' WHERE `numero_cliente` = '$num_cliente'");

    $sql_inventario = mysqli_query($conexion, "UPDATE `inventario` SET `asignado_inventario`='2',`id_cliente`='$num_cliente' WHERE `onu_inventario` = '$onu' or `mac_inventario` = '$onu' ");

} else if ($tipo_instalacion == 3) {

    $sql_subida = mysqli_query($conexion, "UPDATE `cliente` SET `id_instalador`='$id_tecnico',`ont_cliente`='$ont',`bandera_cliente`='$bandera_ont',
    `bote_cliente`='$bote_ont',`puerto_cliente`='$puerto_ont',`id_zona`='$zona_ont' WHERE `numero_cliente` = '$num_cliente'");

    $sql_inventario = mysqli_query($conexion, "UPDATE `inventario` SET `asignado_inventario`='2',`id_cliente`='$num_cliente' WHERE `ont_inventario`  = '$ont' or `mac_ont_inventario` = '$ont' ");

}

var_dump($sql_subida);
?>
<meta http-equiv="refresh" content="1; url=../../../tecnicos/contrato/consultar/contrato.php">