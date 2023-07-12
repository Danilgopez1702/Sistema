<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
require("../conexion/conexion.php");

$id = $_POST['id'];

$sql = mysqli_query($conexion, "UPDATE `cliente` SET `por_revisar` = 1, `encuesta_cliente` = 2 WHERE `id_cliente` = '$id'");

header("location: ../../admin/clientes/consultar/contrato_revisar.php?id=$id");
}
?>