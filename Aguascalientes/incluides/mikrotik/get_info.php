<?php
use PEAR2\Net\RouterOS;
require("../../../base_datos/conexion/conexion.php");
include_once("PEAR2_Net_RouterOS-1.0.0b6/src/PEAR2/Autoload.php");

$resultMk = mysqli_query($conexion, "SELECT usuario, pass, puerto FROM acceso_mk WHERE id_acceso_mk = 1");
$rowMk = mysqli_fetch_assoc($resultMk);

$sql_mk =  mysqli_query($conexion, "SELECT * FROM `cliente` WHERE `id_cliente`= '$id_cliente'");
$date = mysqli_fetch_assoc($sql_mk);
$no_antena = $date['radio_cliente'];
$no_router = $date['router_cliente'];

if(!$no_antena && !$no_router){
    
}else if(!$no_router){
    $mac = $no_antena;
    
}else{
    $mac = $no_router;
}

$mac = str_replace(":","",$mac);
$mac = wordwrap($mac , 2 , ':' , true );
$mac = strtoupper($mac);

try {
    /*******************************************************
    ******************CREAR CONEXION CON MK*****************
    ********************************************************/
    
    $client  = new RouterOS\Client('189.201.189.2', $rowMk['usuario'], $rowMk['pass'], $rowMk['puerto']);

    $printRequest = new RouterOS\Request('/tool/user-manager/user/print');
    $printRequest->setArgument('.proplist', '.id,actual-profile,username');
    $printRequest->setQuery(RouterOS\Query::where('username', $mac));
    $user_id = $client->sendSync($printRequest)->getProperty('.id');
    $user_profile = $client->sendSync($printRequest)->getProperty('actual-profile');

  $user_profile;


} catch (RouterOS\SocketException $e) {
    echo "error: Fallo la coneccion con RouterOS... " . $e;
} catch (RouterOS\DataFlowException $e) {
    echo "error: ".$e->getMessage();//Wrong username or password; probably
} catch (Exception $e) {
    echo "error: Error desconocido, comuniquese con el administrador (Esteban)" . $e; //Connection fail to MySQL; probably
} 



?>