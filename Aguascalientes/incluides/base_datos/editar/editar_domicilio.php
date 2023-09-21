<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
    require("../conexion/conexion.php");
    
    $nombre_usuario = $_SESSION['nombre'];
    $id_usuario = $_SESSION['id_usuario'];

    //traemos la info. de ver domicilio
    $id = $_POST['num_reporte'];

    $nreparador = $_POST['n_reparador'];
    $reporte = $_POST['reporte'];

    $sql = mysqli_query($conexion, "UPDATE `reportes` SET `mensaje_reportes` = '$reporte', `id_reparador` = '$nreparador'
    WHERE id_reportes = '$id'");


    $mensajes = 'El usuario: ' . $nombre_usuario . ' modifico el reporte con numero: ' . $id;
    $log = mysqli_query($conexion, "INSERT INTO `log`(`accion_log`, `id_usuario`, `id_cliente`) VALUES ('$mensajes,'$id_usuario','$id_cliente')");

    header("location: ../../admin/reportes/caratula/domicilio.php?id=$id");
}
?>