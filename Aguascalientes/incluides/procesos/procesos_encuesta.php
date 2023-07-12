<?php
require("../../../base_datos/conexion/conexion.php");
    $consultar_cliente = mysqli_query($conexion, "SELECT * FROM cliente WHERE id_cliente = $id_cliente");
    $cliente = mysqli_fetch_assoc($consultar_cliente);
    $id_cliente = $cliente['id_cliente'];
    $folio = $cliente['folio_cliente'];
    $num_cliente = $cliente['numero_cliente'];
    $nombre_completo = $cliente['nombre_cliente'] ." " . $cliente['apellido_p_cliente'] ." " . $cliente['apellido_m_cliente'];
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
    $instalacion_cliente = $cliente['fecha_instalacion'];
    $corte_cliente = $cliente['fecha_corte'];
    $vendedor_cliente = $cliente['vendedor_cliente'];
    $instalador_cliente = $cliente['id_instalador'];
    $radio_cliente = $cliente['radio_cliente'];
    $router_cliente = $cliente['router_cliente'];
    $onu_cliente = $cliente['onu_cliente'];
    $ont_cliente = $cliente['onu_cliente'];
    $bandera_cliente = $cliente['bandera_cliente'];
    $bote_cliente = $cliente['bote_cliente'];
    $puerto_cliente = $cliente['puerto_cliente'];
    $ip_cliente = $cliente['ip_cliente'];
    $id_zona = $cliente['id_zona'];
    $factura = $cliente['factura'];

    $consultar_encuesta = mysqli_query($conexion, "SELECT * FROM `encuesta` WHERE `id_cliente` =  '$id_cliente'");
    $encuesta_cont = mysqli_num_rows($consultar_encuesta);
    if($encuesta_cont > 0){
        $encuesta = mysqli_fetch_assoc($consultar_encuesta);
        if($encuesta['razon_encuesta'] != NULL){
            $notas = $encuesta['razon_encuesta'];
        }else{
            $notas = " ";
        }
    }else{
        $notas = " ";
    }

    $consultar_zona = mysqli_query($conexion, "SELECT * FROM zonafibra WHERE id_zonafibra = $id_zona");
    $zonafibra = mysqli_fetch_assoc($consultar_zona);
    $nombre_zona = $zonafibra['nombre_zonafibra'];
    
    $consultar_vendedor = mysqli_query($conexion, "SELECT * FROM usuario WHERE id_usuario = '$vendedor_cliente'");
    $vendedores = mysqli_fetch_assoc($consultar_vendedor);
    $vendedor = $vendedores['usuario_usuario'];

    $consultar_instalador = mysqli_query($conexion, "SELECT * FROM usuario WHERE id_usuario = '$instalador_cliente'");
    $instaladores = mysqli_fetch_assoc($consultar_instalador);
    $instalador = $instaladores['usuario_usuario'];

    if($radio_cliente != NULL){
        $instalacion = 1;
        $instalacion_name = "Antena";
    }else if($onu_cliente != NULL){
        $instalacion = 2;
        $instalacion_name = "Fibra ONU";
    }else if($ont_cliente != NULL){
        $instalacion = 3;
        $instalacion_name = "Fibra ONT";
    }

  //entra el if de paquete y precio 
  if($paquete_cliente == "2Megas"){
    $paquete = "2MB";
    $precio_m = "$199";
}else if($paquete_cliente == "4Megas"){
    $paquete = "4MB";
    $precio_m = "$269";
}else if($paquete_cliente == "6Megas"){
    $paquete = "6MB";
    $precio_m = "$349";
}else if($paquete_cliente == "8Megas"){
    $paquete = "8MB";
    $precio_m = "$399";
}else if($paquete_cliente == "10Megas"){
    $paquete = "10MB";
    $precio_m = "$499";
}else if($paquete_cliente == "15Megas"){
    $paquete = "15MB";
    $precio_m = "$599";
}else if($paquete_cliente == "5MegasFibra"){
    $paquete = "5MBF";
    $precio_m = "$199";
}else if($paquete_cliente == "10MegasFibra"){
    $paquete = "10MBF";
    $precio_m = "$269";
}else if($paquete_cliente == "20Megas"){
    $paquete = "20MBF";
    $precio_m = "$349";
}else if($paquete_cliente == "30Megas"){
    $paquete = "30MB";
    $precio_m = "$399";
}else if($paquete_cliente == "50Megas"){
    $paquete = "50MBF";
    $precio_m = "$499";
}else if($paquete_cliente == "100Megas"){
    $paquete = "100MBF";
    $precio_m = "$899";
}else if($paquete_cliente == "cancelado"){
    $paquete = "cancelado";
    $precio_m = "cancelado";
}
?>