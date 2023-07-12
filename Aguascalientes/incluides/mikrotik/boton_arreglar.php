<?php
include 'funciones.php';
require('routeros_api.class.php');
$API = new RouterosAPI();

$API->debug = true;
require("../base_datos/conexion/conexion.php");

$id = $_POST['id'];

$consulta_clientes = mysqli_query($conexion, "SELECT `radio_cliente`, `router_cliente`, `velocidad_cliente` FROM `cliente` WHERE `id_cliente` = '$id'");
$mac_clientes = mysqli_fetch_assoc($consulta_clientes);

if (!$mac_clientes['radio_cliente']) {

    $mac = $mac_clientes['router_cliente'];
} else if (!$mac_clientes['router_cliente']) {

    $mac = $mac_clientes['radio_cliente'];
}
$mac = str_replace(":", "", $mac);
$mac = wordwrap($mac, 2, ':', true);
$mac = strtoupper($mac);

$velocidad = $mac_clientes['velocidad_cliente'];
$userman_user = 'SYSADMIN';
$userman_pass = ',xa^)w3V5jrk!h&L';
$userman_ip = '10.255.255.0';

if ($velocidad == '2MB') {
    $perfil = "2Megas";
} else if ($velocidad == '2 MB') {
    $perfil = "2Megas";
} else if ($velocidad == '4MB') {
    $perfil = "4Megas";
} else if ($velocidad == '4 MB') {
    $perfil = "4Megas";
} else if ($velocidad == '5MB') {
    $perfil = "5Megas";
} else if ($velocidad == '5 MB') {
    $perfil = "5Megas";
} else if ($velocidad == '6MB') {
    $perfil = "6Megas";
} else if ($velocidad == '6 MB') {
    $perfil = "6Megas";
} else if ($velocidad == '8MB') {
    $perfil = "8Megas";
} else if ($velocidad == '8 MB') {
    $perfil = "8Megas";
} else if ($velocidad == '10MB') {
    $perfil = "10Megas";
} else if ($velocidad == '10 MB') {
    $perfil = "10Megas";
} else if ($velocidad == '15MB') {
    $perfil = "15Megas";
} else if ($velocidad == '15 MB') {
    $perfil = "15Megas";
} else if ($velocidad == '20MBF') {
    $perfil = "20Megas";
} else if ($velocidad == '20MB') {
    $perfil = "20Megas";
} else if ($velocidad == '30MBF') {
    $perfil = "30Megas";
} else if ($velocidad == '30MB') {
    $perfil = "30Megas";
} else if ($velocidad == '50MBF') {
    $perfil = "50Megas";
} else if ($velocidad == '50MB') {
    $perfil = "50Megas";
} else if ($velocidad == '100MBF') {
    $perfil = "100Megas";
} else if ($velocidad == '100MB') {
    $perfil = "100Megas";
} else if ($velocidad == '5MBF') {
    $perfil = "5MegasFibra";
} else if ($velocidad == '10MBF') {
    $perfil = "10MegasFibra";
}
$buscar_user = $busqueda_userman($userman_ip, $userman_user, $userman_pass, $mac, $API);
$numero_userman = $buscar_user['id_userman'];
$eliminacion = $eliminar($userman_ip, $userman_user, $userman_pass, $numero_userman, $API);
$crear = $agregar($userman_ip, $userman_user, $userman_pass, $mac, $API);
$buscar_user = $busqueda_userman($userman_ip, $userman_user, $userman_pass, $mac, $API);
$id_userman = $buscar_user['id_userman'];
$paquete = $cambio_paquete($userman_ip, $userman_user, $userman_pass, $API, $perfil, $id_userman);

//Consultamos los mk para ver en donde se encuentra (hotspot)
$consulta_mk = mysqli_query($conexion, "SELECT * FROM `mk` WHERE `nombre_mk` != 'DigitalNet 1'");
$conteo_mk = mysqli_num_rows($consulta_mk);
if ($conteo_mk > 0) {
    while ($mk = mysqli_fetch_array($consulta_mk)) {

        $mk_ip = $mk['ip_mk'];
        $mk_user = 'SYSADMIN';
        $mk_pass = ',xa^)w3V5jrk!h&L';

        //Checamos si existe la mac en el mk
        $funcion_mk = $busqueda_general($mk_ip, $mk_user, $mk_pass, $mac, $API);

        // Verificar una condición para detener el bucle
        if ($funcion_mk['id_general'] == 0) {
        } else {
            $ip_general = $funcion_mk['mk_ip'];
            break; // Detener el bucle cuando se cumpla la condición
        }
    }
}
//deslogueamos
$deslogear = $deslogeo($ip_general, $mk_user, $mk_pass, $mac, $API);
$deslogear = $deslogeo($ip_general, $mk_user, $mk_pass, $mac, $API);

if ($ip_general == 0) {
    echo "error2";
} else {
    echo "ok";
}
