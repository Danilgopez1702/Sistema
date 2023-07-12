<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
    require("../conexion/conexion.php");

    $id_usuario =  $_SESSION['nombre'];
    $tipo = $_POST['tipo_modal'];
    $auto = $_POST['auto_modal'];
    $num_cliente = $_POST['num_cliente_modal'];
    $hoy = date("Y-m-d");

    $consulta_manual = mysqli_query($conexion, "SELECT * FROM `pago_manual` WHERE `Autorizacion` = '$auto'");
    $cont = mysqli_num_rows($consulta_manual);


        $consulta_manual = mysqli_query($conexion, "INSERT INTO `pago_manual`(`No_cliente`, `Autorizacion`, `fecha`) 
        VALUES ('$num_cliente','$auto','$hoy')");

        $activacion_cliente = mysqli_query($conexion, "SELECT * FROM `cliente` WHERE `numero_cliente` = $num_cliente");
        $cliente = mysqli_fetch_assoc($activacion_cliente);

        if (!$cliente['radio_cliente']) {
            $mac = $cliente['router_cliente'];
        } else {
            $mac = $cliente['radio_cliente'];
        }
        
        $velocidad = $cliente['velocidad_cliente'];

        if ($velocidad == '1 MB') {
            $perfil = "1Mega";
        } else if ($velocidad == '2 MB') {
            $perfil = "2Megas";
        } else if ($velocidad == '3 MB') {
            $perfil = "3Megas";
        } else if ($velocidad == '4 MB') {
            $perfil = "4Megas";
        } else if ($velocidad == '5 MB') {
            $perfil = "5Megas";
        } else if ($velocidad == '6 MB') {
            $perfil = "6Megas";
        } else if ($velocidad == '8 MB') {
            $perfil = "8Megas";
        } else if ($velocidad == '10 MB') {
            $perfil = "10Megas";
        } else if ($velocidad == '15 MB') {
            $perfil = "15Megas";
        } else if ($velocidad == '20 MB') {
            $perfil = "20Megas";
        } else if ($velocidad == '30 MB') {
            $perfil = "30Megas";
        } else if ($velocidad == '50 MB') {
            $perfil = "50Megas";
        } else if ($velocidad == '100 MB') {
            $perfil = "100Megas";
        } else if ($velocidad == '5 MBF') {
            $perfil = "5MegasFibra";
        } else if ($velocidad == '10 MBF') {
            $perfil = "10MegasFibra";
        }

        include('../../mikrotik/manual_cambiar_paquete.php');

        $mensaje = 'Se realizo el pago manual con autorizacion ' . $auto . ' al cliente ' . $num_cliente;

        $ingresar_log = mysqli_query($conexion, "INSERT INTO `log`( `accion_log`, `id_usuario`)
        VALUES ('$mensaje' ,'$id_usuario')");
}
