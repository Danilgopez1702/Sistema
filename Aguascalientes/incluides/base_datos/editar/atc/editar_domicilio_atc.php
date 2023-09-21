<?php
session_start();
if ($_SESSION['rol'] == 2) {
    require("../../conexion/conexion.php");

    $nombre_usuario = $_SESSION['nombre'];
    $id_usuario = $_SESSION['id_usuario'];

    //traemos la info. de ver domicilio
    $id = $_POST['num_reporte'];

    $nreparador = $_POST['n_reparador'];
    $c_tecnico = mysqli_query($conexion, "SELECT `id_usuario` FROM `usuario` WHERE `usuario_usuario` = '$nreparador'");
    $g_tecnico = mysqli_fetch_assoc($c_tecnico);
    $id_tecnico = $g_tecnico['id_usuario'];

    $reporte = $_POST['reporte'];

    $sql = mysqli_query($conexion, "UPDATE `reportes` SET `mensaje_reportes` = '$reporte', `id_reparador` = '$id_tecnico'
    WHERE id_reportes = '$id'");


    $mensajes = 'El usuario: ' . $nombre_usuario . ' modifico el reporte con numero: ' . $id;
    $log = mysqli_query($conexion, "INSERT INTO `log`(`accion_log`, `id_usuario`, `id_cliente`) VALUES ('$mensajes,'$id_usuario','$id_cliente')");

    header("location: ../../../atc/reportes/caratula/domicilio.php?id=$id");
}
?>