<?php

$busqueda_userman = function ($userman_ip, $userman_user, $userman_pass, $mac, $API) {
    //Conexion al mk
    $API->connect($userman_ip, $userman_user, $userman_pass);
    //Ingresamos los comandos a consultar
    $API->write('/tool/user-manager/user/print', false);
    $API->write('=.proplist=.id,actual-profile', false);
    $API->write('?username=' . $mac, true);
    //Leer la respuesta del mk  
    $READ = $API->read(false);
    //Guardar la respuesta en un array
    $ARRAY = $API->parseResponse($READ);
    $x = 0;
    //Ciclo para extraer del array
    foreach ($ARRAY as $y) {
        //Se declara el contador
        $p1 = $y;
        //Extraccion de datos del array
        $id_userman = $p1['.id'];
        $user_userman = $p1['actual-profile'];
    }

    if ($p1['actual-profile'] == NULL) {
        $userman = [
            "id_userman"  =>  $id_userman,
            "user_userman"  =>  "0",
        ];
    } else {
        $userman = [
            "id_userman"  =>  $id_userman,
            "user_userman"  =>  $user_userman
        ];
    }

    $API->disconnect();
    return $userman;
};
$busqueda_general = function ($mk_ip, $mk_user, $mk_pass, $mac, $API) {
    $id_general = 0;
    //Conexion al mk
    $API->connect($mk_ip, $mk_user, $mk_pass);
    //Ingresamos los comandos a consultar
    $API->write('/ip/hotspot/host/print', false);
    $API->write('?mac-address=' . $mac);
    //Leer la respuesta del mk  
    $READ = $API->read(false);
    //Guardar la respuesta en un array
    $ARRAY = $API->parseResponse($READ);
    //Contador para array    
    $x = 0;
    //Ciclo para extraer del array
    foreach ($ARRAY as $y) {
        //Se declara el contador
        $p1 = $y;
        //Extraccion de datos del array
        $id_general = $p1['.id'];
        $mac_general = $p1['mac-address'];
    }
    $API->disconnect();
    if ($id_general == NULL) {
        $general = [
            "id_general"  =>  "0",
            "mk_ip"  =>  $mk_ip,
        ];
    } else {
        $general = [
            "id_general"  =>  $id_general,
            "mk_ip"  =>  $mk_ip,
        ];
    }


    return $general;
};
$agregar = function ($userman_ip, $userman_user, $userman_pass, $mac, $API) {

    $customer = "admin";
    $password = "D1LcO16";

    //Conexion al mk
    $API->connect($userman_ip, $userman_user, $userman_pass);
    //Comando mandado al mk
    $API->write("/tool/user-manager/user/add", false);
    $API->write("=username=" . $mac, false);
    $API->write("=password=" . $password, false);
    $API->write("=customer=" . $customer, true);
    //Leer la respuesta del mk  
    $READ = $API->read(false);
    //Guardar la respuesta en un array
    $ARRAY = $API->parseResponse($READ);
    //Se desconecta del mk
    $API->disconnect();
};
$cambio_paquete = function ($userman_ip, $userman_user, $userman_pass, $API, $perfil, $id_userman) {
    $customer = "admin";
    //Conexion al mk
    $API->connect($userman_ip, $userman_user, $userman_pass);
    //Comando mandado al mk
    $API->write("/tool/user-manager/user/create-and-activate-profile", false);
    $API->write("=customer=" . $customer, false);
    $API->write("=profile=" . $perfil, false);
    $API->write("=numbers=" . $id_userman, true);
    //Leer la respuesta del mk  
    $READ = $API->read(false);
    //Guardar la respuesta en un array
    $ARRAY = $API->parseResponse($READ);
    //Imprimir array de manera mas visual
    //Contador para array    
    $x = 0;
    $API->disconnect();
};
$deslogeo = function ($ip_general, $mk_user, $mk_pass, $mac, $API) {
    //Conexion al mk
    $API->connect($ip_general, $mk_user, $mk_pass);
    //Comando mandado al mk
    $API->write("/ip/hotspot/host/remove", false);
    $API->write("=numbers=" . $mac, true);
    //Leer la respuesta del mk  
    $READ = $API->read(false);
    //Guardar la respuesta en un array
    $ARRAY = $API->parseResponse($READ);
    $API->disconnect();
};
$eliminar = function ($userman_ip, $userman_user, $userman_pass, $numero_userman, $API) {
    //Conexion al mk
    $API->connect($userman_ip, $userman_user, $userman_pass);
    //Comando mandado al mk
    $API->write("/tool/user-manager/user/remove", false);
    $API->write("=.id=" . $numero_userman, true);
    //Leer la respuesta del mk  
    $READ = $API->read(false);
    //Guardar la respuesta en un array
    $ARRAY = $API->parseResponse($READ);
    //Imprimir array de manera mas visual
    //Se desconecta del mk
    $API->disconnect();
};
