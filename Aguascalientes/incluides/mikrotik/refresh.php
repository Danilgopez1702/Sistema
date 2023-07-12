<?php
include 'funciones.php';
require('routeros_api.class.php');
$API = new RouterosAPI();

$API->debug = true;
require("../base_datos/conexion/conexion.php");

$id = $_POST['id'];
$ip_general = 0;

$consulta_cliente = mysqli_query($conexion, "SELECT `radio_cliente`, `router_cliente` FROM `cliente` WHERE `id_cliente` = '$id'");
$mac_cliente = mysqli_fetch_assoc($consulta_cliente);

if (!$mac_cliente['radio_cliente']) {

    $mac = $mac_cliente['router_cliente'];
    $mac = str_replace(":", "", $mac);
    $mac = wordwrap($mac, 2, ':', true);
    $mac = strtoupper($mac);

} else if (!$mac_cliente['router_cliente']) {

    $mac = $mac_cliente['radio_cliente'];
    $mac = str_replace(":", "", $mac);
    $mac = wordwrap($mac, 2, ':', true);
    $mac = strtoupper($mac);

}

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

if ($ip_general == 0) { 
	echo "error2";
} else {
	echo "ok";
}