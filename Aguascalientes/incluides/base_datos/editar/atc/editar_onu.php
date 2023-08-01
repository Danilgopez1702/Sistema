<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
    require("../conexion/conexion.php");
    $id_usuario =  $_SESSION['nombre'];

    //traemos la info. del modal
    $id = $_POST['editar_id_inventario'];
    $mac = $_POST['editar_mac_inventario'];
    $onu = $_POST['editar_onu_inventario'];
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

    $onu_antes = $consulta['onu_inventario'];
    $mac_antes = $consulta['mac_inventario'];
    $tecnico_antes = $consulta['id_instalador'];
    $fallo_antes = $consulta['fallo_inventario'];

    if ($mac != $mac_antes) {
        $mensaje = 'Se cambio la mac del equipo, de ' . $mac_antes . ' a ' . $mac;
        //agreagar a log
        $sql_log = mysqli_query($conexion, "INSERT INTO `log`( `accion_log`, `id_usuario`)
                                        VALUES ('$mensaje' ,'$id_usuario')");
    } else if ($onu != $onu_antes) {
        $mensaje = 'Se cambio la onu del del equipo, de ' . $onu_antes . ' a ' . $onu;
        //agreagar a log
        $sql_log = mysqli_query($conexion, "INSERT INTO `log`( `accion_log`, `id_usuario`)
                                        VALUES ('$mensaje' ,'$id_usuario')");
    }else if ($mac != $mac_antes) {
        $mensaje = 'Se cambio la onu del del equipo, de ' . $mac_antes . ' a ' . $mac;
        //agreagar a log
        $sql_log = mysqli_query($conexion, "INSERT INTO `log`( `accion_log`, `id_usuario`)
                                        VALUES ('$mensaje' ,'$id_usuario')");
    } else if ($tecnico != $tecnico_antes) {
        $mensaje = 'Se cambio la asignacion del equipo de ' . $tecnico . ' a ' . $tecnico_antes;
        //agreagar a log
        $sql_log = mysqli_query($conexion, "INSERT INTO `log`( `accion_log`, `id_usuario`)
                                        VALUES ('$mensaje' ,'$id_usuario')");
    } else if ($fallo != $fallo_antes) {
        $mensaje = 'Se cambio el status de fallo del equipo de ' . $fallo . ' a ' . $fallo_antes;
        //agreagar a log
        $sql_log = mysqli_query($conexion, "INSERT INTO `log`( `accion_log`, `id_usuario`)
                                        VALUES ('$mensaje' ,'$id_usuario')");
    }
    $sql_tecnico = mysqli_query($conexion, "SELECT * FROM `usuario` WHERE `usuario_usuario` = '$tecnico'");
    $tecnicos = mysqli_fetch_assoc($sql_tecnico);
    $nombre_tecnico = $tecnicos['id_usuario'];

    $sql = mysqli_query($conexion, "UPDATE `inventario` SET `mac_inventario`= '$mac',`onu_inventario`= '$onu',`id_instalador`='$nombre_tecnico',
                    `fallo_inventario`='$fallos' WHERE `id_inventario` = '$id' ");
    header("location: ../../admin/inventario/visualizacion/ver_onu.php");
}
