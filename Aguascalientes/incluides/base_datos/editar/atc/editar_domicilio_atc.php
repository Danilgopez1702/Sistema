<?php
session_start();
if ($_SESSION['rol'] == 2) {
    require("../../conexion/conexion.php");
    $id_usuario =  $_SESSION['nombre'];

    //traemos la info. de ver domicilio
    $id = $_POST['num_reporte'];

    $nreparador = $_POST['n_reparador'];
    $c_tecnico = mysqli_query($conexion,"SELECT `id_usuario` FROM `usuario` WHERE `usuario_usuario` = '$nreparador'");   
    $g_tecnico = mysqli_fetch_assoc($c_tecnico);
    $id_tecnico = $g_tecnico['id_usuario'];

    $reporte = $_POST['reporte'];

    $sql = mysqli_query($conexion,"UPDATE `reportes` SET `mensaje_reportes` = '$reporte', `id_reparador` = '$id_tecnico'
    WHERE id_reportes = '$id'");

    header("location: ../../../atc/reportes/caratula/domicilio.php?id=$id");
}
?>