<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
    require("../conexion/conexion.php");
    $id_usuario =  $_SESSION['nombre'];

    $id = $_POST['editar_id_inventario'];
    $mac = $_POST['editar_radio_inventario'];
    $tecnico = $_POST['editar_id_instalador'];
    $fallo = $_POST['editar_fallo_inventario'];

    if($fallo == "Si"){
        $fallos = 1;
    }else if($fallo == "No"){
        $fallos = 2;
    }
    
    $sql_tecnico = mysqli_query($conexion, "SELECT * FROM `usuario` WHERE `usuario_usuario` = '$tecnico'");
    $tecnicos = mysqli_fetch_assoc($sql_tecnico);
    $nombre_tecnico = $tecnicos['id_usuario'];
    
    //Se realiza la consulta para registrar los movimientos
    $sql_consulta = mysqli_query($conexion, "SELECT * FROM `inventario` WHERE `id_inventario` = '$id'");
    $consulta = mysqli_fetch_assoc($sql_consulta);

    $mac_antes = $consulta['radio_inventario'];
    $tecnico_antes = $consulta['id_instalador'];
    $fallo_antes = $consulta['fallo_inventario'];

    if ($mac != $mac_antes) {
        $mensaje = 'Se cambio el radio, de ' . $mac_antes . ' a ' . $mac;
        //agreagar a log
        $sql_log = mysqli_query($conexion, "INSERT INTO `log`( `accion_log`, `id_usuario`)
                                        VALUES ('$mensaje' ,'$id_usuario')");
    } else if ($tecnico != $tecnico_antes) {
        $mensaje = 'Se cambio la asignacion del radio de ' . $tecnico . ' a ' . $tecnico_antes;
        //agreagar a log
        $sql_log = mysqli_query($conexion, "INSERT INTO `log`( `accion_log`, `id_usuario`)
                                        VALUES ('$mensaje' ,'$id_usuario')");
    } else if ($fallos != $fallo_antes) {
        $mensaje = 'Se cambio el status de fallo del radio de ' . $fallo . ' a ' . $fallo_antes;
        //agreagar a log
        $sql_log = mysqli_query($conexion, "INSERT INTO `log`( `accion_log`, `id_usuario`)
                                        VALUES ('$mensaje' ,'$id_usuario')");
    }

    $sql = mysqli_query($conexion, "UPDATE `inventario` SET `radio_inventario`= '$mac',`id_instalador`='$nombre_tecnico',
                    `fallo_inventario`='$fallos' WHERE `id_inventario` = '$id' ");
    header("location: ../../admin/inventario/visualizacion/ver_antenas.php");
}
