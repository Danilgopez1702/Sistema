<?php

$query_reporte = mysqli_query($conexion, "SELECT * FROM `reportes` WHERE `id_reportes` =  '$id'");
$extraccion_reporte = mysqli_fetch_assoc($query_reporte);

$numero_reporte = $extraccion_reporte['no_reporte_reportes'];
$cliente_reporte = $extraccion_reporte['id_cliente'];
$usuario_reporte = $extraccion_reporte['id_usuario'];
$reparadores_reporte = $extraccion_reporte['id_reparador'];
$activo_reporte = $extraccion_reporte['activo_reportes'];
$status_reporte = $extraccion_reporte['status_reportes'];
$mensaje_reporte = $extraccion_reporte['mensaje_reportes'];
$problema_reporte = $extraccion_reporte['problema_reportes'];
$solucion_reporte = $extraccion_reporte['solucion_reportes'];
$fecha_reporte = date("Y-m-d", strtotime( $extraccion_reporte['fecha_reportes']));
$asignacion_reporte = date("Y-m-d", strtotime( $extraccion_reporte['asignacion_reportes']));


$query_cliente = mysqli_query($conexion, "SELECT * FROM `cliente` WHERE `id_cliente` =  '$cliente_reporte'");
$usuario_cliente = mysqli_fetch_assoc($query_cliente);

$nombrec_reporte = $usuario_cliente['nombre_cliente'] . " " . $usuario_cliente['apellido_p_cliente'] . " " . $usuario_cliente['apellido_m_cliente'];
$id_cliente = $usuario_cliente['id_cliente'];
$num_cliente = $usuario_cliente['numero_cliente'];
$nombre_reporte = $usuario_cliente['nombre_cliente'];
$materno_reporte = $usuario_cliente['apellido_m_cliente'];
$paterno_reporte = $usuario_cliente['apellido_p_cliente'];
$colonia_reporte = $usuario_cliente['colonia_cliente'];
$calle_reporte = $usuario_cliente['calle_cliente'];
$externo_reporte = $usuario_cliente['numero_ext'];
$interno_reporte = $usuario_cliente['numero_int'];
$radio_reporte = $usuario_cliente['radio_cliente'];
$ip_reporte = $usuario_cliente['ip_cliente'];
$onu_reporte = $usuario_cliente['onu_cliente'];
$zona_reporte = $usuario_cliente['id_zona'];
$router_reporte = $usuario_cliente['router_cliente'];
$tel1_reporte = $usuario_cliente['tel1_cliente'];
$tel2_reporte = $usuario_cliente['tel2_cliente'];
$tel3_reporte = $usuario_cliente['tel3_cliente'];
$bote_reporte = $usuario_cliente['bote_cliente'];
$puerto_reporte = $usuario_cliente['puerto_cliente'];

$query_usuario = mysqli_query($conexion, "SELECT * FROM `usuario` WHERE `id_usuario` =  '$usuario_reporte'");
$usuario_nombre = mysqli_fetch_assoc($query_usuario);

$nombre_reporte = $usuario_nombre['usuario_usuario'];

$query_reparador = mysqli_query($conexion, "SELECT * FROM `usuario` WHERE `id_usuario` =  '$reparadores_reporte'");
$usuario_reparador = mysqli_fetch_assoc($query_reparador);

$reparador_reporte = $usuario_reparador['usuario_usuario'];

$query_olt = mysqli_query($conexion, "SELECT * FROM `zonafibra` WHERE `id_zonafibra` =  '$zona_reporte'");
$usuario_olt = mysqli_fetch_assoc($query_olt);

$ip_olt = $usuario_olt['ip_zonafibra'];

?>