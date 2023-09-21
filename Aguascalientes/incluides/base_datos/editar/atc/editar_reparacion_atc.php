<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
    require("../conexion/conexion.php");

    $nombre_usuario = $_SESSION['nombre'];
    $id_usuario = $_SESSION['id_usuario'];

    //traemos la info. de ver domicilio
    $id = $_POST['num_reporte'];
    $status = $_POST['status'];
    $fechaasignacion = $_POST['fecha_asignacion'];
    $fechaacudir = $_POST['fecha_acudir'];
    $nreparador = $_POST['n_reparador'];
    $reporte = $_POST['reporte'];
    $problemaencontrado = $_POST['problema_encontrado'];
    $solucion = $_POST['solucion'];
    $fecharechazo = $_POST['fecha_rechazo'];
    $razonrechazo = $_POST['razon_rechazo'];
    $fechareagendado = $_POST['fecha_reagendado'];
    $fecha2visita = $_POST['fecha_2visita'];
    $segundoproblemaencontrado = $_POST['2problema_encontrado'];
    $segundasolucion = $_POST['segunda_solucion'];
    if ($status != 7) {
        $status_rep = 1;
    } else {
        $status_rep = 0;
    }

    $sql = mysqli_query($conexion, "UPDATE `reportes` SET `status_reportes`='$status_rep',
    `no_reporte_reportes`='$id',`mensaje_reportes`='$reporte'
    ,`fecha_reportes`='$fechaasignacion',`id_reparador`='$nreparador',`problema_reportes`='$problemaencontrado',
    `solucion_reportes`='$solucion',`fecha_rechazo`='$fecharechazo',`razon_rechazo`='$razonrechazo',
    `reagendacion_reportes`='$fechareagendado',`problema_rechazo`='$segundoproblemaencontrado',`solucion_rechazo`='$segundasolucion',
    `fecha_segunda_visita`='$fecha2visita',`status_revisar`='$status' WHERE no_reporte_reportes = '$id'");

    $mensajes = 'El usuario: ' . $nombre_usuario . ' modifico la reparacion con numero: ' . $id;
    $log = mysqli_query($conexion, "INSERT INTO `log`(`accion_log`, `id_usuario`, `id_cliente`) VALUES ('$mensajes,'$id_usuario','$id_cliente')");
}