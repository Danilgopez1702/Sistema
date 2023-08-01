<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
require("../conexion/conexion.php");

$id = $_POST['id'];
$razon = $_POST['razon'];

$sql = mysqli_query($conexion, "UPDATE `cliente` SET `razon_revisar` = '$razon' WHERE `id_cliente` = '$id'");

header("location: ../../admin/clientes/consultar/contrato_revisar.php?id=$id");
}
?>