<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
    require("../conexion/conexion.php");

    $nombre_usuario = $_SESSION['nombre'];
    $id_usuario = $_SESSION['id_usuario'];

    //traemos la info. del modal
    $id = $_POST['editar_id_usuario'];
    $nombre = $_POST['editar_usuario'];
    $pass = $_POST['editar_pass'];
    $cadena_cifrada = md5($pass);
    $rol = $_POST['editar_tipo'];
    $status = $_POST['editar_status'];

    if ($rol == "Super Usuario") {
        $roles = 3132;
    } else if ($rol == "Administrador") {
        $roles = 1;
    } else if ($rol == "Atencion a Clientes") {
        $roles = 2;
    } else if ($rol == "Cobranza") {
        $roles = 3;
    } else if ($rol == "Tecnicos") {
        $roles = 4;
    }

    if ($status == "Activo") {
        $estatus = 1;
    } else if ($status == "Tecnico Deshabilitado") {
        $estatus = 3;
    } else if ($status == "Inactivo") {
        $estatus = 2;
    }

    //Se realiza la consulta para registrar los movimientos
    $sql_consulta = mysqli_query($conexion, "SELECT * FROM `usuario` WHERE `id_usuario` = '$id'");
    $consulta = mysqli_fetch_assoc($sql_consulta);

    $nombre_antes = $consulta['usuario_usuario'];
    $pass_antes = $consulta['pass_usuario'];
    $rol_antes = $consulta['status_usuario'];
    $status_antes = $consulta['tipo_usuario'];

    if ($nombre != $nombre_antes) {
        $mensaje = 'Se cambio el nombre del usuario, de ' . $nombre_antes . ' a ' . $nombre;
        //agreagar a log
        $sql_log = mysqli_query($conexion, "INSERT INTO `log`( `accion_log`, `id_usuario`)
                                        VALUES ('$mensaje' ,'$id_usuario')");
    } else if ($pass != $pass_antes) {
        $mensaje = 'Se cambio la contraseña del usuario ' . $nombre;
        //agreagar a log
        $sql_log = mysqli_query($conexion, "INSERT INTO `log`( `accion_log`, `id_usuario`)
                                        VALUES ('$mensaje' ,'$id_usuario')");
    } else if ($rol != $rol_antes) {
        $mensaje = 'Se cambio el rol del usuario ' . $nombre . 'de ' . $rol . ' a ' . $rol_antes;
        //agreagar a log
        $sql_log = mysqli_query($conexion, "INSERT INTO `log`( `accion_log`, `id_usuario`)
                                        VALUES ('$mensaje' ,'$id_usuario')");
    } else if ($status != $status_antes) {
        $mensaje = 'Se cambio el status del usuario ' . $nombre . 'de ' . $status . ' a ' . $status_antes;
        //agreagar a log
        $sql_log = mysqli_query($conexion, "INSERT INTO `log`( `accion_log`, `id_usuario`)
                                        VALUES ('$mensaje' ,'$id_usuario')");
    }

    //Se Realiza la Actualizacion
    $sql = mysqli_query($conexion, "UPDATE `usuario` SET `tipo_usuario`= '$roles',`usuario_usuario`= '$nombre',
                    `md5`= '$cadena_cifrada',`pass_usuario`= '$pass',`status_usuario`= '$estatus',`zona_usuario`= 1 WHERE `id_usuario` = '$id' ");


    $mensajes = 'El usuario: ' . $nombre_usuario . ' edito el usuario: ' . $nombre;
    $log = mysqli_query($conexion, "INSERT INTO `log`(`accion_log`, `id_usuario`, `id_cliente`) VALUES ('$mensajes,'$id_usuario','$id_cliente')");

    header("location: ../../admin/usuarios/previsualizar_usuarios/usuarios.php");
}
?>