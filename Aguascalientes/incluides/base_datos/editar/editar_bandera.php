<?php
session_start();
if($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1){
                    require ("../conexion/conexion.php");

                    $id = $_POST['editar_id_inventario'];
                    $mac = $_POST['editar_bandera_inventario'];
                    $instalador = $_POST['editar_id_instalador'];
                    $fallo = $_POST['editar_fallo_inventario'];

                    //Se realiza la consulta para registrar los movimientos
                    $sql_consulta = mysqli_query($conexion,"SELECT * FROM `inventario` WHERE `id_inventario` = '$id'");
                    $consulta = mysqli_fetch_assoc($sql_consulta);

                    $mac_antes = $consulta['bandera_inventario'];
                    $tecnico_antes = $consulta['id_instalador'];
                    $fallo_antes = $consulta['fallo_inventario'];

                    if($mac != $mac_antes){
                                        $mensaje ='Se cambio la bandera, de '.$mac_antes. ' a '.$mac;
                                        //agreagar a log
                                        $sql_log = mysqli_query($conexion, "INSERT INTO `log`( `accion_log`, `nombre_usuario`)
                                        VALUES ('$mensaje' ,'$id_usuario')");
                    }else if($tecnico != $tecnico_antes){
                                        $mensaje ='Se cambio la asignacion de la bandera de '. $tecnico. ' a ' .$tecnico_antes;
                                        //agreagar a log
                                        $sql_log = mysqli_query($conexion, "INSERT INTO `log`( `accion_log`, `nombre_usuario`)
                                        VALUES ('$mensaje' ,'$id_usuario')");
                    }else if($fallo != $fallo_antes){
                                        $mensaje ='Se cambio el status de fallo de la bandera de '. $fallo. ' a ' .$fallo_antes;
                                        //agreagar a log
                                        $sql_log = mysqli_query($conexion, "INSERT INTO `log`( `accion_log`, `nombre_usuario`)
                                        VALUES ('$mensaje' ,'$id_usuario')");
                    }

                    $sql = mysqli_query($conexion,"UPDATE `inventario` SET `bandera_inventario`= '$mac',`id_instalador`='$instalador',
                    `fallo_inventario`='$fallo' WHERE `id_inventario` = '$id' ");
                    header("location: ../../admin/inventario/visualizacion/ver_bandera.php");
}
?>