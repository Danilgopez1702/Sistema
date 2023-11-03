<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
    require("../conexion/conexion.php");

    $nombre_usuario = $_SESSION['nombre'];
    $id_usuario = $_SESSION['id_usuario'];


    $id = $_POST['id'];

    $sql = mysqli_query($conexion, "UPDATE `reportes` SET `status_reportes` = '0' WHERE `id_reportes` = '$id' ");

    $consulta_rep = mysqli_query($conexion,"SELECT `id_reparador` FROM `reportes` WHERE `id_reportes` = '$id' ");
    $reparador = mysqli_fetch_assoc($consulta_rep);

    $consulta_tecnico = mysqli_query($conexion, "SELECT `id_reportes` FROM `reportes` WHERE `id_usuario` = '$reparador' ");
    $conteo_reparacion = mysqli_num_rows($consulta_tecnico);

    if($conteo_reparacion <= 1){
        $consulta_reparador = mysqli_query($conexion,"SELECT `usuario_usuario` FROM `usuario` WHERE `id_usuario` = '$reparador'");
        $nombre_reparador = mysqli_fetch_assoc($consulta_reparador);

        $activar_tecnico = mysqli_query($conexion,"UPDATE `usuario` SET `status_usuario`='1' WHERE `id_usuario` = '$reparador'");

        $mensajes = 'El tecnico: ' . $nombre_tecnico . ' se habilito';
        $log = mysqli_query($conexion, "INSERT INTO `log`(`accion_log`, `id_usuario`, `id_cliente`) VALUES ('$mensajes,'$id_usuario','$id_cliente')");
    }

    $mensajes2 = 'El usuario: ' . $nombre_usuario . ' cerro el reporte con id: ' . $id;
    $log2 = mysqli_query($conexion, "INSERT INTO `log`(`accion_log`, `id_usuario`, `id_cliente`) VALUES ('$mensajes,'$id_usuario','$id_cliente')");

    mysqli_close($conexion);

    header("location: ../../admin/reportes/caratula/reparaciones.php?id=" . $id . '&&tipo=' . $tipo);
}