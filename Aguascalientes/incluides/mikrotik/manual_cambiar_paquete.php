<?php
$mac = str_replace(":", "", $mac);
$mac = wordwrap($mac, 2, ':', true);
$mac = strtoupper($mac);
include 'funciones.php';
require('routeros_api.class.php');
$API = new RouterosAPI();

$API->debug = true;
require("../../base_datos/conexion/conexion.php");

$consulta_userman = mysqli_query($conexion, "SELECT * FROM `mk` WHERE `nombre_mk` = 'DigitalNet 1'");
$userman = mysqli_fetch_array($consulta_userman);

$userman_ip = '189.201.189.2';
$userman_user = 'SYSADMIN';
$userman_pass = ',xa^)w3V5jrk!h&L';

//Checamos si existe la mac en userman
$funcion_userman = $busqueda_userman($userman_ip, $userman_user, $userman_pass, $mac, $API);

//Guardamos el id del cliente
$id_userman = $funcion_userman['id_userman'];

//Cambiamos el paquete
$paquete_userman = $cambio_paquete($userman_ip, $userman_user, $userman_pass, $API, $perfil, $id_userman);

//Consultamos los mk para ver en donde se encuentra (hotspot)
$consulta_mk = mysqli_query($conexion, "SELECT * FROM `mk` WHERE `nombre_mk` != 'DigitalNet 1'");
$conteo_mk = mysqli_num_rows($consulta_mk);
if($conteo_mk > 0){
    while($mk = mysqli_fetch_array($consulta_mk)){

        $mk_ip = $mk['ip_mk'];
        $mk_user = 'SYSADMIN';
        $mk_pass = ',xa^)w3V5jrk!h&L';

        //Checamos si existe la mac en el mk
        $funcion_mk = $busqueda_general($mk_ip, $mk_user, $mk_pass, $mac, $API);

        // Verificar una condición para detener el bucle
        if (!$funcion_mk['id_general']) {
        }else{
            $ip_general = $funcion_mk['mk_ip'];
            break; // Detener el bucle cuando se cumpla la condición
        }
    }
}

        //deslogueamos
        $deslogear = $deslogeo($ip_general, $mk_user, $mk_pass, $mac, $API);

        $update = mysqli_query($conexion,"UPDATE `cliente` SET `velocidad_cliente`='$user_profile' WHERE `id_cliente` = '$id_cliente'");
