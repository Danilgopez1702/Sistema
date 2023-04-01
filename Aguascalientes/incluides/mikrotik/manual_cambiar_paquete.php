<?php
use PEAR2\Net\RouterOS;

include_once("PEAR2_Net_RouterOS-1.0.0b6/src/PEAR2/Autoload.php");

$resultMk = mysqli_query($conexion, "SELECT usuario, pass, puerto FROM acceso_mk WHERE id_acceso_mk = 1");
$rowMk = mysqli_fetch_assoc($resultMk);

$mac = str_replace(":","",$mac);
$mac = wordwrap($mac , 2 , ':' , true );
$mac = strtoupper($mac);

try {
    
    $client = new RouterOS\Client('189.201.189.2', $rowMk['usuario'], $rowMk['pass'], $rowMk['puerto']);
    $client2 = new RouterOS\Client('189.201.189.3', $rowMk['usuario'], $rowMk['pass'], $rowMk['puerto']);
    $client3 = new RouterOS\Client('189.201.187.2', $rowMk['usuario'], $rowMk['pass'], $rowMk['puerto']);
    $client4 = new RouterOS\Client('189.201.187.3', $rowMk['usuario'], $rowMk['pass'], $rowMk['puerto']);
    $client5 = new RouterOS\Client('189.201.189.7', $rowMk['usuario'], $rowMk['pass'], $rowMk['puerto']);
    $client6 = new RouterOS\Client('189.201.188.2', $rowMk['usuario'], $rowMk['pass'], $rowMk['puerto']);
    $client7 = new RouterOS\Client('189.201.189.8', $rowMk['usuario'], $rowMk['pass'], $rowMk['puerto']);
    $client8 = new RouterOS\Client('189.201.189.9', $rowMk['usuario'], $rowMk['pass'], $rowMk['puerto']);
    $client9 = new RouterOS\Client('189.201.187.5', $rowMk['usuario'], $rowMk['pass'], $rowMk['puerto']);
    $client10 = new RouterOS\Client('189.201.187.6', $rowMk['usuario'], $rowMk['pass'], $rowMk['puerto']);
    $client11 = new RouterOS\Client('189.201.187.6', $rowMk['usuario'], $rowMk['pass'], $rowMk['puerto']);
    $client12 = new RouterOS\Client('189.201.187.3', $rowMk['usuario'], $rowMk['pass'], $rowMk['puerto']);
    $client13 = new RouterOS\Client('189.201.187.8', $rowMk['usuario'], $rowMk['pass'], $rowMk['puerto']);
    $client14 = new RouterOS\Client('189.201.189.5', $rowMk['usuario'], $rowMk['pass'], $rowMk['puerto']);

    /*******************************************************
    ******************Obtenemos ID del user*****************
    ********************************************************/

    $printRequest = new RouterOS\Request('/tool/user-manager/user/print');
    $printRequest->setArgument('.proplist', '.id');
    $printRequest->setQuery(RouterOS\Query::where('username', $mac));
    $id = $client->sendSync($printRequest)->getProperty('.id');

    $printRequest = new RouterOS\Request('/tool/user-manager/user/print');
    $printRequest->setArgument('.proplist', '.id');
    $printRequest->setQuery(RouterOS\Query::where('username', $mac));
    $id2 = $client2->sendSync($printRequest)->getProperty('.id');

    $printRequest = new RouterOS\Request('/tool/user-manager/user/print');
    $printRequest->setArgument('.proplist', '.id');
    $printRequest->setQuery(RouterOS\Query::where('username', $mac));
    $id3 = $client3->sendSync($printRequest)->getProperty('.id');

    $printRequest = new RouterOS\Request('/tool/user-manager/user/print');
    $printRequest->setArgument('.proplist', '.id');
    $printRequest->setQuery(RouterOS\Query::where('username', $mac));
    $id4 = $client4->sendSync($printRequest)->getProperty('.id');

    $printRequest = new RouterOS\Request('/tool/user-manager/user/print');
    $printRequest->setArgument('.proplist', '.id');
    $printRequest->setQuery(RouterOS\Query::where('username', $mac));
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
    
    
    //$id now contains the ID of the entry we're targeting

    if (empty($id)) { //QUICK FIX: si no existe el usuario en Mikrotik (debería), creamos usuario

        /*******************************************************
        ********************Agregando cliente*******************
        ********************************************************/
        
        $activateRequest = new RouterOS\Request('/tool user-manager user add');
        $activateRequest
            ->setArgument('username', $mac)
            ->setArgument('password', 'D1LcO16')
            ->setArgument('customer', 'admin');
        $client->sendSync($activateRequest);

        /*******************************************************
        ******************Obtenemos ID del user*****************
        ********************************************************/
        $printRequest = new RouterOS\Request('/tool/user-manager/user/print');
        $printRequest->setArgument('.proplist', '.id');
        $printRequest->setQuery(RouterOS\Query::where('username', $mac));
        $id = $client->sendSync($printRequest)->getProperty('.id');
        
    }

    /*******************************************************
    *****Cambiamos el perfil del cliente en user-manager****
    ********************************************************/
    $activateRequest = new RouterOS\Request('/tool/user-manager/user/create-and-activate-profile');
    $activateRequest
        ->setArgument('customer', 'admin')
        ->setArgument('profile', $perfil)
        ->setArgument('numbers', $id);
    $client->sendSync($activateRequest);
    

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

} catch (RouterOS\SocketException $e) {
    echo 'Falló la conección con RouterOS... ' . $e;
} catch (RouterOS\DataFlowException $e) {
    echo $e->getMessage();//Wrong username or password; probably
} catch (Exception $e) {
    echo '<strong>Error desconocido, comuníquese con el administrador ()...</strong><br><br> ' . $e; //Connection fail to MySQL; probably
} 
?>