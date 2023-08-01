<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
    require("../conexion/conexion.php");
    $id_usuario =  $_SESSION['nombre'];

    //traemos la info. de ver domicilio
    $id = $_POST['num_reporte'];

    $nreparador = $_POST['n_reparador'];
    $reporte = $_POST['reporte'];

    $sql = mysqli_query($conexion,"UPDATE `reportes` SET `mensaje_reportes` = '$reporte', `id_reparador` = '$nreparador'
    WHERE id_reportes = '$id'");

    

    header("location: ../../admin/reportes/caratula/domicilio.php?id=$id");
}
?>