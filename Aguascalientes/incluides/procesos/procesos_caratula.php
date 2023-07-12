<?php
require("../../../base_datos/conexion/conexion.php");
    $consultar_cliente = mysqli_query($conexion, "SELECT * FROM cliente WHERE id_cliente = $id_cliente");
    $cliente = mysqli_fetch_assoc($consultar_cliente);
    $id_cliente = $cliente['id_cliente'];
    $folio = $cliente['folio_cliente'];
    $num_cliente = $cliente['numero_cliente'];
    $status_cliente = $cliente['status_cliente'];
    $nombre_completo = $cliente['nombre_cliente'] ." " . $cliente['apellido_p_cliente'] ." " . $cliente['apellido_m_cliente'];
    $nombre = $cliente['nombre_cliente'];
    $p_cliente = $cliente['apellido_p_cliente'];
    $m_cliente = $cliente['apellido_m_cliente'];
    $fecha_nacimiento = date("Y-m-d", strtotime( $cliente['fecha_nacimiento']));
    $postal = $cliente['codigo_postal'];
    $estado = $cliente['estado'];
    $colonia = $cliente['colonia_cliente'];
    $calle = $cliente['calle_cliente'];
    $exterior = $cliente['numero_ext'];
    $interior = $cliente['numero_int'];
    $calle1 = $cliente['entre_calle1'];
    $calle2 = $cliente['entre_calle2'];
    $ref = $cliente['ref_dom'];
    $tel1 = $cliente['tel1_cliente'];
    $tel2 = $cliente['tel2_cliente'];
    $tel3 = $cliente['tel3_cliente'];
    $email = $cliente['email_cliente'];
    $ref1 = $cliente['ref_nombre1'];
    $ref_tel = $cliente['ref_tel1'];
    $ref2 = $cliente['ref_nombre2'];
    $ref_tel2 = $cliente['ref_tel2'];
    $municipio = $cliente['municipio'];
    $paquete_cliente = $cliente['paquete_cliente'];
    $velocidad_cliente = $cliente['velocidad_cliente'];
    $instalacion_cliente = $cliente['fecha_instalacion'];
    $fecha_corte = $cliente['fecha_corte'];
    $vendedor_cliente = $cliente['vendedor_cliente'];
    $instalador_cliente = $cliente['id_instalador'];
    $radio_cliente = $cliente['radio_cliente'];
    $router_cliente = $cliente['router_cliente'];
    $onu_cliente = $cliente['onu_cliente'];
    $ont_cliente = $cliente['ont_cliente'];
    $bandera_cliente = $cliente['bandera_cliente'];
    $bote_cliente = $cliente['bote_cliente'];
    $puerto_cliente = $cliente['puerto_cliente'];
    $ip_cliente = $cliente['ip_cliente'];
    $id_zona = $cliente['id_zona'];
    $factura = $cliente['factura'];

    if(!$bandera_cliente){
        $bandera_cliente = "No Instalada";
    }

    if($status_cliente == 0){
        $status = "Activo";
    }else if($status_cliente == 1){
        $status = "Por Vencer";
    }else if($status_cliente == 2){
        $status = "Moroso";
    }else if($status_cliente == 3){
        $status = "Moroso Inactivo";
    }else if($status_cliente == 4){
        $status = "Eq Recuperado";
    }else if($status_cliente == 5){
        $status = "Eq por Recuperar";
    }else if($status_cliente == 6){
        $status = "Cancelado";
    }else if($status_cliente == 7){
        $status = "Prospecto";
    }else if($status_cliente == 8){
        $status = "Dificil Recuperacion";
    }else if($status_cliente == 9){
        $status = "Por Revisar";
    }

    $consultar_zona = mysqli_query($conexion, "SELECT * FROM zonafibra WHERE id_zonafibra = $id_zona");
    $zonafibra = mysqli_fetch_assoc($consultar_zona);
    $nombre_zona = $zonafibra['nombre_zonafibra'];
    
    $consultar_vendedor = mysqli_query($conexion, "SELECT * FROM usuario WHERE id_usuario = $vendedor_cliente");
    $vendedores = mysqli_fetch_assoc($consultar_vendedor);
    $vendedor = $vendedores['usuario_usuario'];

    $consultar_instalador = mysqli_query($conexion, "SELECT * FROM usuario WHERE id_usuario = $instalador_cliente");
    $instaladores = mysqli_fetch_assoc($consultar_instalador);
    $instalador = $instaladores['usuario_usuario'];

    if($radio_cliente != NULL || $radio_cliente != ""){
        $instalacion = 1;
        $instalacion_name = "Antena";
    }else if($onu_cliente != NULL || $onu_cliente != ""){
        $instalacion = 2;
        $instalacion_name = "Fibra ONU";
    }else if($ont_cliente != NULL || $ont_cliente != ""){
        $instalacion = 3;
        $instalacion_name = "Fibra ONT";
    }

    //entra el if de paquete y precio 
        if($user_profile == "2Megas"){
            $paquete = "2MB";
            $precio_m = "$199";
        }else if($user_profile == "4Megas"){
            $paquete = "4MB";
            $precio_m = "$269";
        }else if($user_profile == "6Megas"){
            $paquete = "6MB";
            $precio_m = "$349";
        }else if($user_profile == "8Megas"){
            $paquete = "8MB";
            $precio_m = "$399";
        }else if($user_profile == "10Megas"){
            $paquete = "10MB";
            $precio_m = "$499";
        }else if($user_profile == "15Megas"){
            $paquete = "15MB";
            $precio_m = "$599";
        }else if($user_profile == "5MegasFibra"){
            $paquete = "5MBF";
            $precio_m = "$199";
        }else if($user_profile == "10MegasFibra"){
            $paquete = "10MBF";
            $precio_m = "$269";
        }else if($user_profile == "20Megas"){
            $paquete = "20MBF";
            $precio_m = "$349";
        }else if($user_profile == "30Megas"){
            $paquete = "30MB";
            $precio_m = "$399";
        }else if($user_profile == "50Megas"){
            $paquete = "50MBF";
            $precio_m = "$499";
        }else if($user_profile == "100Megas"){
            $paquete = "100MBF";
            $precio_m = "$899";
        }else if($user_profile == "cancelado"){
            $paquete = "cancelado";
            $precio_m = "cancelado";
        }
?>