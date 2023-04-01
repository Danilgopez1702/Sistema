<?php

require_once "../base_datos/conexion/conexion.php";

$resultMk = mysqli_query($conexion, "SELECT usuario, pass, nombre FROM usuarios WHERE idUsuarios = 83");
$rowMk = mysqli_fetch_assoc($resultMk);

if ($row["status"] != '0') {
    /*******************************************************************
    *********** DETERMINAMOS PRÓXIMA FECHA DE CORTE*********************
    *******************************************************************/
    $time = strtotime($row['fecha_ultimo_corte']);
    $fecha_corte_format = date("Y-m-d", strtotime("+1 month", $time));

    /******************************************************************
    *********** ACTUALIZAMOS FECHA DE CORTE Y STATUS 0*****************
    ******************************************************************/
    $sql_update_status = mysqli_query($conexion,"UPDATE clientes SET status = 0, fecha_ultimo_corte = '$fecha_corte_format' WHERE num_cliente = '$num_cliente'");
    $query = mysqli_query($conexion, "INSERT INTO log (accion) VALUES ('OXXO cambiar a Activo | Num:$num_cliente')");

    /******************************************************************
    *********** CAMBIAMOS PERFIL MIKROTIK******************************
    ******************************************************************/
    if(!$no_antena && !$no_router){     
    }else if(!$no_router){
        $mac = $no_antena;
    }else{
        $mac = $no_router;
    } 
    
    $mac = str_replace(":","",$mac);
    $mac = wordwrap($mac , 2 , ':' , true );
    $mac = strtoupper($mac);
 
    $perfil = "1Mega";

    if ($velocidad == '1 MB'){
        $perfil = "1Mega";
    } else if ($velocidad == '2 MB'){
        $perfil = "2Megas";
    } else if ($velocidad == '4 MB'){
        $perfil = "4Megas";
    } else if ($velocidad == '6 MB'){
        $perfil = "6Megas";
    } else if ($velocidad == '8 MB'){
        $perfil = "8Megas";
    } else if ($velocidad == '10 MB'){
        $perfil = "10Megas";
    } else if ($velocidad == '15 MB'){
        $perfil = "15Megas";
    } else if ($velocidad == '20 MB'){
        $perfil = "20Megas";
    } else if ($velocidad == '30 MB'){
        $perfil = "30Megas";
    } else if ($velocidad == '50 MB'){
        $perfil = "50Megas";
    } else if ($velocidad == '100 MB'){
        $perfil = "100Megas";
    }  else if ($velocidad == '5 MBF'){
        $perfil = "5MegasFibra";
    } else if ($velocidad == '10 MBF'){
        $perfil = "10MegasFibra";
    }
    include('manual_cambiar_paquete.php');
}
?>