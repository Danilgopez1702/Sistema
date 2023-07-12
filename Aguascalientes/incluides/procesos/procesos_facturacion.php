<?php
require("../../../base_datos/conexion/conexion.php");
$consultar_factura = mysqli_query($conexion, "SELECT * FROM `facturacion` WHERE id_cliente = '$id_cliente'");
$factura = mysqli_fetch_assoc($consultar_factura);

if(!$factura){
                    $precio_cliente = " ";
                    $nombre_factura = " ";
                    $paterno_factura = " ";
                    $materno_factura = " ";
                    $nacimiento_factura = " ";
                    $email_factura = " ";
                    $calle_factura = " ";
                    $ext_factura = " ";
                    $int_factura = " ";
                    $estado_factura = " ";
                    $municipio_factura = " ";
                    $colonia_factura = " ";
                    $cp_factura = " ";
                    $rfc_factura = " ";
                    $regimen_factura = " ";
                    $id_zona = " ";
                    $fechaActual = " ";              
                    $regimen_facturas = " ";  
                    $fechaActual = date('Y-m-d');            
}else{
$precio_cliente = $factura['precio_cliente'];
$nombre_factura = $factura['nombre_factura'];
$paterno_factura = $factura['paterno_factura'];
$materno_factura = $factura['materno_factura'];
$nacimiento_factura = date("Y-m-d", strtotime($factura['nacimiento_factura']));
$email_factura = $factura['email_factura'];
$calle_factura = $factura['calle_factura'];
$ext_factura = $factura['ext_factura'];
$int_factura = $factura['int_factura'];
$estado_factura = $factura['estado_factura'];
$municipio_factura = $factura['municipio_factura'];
$colonia_factura = $factura['colonia_factura'];
$cp_factura = $factura['cp_factura'];
$rfc_factura = $factura['rfc_factura'];
$regimen_factura = $factura['regimen_factura'];
$id_zona = $factura['id_zona'];
$fechaActual = date('Y-m-d');

if($regimen_factura != NULL){
$fiscal_factura = mysqli_query($conexion, "SELECT * FROM `regimen_fiscal` WHERE clave = '$regimen_factura'");
$regimen_fiscal_factura = mysqli_fetch_assoc($fiscal_factura);

$regimen_facturas = $regimen_fiscal_factura['regimen'];
}
}
$consultar_cliente = mysqli_query($conexion, "SELECT * FROM cliente WHERE id_cliente = $id_cliente");
$cliente = mysqli_fetch_assoc($consultar_cliente);

$nombre_completo = $cliente['nombre_cliente'] . " " . $cliente['apellido_p_cliente'] . " " . $cliente['apellido_m_cliente'];
$num_cliente = $cliente['numero_cliente'];
$precio_cliente = $cliente['precio_cliente'];
