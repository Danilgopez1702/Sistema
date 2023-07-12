<?php
include 'funciones.php';
require('routeros_api.class.php');
$API = new RouterosAPI();

$API->debug = true;
require("../base_datos/conexion/conexion.php");

$id = $_GET['id'];

$consulta_clientes = mysqli_query($conexion, "SELECT `radio_cliente`, `router_cliente` FROM `cliente` WHERE `id_cliente` = '$id'");
$mac_clientes = mysqli_fetch_assoc($consulta_clientes);

if (!$mac_clientes['radio_cliente']) {

    $mac = $mac_clientes['router_cliente'];
    $mac = str_replace(":", "", $mac);
    $mac = wordwrap($mac, 2, ':', true);
    $mac = strtoupper($mac);
} else if (!$mac_clientes['router_cliente']) {

    $mac = $mac_clientes['radio_cliente'];
    $mac = str_replace(":", "", $mac);
    $mac = wordwrap($mac, 2, ':', true);
    $mac = strtoupper($mac);
}

$mac_vieja = $mac;
$userman_user = 'SYSADMIN';
$userman_pass = ',xa^)w3V5jrk!h&L';
$userman_ip = '10.255.255.0';

$buscar_user = $busqueda_userman($userman_ip, $userman_user, $userman_pass, $mac, $API);
$numero_userman = $buscar_user['id_userman'];
$eliminacion = $eliminar($userman_ip, $userman_user, $userman_pass, $numero_userman, $API);