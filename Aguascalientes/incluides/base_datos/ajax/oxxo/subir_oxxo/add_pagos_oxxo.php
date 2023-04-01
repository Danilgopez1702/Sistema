<?php
session_start();
//aqui se pide la conexion a la bd
include "../../../conexion/conexion.php";
$id_usuario =  $_SESSION['nombre'];

$lugar = $_POST['lugar'];
$fecha_pago = $_POST['fecha_pago'];
$hora = $_POST['hora'];
$num_cliente = $_POST['num_cliente'];
$monto = $_POST['monto'];

$mensajes = 'Se agrego un pago ';
$sql_log = mysqli_query($conexion, "INSERT INTO `log`( `accion_log`, `nombre_usuario`, `id_cliente`) VALUES ('$mensajes','$id_usuario','$num_cliente')");

$sql_select($conexion, "SELECT `numero_cliente`,`status_cliente`, `velocidad_cliente`,`fecha_corte`,`precio_cliente`, `es_fibra`, `router_cliente`, `radio_cliente` FROM `cliente` WHERE `numero_cliente`= '$num_cliente'");

$row = mysqli_num_rows($sql_select);
if ($row > 0) {
    $dato = mysqli_fetch_assoc($sql_select);

    $status_cliente = $dato['status_cliente'];
    $velocidad = $dato['velocidad_cliente'];
    $fecha_corte = $dato['fecha_corte'];
    $precio_cliente = $dato['precio_cliente'];
    $es_fibra = $dato['es_fibra'];
    $router_cliente = $dato['router_cliente'];
    $radio_cliente = $dato['radio_cliente'];

    $precio_cliente_moroso = $precio_cliente + 50;

    if ($status_cliente == 1 || $status_cliente == 2) {

        $fecha_c_nueva =  date("Y-m-d", strtotime($fecha_corte . "+ 1 month"));
        $sql_actual = mysqli_query($conexion, "UPDATE `cliente` SET `status_cliente`= 0 ,`fecha_corte`= '$fecha_c_nueva' WHERE `num_cliente`= $num_cliente ");

        $sql_insert = mysqli_query($conexion, "INSERT INTO `pagos`( `metodo`, `lugar`, `fecha`, `hora`, `num_cliente`, `monto`) 
            VALUES ('oxxo','$lugar','$fecha_pago','$hora','$num_cliente','$monto')");

        if ($status_cliente != 0) {
            if ($es_fibra == 1) {
                $mac = $router_cliente;
            } else if ($es_fibra == 2) {
                $mac = $radio_cliente;
            } else { //esta parte es para cuando se agregue la ont
            }

            $perfil = "1Mega";

            if ($velocidad == '1 MB') {
                $perfil = "1Mega";
            } else if ($velocidad == '2 MB') {
                $perfil = "2Megas";
            } else if ($velocidad == '4 MB') {
                $perfil = "4Megas";
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
            include('../../../../mikrotik/manual_cambiar_paquete.php');
        }
    } else if ($status_cliente == 3 || $status_cliente == 5) {
        if ($precio_cliente_moroso == $monto) {

            $fecha_c_nueva =  date("Y-m-d", strtotime($fecha_corte . "+ 1 month"));
            $sql_actual = mysqli_query($conexion, "UPDATE `cliente` SET `status_cliente`= 0 ,`fecha_corte`= '$fecha_c_nueva' WHERE `num_cliente`= $num_cliente ");

            $sql_insert = mysqli_query($conexion, "INSERT INTO `pagos`( `metodo`, `lugar`, `fecha`, `hora`, `num_cliente`, `monto`) 
            VALUES ('oxxo','$lugar','$fecha_pago','$hora','$num_cliente','$monto')");

            if ($es_fibra == 1) {
                $mac = $router_cliente;
            } else if ($es_fibra == 2) {
                $mac = $radio_cliente;
            } else { //esta parte es para cuando se agregue la ont
            }

            $perfil = "1Mega";

            if ($velocidad == '1 MB') {
                $perfil = "1Mega";
            } else if ($velocidad == '2 MB') {
                $perfil = "2Megas";
            } else if ($velocidad == '4 MB') {
                $perfil = "4Megas";
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
            include('../../../../mikrotik/manual_cambiar_paquete.php');
        } else {
            $mensajes2 = 'faltaron $50 de reactivacion';
            $sql_insert = mysqli_query($conexion, "INSERT INTO `pagos`( `metodo`, `lugar`, `fecha`, `hora`, `num_cliente`, `monto`,`mensaje_pagos`) 
            VALUES ('oxxo','$lugar','$fecha_pago','$hora','$num_cliente','$monto', '$mensajes2')");
        }
    }else{
        echo "error";
    }
}
