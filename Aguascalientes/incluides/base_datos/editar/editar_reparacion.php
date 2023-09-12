<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
    require("../conexion/conexion.php");
    $id_usuario = $_SESSION['nombre'];

    //traemos la info. de ver domicilio
    $id = $_POST['num_reporte'];
    $tipo = $_POST['tipos'];
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
    $fecha2visita = $_POST['fecha_reagendado'];
    $segundoproblemaencontrado = $_POST['problema_encontrado_2'];
    $segundasolucion = $_POST['segunda_solucion'];
    if ($status != 7) {
        $status_rep = 1;
    } else {
        $status_rep = 0;
    }

    $sql = mysqli_query($conexion, "UPDATE `reportes` SET  `mensaje_reportes`= '$reporte',
    `fecha_reportes`= '$fechaacudir', `fecha_creacion`= '$fechaasignacion', `problema_reportes`='$reporte',
    `solucion_reportes`= '$solucion',`fecha_rechazo`= '$fecharechazo', `razon_rechazo`= '$razonrechazo',
    `problema_rechazo`= '$segundoproblemaencontrado', `solucion_rechazo`= '$segundasolucion', 
    `fecha_segunda_visita`= '$fecha2visita' WHERE `id_reportes` = '$id'");

    var_dump($tipo);

    header("location: ../../admin/reportes/caratula/revision.php?id=$id&&tipo=$tipo");
}