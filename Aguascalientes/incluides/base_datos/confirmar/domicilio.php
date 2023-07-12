<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
    require("../conexion/conexion.php");
    $id_usuario =  $_SESSION['nombre'];

    //traemos la info. de ver domicilio
    $id = $_GET['id'];

    $sql = mysqli_query($conexion,"UPDATE `reportes` SET `status_reportes`  = '5', `activo_reportes` = '2'
    WHERE id_reportes = '$id'");

    header("location: ../../admin/reportes/caratula/domicilio.php?id=$id");
}
?>