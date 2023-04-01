<?php
use PEAR2\Net\RouterOS;
include_once("PEAR2_Net_RouterOS-1.0.0b6/src/PEAR2/Autoload.php");
require_once "../base_datos/conexion/conexion.php";

$id = $_POST['id'];
$resultMk = mysqli_query($conexion, "SELECT usuario, pass, nombre FROM usuarios WHERE idUsuarios = 83");
$rowMk = mysqli_fetch_assoc($resultMk);

$sql =  mysqli_query($conexion,"SELECT * FROM `clientes` WHERE `idClientes`= $id");
$date = mysqli_fetch_assoc($sql);
$no_antena = $date['num_equipo'];
$no_router = $date['NumRouter'];

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
    
    $client2  = new RouterOS\Client('189.201.189.3', $rowMk['usuario'], $rowMk['pass'], $rowMk['nombre']);
    $client3  = new RouterOS\Client('189.201.187.2', $rowMk['usuario'], $rowMk['pass'], $rowMk['nombre']);
    $client4  = new RouterOS\Client('189.201.187.3', $rowMk['usuario'], $rowMk['pass'], $rowMk['nombre']);
    $client5  = new RouterOS\Client('189.201.189.7', $rowMk['usuario'], $rowMk['pass'], $rowMk['nombre']);
    $client6  = new RouterOS\Client('189.201.188.2', $rowMk['usuario'], $rowMk['pass'], $rowMk['nombre']);
    $client7  = new RouterOS\Client('189.201.189.8', $rowMk['usuario'], $rowMk['pass'], $rowMk['nombre']);
    $client8  = new RouterOS\Client('189.201.189.9', $rowMk['usuario'], $rowMk['pass'], $rowMk['nombre']);
    $client9  = new RouterOS\Client('189.201.187.5', $rowMk['usuario'], $rowMk['pass'], $rowMk['nombre']);
    $client10 = new RouterOS\Client('189.201.187.6', $rowMk['usuario'], $rowMk['pass'], $rowMk['nombre']);
    $client11 = new RouterOS\Client('189.201.187.6', $rowMk['usuario'], $rowMk['pass'], $rowMk['nombre']);
    $client12 = new RouterOS\Client('189.201.187.3', $rowMk['usuario'], $rowMk['pass'], $rowMk['nombre']);
    $client13 = new RouterOS\Client('189.201.187.8', $rowMk['usuario'], $rowMk['pass'], $rowMk['nombre']);
    $client14 = new RouterOS\Client('189.201.189.5', $rowMk['usuario'], $rowMk['pass'], $rowMk['nombre']);

    /*******************************************************
    ******************Obtenemos ID del host*****************
    ********************************************************/

    $printRequest = new RouterOS\Request('/ip/hotspot/host/print');
    $printRequest->setArgument('.proplist', '.id');
    $printRequest->setQuery(RouterOS\Query::where('mac-address', $mac));
    $id2 = $client2->sendSync($printRequest)->getProperty('.id');

    $printRequest = new RouterOS\Request('/ip/hotspot/host/print');
    $printRequest->setArgument('.proplist', '.id');
    $printRequest->setQuery(RouterOS\Query::where('mac-address', $mac));
    $id3 = $client3->sendSync($printRequest)->getProperty('.id');

    $printRequest = new RouterOS\Request('/ip/hotspot/host/print');
    $printRequest->setArgument('.proplist', '.id');
    $printRequest->setQuery(RouterOS\Query::where('mac-address', $mac));
    $id4 = $client4->sendSync($printRequest)->getProperty('.id');

    $printRequest = new RouterOS\Request('/ip/hotspot/host/print');
    $printRequest->setArgument('.proplist', '.id');
    $printRequest->setQuery(RouterOS\Query::where('mac-address', $mac));
    $id5 = $client5->sendSync($printRequest)->getProperty('.id');
    
    $printRequest = new RouterOS\Request('/ip/hotspot/host/print');
    $printRequest->setArgument('.proplist', '.id');
    $printRequest->setQuery(RouterOS\Query::where('mac-address', $mac));
    $id6 = $client6->sendSync($printRequest)->getProperty('.id');
    
    $printRequest = new RouterOS\Request('/ip/hotspot/host/print');
    $printRequest->setArgument('.proplist', '.id');
    $printRequest->setQuery(RouterOS\Query::where('mac-address', $mac));
    $id7 = $client7->sendSync($printRequest)->getProperty('.id');
    
    $printRequest = new RouterOS\Request('/ip/hotspot/host/print');
    $printRequest->setArgument('.proplist', '.id');
    $printRequest->setQuery(RouterOS\Query::where('mac-address', $mac));
    $id8 = $client8->sendSync($printRequest)->getProperty('.id');
    
    $printRequest = new RouterOS\Request('/ip/hotspot/host/print');
    $printRequest->setArgument('.proplist', '.id');
    $printRequest->setQuery(RouterOS\Query::where('mac-address', $mac));
    $id9 = $client9->sendSync($printRequest)->getProperty('.id');
    
    $printRequest = new RouterOS\Request('/ip/hotspot/host/print');
    $printRequest->setArgument('.proplist', '.id');
    $printRequest->setQuery(RouterOS\Query::where('mac-address', $mac));
    $id10 = $client10->sendSync($printRequest)->getProperty('.id');
    
    $printRequest = new RouterOS\Request('/ip/hotspot/host/print');
    $printRequest->setArgument('.proplist', '.id');
    $printRequest->setQuery(RouterOS\Query::where('mac-address', $mac));
    $id11 = $client11->sendSync($printRequest)->getProperty('.id');
    
    $printRequest = new RouterOS\Request('/ip/hotspot/host/print');
    $printRequest->setArgument('.proplist', '.id');
    $printRequest->setQuery(RouterOS\Query::where('mac-address', $mac));
    $id12 = $client12->sendSync($printRequest)->getProperty('.id');
    
    $printRequest = new RouterOS\Request('/ip/hotspot/host/print');
    $printRequest->setArgument('.proplist', '.id');
    $printRequest->setQuery(RouterOS\Query::where('mac-address', $mac));
    $id13 = $client13->sendSync($printRequest)->getProperty('.id');
    
    $printRequest = new RouterOS\Request('/ip/hotspot/host/print');
    $printRequest->setArgument('.proplist', '.id');
    $printRequest->setQuery(RouterOS\Query::where('mac-address', $mac));
    $id14 = $client14->sendSync($printRequest)->getProperty('.id');
    
    /*******************************************************
    ************SI NO SE ENCONTRO EN NINGUN MK**************
    ********************************************************/
    if (empty($id2) && empty($id3) && empty($id4) && empty($id5) && empty($id6) && empty($id7) && empty($id8) && empty($id9) && empty($id10) && empty($id11) && empty($id12) && empty($id13) && empty($id14) ) {
        echo "problema:  no se encontro equipo......";
    }else{
    
    /**************************************************************
    Desconectamos al usuario para que se active con el nuevo perfil
    ***************************************************************/


    $removeRequest2 = new RouterOS\Request('/ip/hotspot/host/remove');
    $removeRequest2->setArgument('numbers', $id2);
    $client2->sendSync($removeRequest2);

    $removeRequest3 = new RouterOS\Request('/ip/hotspot/host/remove');
    $removeRequest3->setArgument('numbers', $id3);
    $client3->sendSync($removeRequest3);

    $removeRequest4 = new RouterOS\Request('/ip/hotspot/host/remove');
    $removeRequest4->setArgument('numbers', $id4);
    $client4->sendSync($removeRequest4);

    $removeRequest5 = new RouterOS\Request('/ip/hotspot/host/remove');
    $removeRequest5->setArgument('numbers', $id5);
    $client5->sendSync($removeRequest5);
    
    $removeRequest6 = new RouterOS\Request('/ip/hotspot/host/remove');
    $removeRequest6->setArgument('numbers', $id6);
    $client6->sendSync($removeRequest6);
    
    $removeRequest7 = new RouterOS\Request('/ip/hotspot/host/remove');
    $removeRequest7->setArgument('numbers', $id7);
    $client7->sendSync($removeRequest7);
    
    $removeRequest8 = new RouterOS\Request('/ip/hotspot/host/remove');
    $removeRequest8->setArgument('numbers', $id8);
    $client8->sendSync($removeRequest8);
    
    $removeRequest9 = new RouterOS\Request('/ip/hotspot/host/remove');
    $removeRequest9->setArgument('numbers', $id9);
    $client9->sendSync($removeRequest9);
    
    $removeRequest10 = new RouterOS\Request('/ip/hotspot/host/remove');
    $removeRequest10->setArgument('numbers', $id10);
    $client10->sendSync($removeRequest10);
    
    $removeRequest11 = new RouterOS\Request('/ip/hotspot/host/remove');
    $removeRequest11->setArgument('numbers', $id11);
    $client11->sendSync($removeRequest11);
    
    $removeRequest12 = new RouterOS\Request('/ip/hotspot/host/remove');
    $removeRequest12->setArgument('numbers', $id12);
    $client12->sendSync($removeRequest12);
    
    $removeRequest13 = new RouterOS\Request('/ip/hotspot/host/remove');
    $removeRequest13->setArgument('numbers', $id13);
    $client13->sendSync($removeRequest13);
    
    $removeRequest14 = new RouterOS\Request('/ip/hotspot/host/remove');
    $removeRequest14->setArgument('numbers', $id14);
    $client14->sendSync($removeRequest14);
    
    echo " LISTO ...";
}
} catch (RouterOS\SocketException $e) {
    echo "error: Fallo la coneccion con RouterOS... " . $e;
} catch (RouterOS\DataFlowException $e) {
    echo "error: ".$e->getMessage();//Wrong username or password; probably
} catch (Exception $e) {
    echo "error: Error desconocido, comuniquese con el administrador (Esteban)" . $e; //Connection fail to MySQL; probably
} 
?>