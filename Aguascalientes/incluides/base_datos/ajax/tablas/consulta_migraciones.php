<?php
include_once '../../conexion/conexion.php';

	$consulta = mysqli_query($conexion, "SELECT * FROM `reportes` WHERE `tipo_reportes` = 2");


$datos = mysqli_num_rows($consulta);
$data = array();

while ($info = mysqli_fetch_assoc($consulta)) {

	$id_reportes = $info['id_reportes'];
	$id_cliente = $info['id_cliente'];
	$status_reportes = $info['status_reportes'];
	$id_reportes = $info['id_reportes'];
	$id_reparador = $info['id_reparador'];
	$no_reporte_reportes = $info['no_reporte_reportes'];
	$agentes = $info['id_usuario'];                        
	$comentario = $info['mensaje_reportes'];
	$fecha_reporte = date("d-m-Y", strtotime( $info['fecha_reportes']));
	$limite = 20;
	$sufijo = "...";

	$query_usuario = mysqli_query($conexion, "SELECT * FROM `cliente` WHERE `id_cliente` =  '$id_cliente'");
	$usuario_nombre = mysqli_fetch_assoc($query_usuario);

	$query_instalador = mysqli_query($conexion, "SELECT * FROM `usuario` WHERE `id_usuario` =  '$id_reparador'");
	$instalador_nombre = mysqli_fetch_assoc($query_instalador);

	$query_agente = mysqli_query($conexion, "SELECT * FROM `usuario` WHERE `id_usuario` =  '$agentes'");
	$agente_nombre = mysqli_fetch_assoc($query_agente);

	$nombrec_reporte = $usuario_nombre['nombre_cliente'];
	$num_cliente = $usuario_nombre['numero_cliente'];
	$instalador = $instalador_nombre['usuario_usuario'];
	$agente = $agente_nombre['usuario_usuario'];

	if($status_reportes == 1){
		$status = "Activo";
	}else if($status_reportes == 2){
		$status = "Cerrado";
	}

	function limitar_cadena($comentario, $limite, $sufijo){
		// Si la longitud es mayor que el límite...
		if(strlen($comentario) > $limite){
			// Entonces corta la cadena y ponle el sufijo
			return substr($comentario, 0, $limite) . $sufijo;
		}
		
		// Si no, entonces devuelve la cadena normal
		return $comentario;
	}

	$data[] = [
		'id_reportes' => $id_reportes,
		'status' => $status,
		'no_reporte_reportes' => $no_reporte_reportes,
		'num_cliente' => $num_cliente,
		'nombrec_reporte' => $nombrec_reporte,
		'agente' => $agente,
		'instalador' => $instalador,
		'fecha_reporte' => $fecha_reporte,
		'comentario' => $comentario
	];

}


print json_encode($data, JSON_UNESCAPED_UNICODE); //envio el array final el formato json a AJAX
$conexion = null;
