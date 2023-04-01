<?php
include_once '../../conexion/conexion.php';
$acomodo = $_POST['acomodo'];

if ($acomodo == 0) {
	$consulta = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '0' ORDER BY id_cliente");
} else if ($acomodo == 1) {
	$consulta = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '1' ORDER BY id_cliente");
} else if ($acomodo == 2) {
	$consulta = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '2' ORDER BY id_cliente");
} else if ($acomodo == 3) {
	$consulta = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '3' ORDER BY id_cliente");
} else if ($acomodo == 4) {
	$consulta = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '4' ORDER BY id_cliente");
} else if ($acomodo == 5) {
	$consulta = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '5' ORDER BY id_cliente");
} else if ($acomodo == 6) {
	$consulta = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '6' ORDER BY id_cliente");
} else if ($acomodo == 8) {
	$consulta = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '8' ORDER BY id_cliente");
} else {
	$consulta = mysqli_query($conexion, "SELECT * FROM cliente ORDER BY id_cliente");
}

$datos = mysqli_num_rows($consulta);

$data = array();

while ($info = mysqli_fetch_assoc($consulta)) {

	$id_cliente = $info['id_cliente'];

	if ($info['status_cliente'] == 0) {
		$status_cliente = "Activo";
	} else if ($info['status_cliente'] == 1) {
		$status_cliente = "Por Vencer";
	} else if ($info['status_cliente'] == 2) {
		$status_cliente = "Moroso";
	} else if ($info['status_cliente'] == 3) {
		$status_cliente = "Moroso Inactivo";
	} else if ($info['status_cliente'] == 4) {
		$status_cliente = "Eq Recuperado";
	} else if ($info['status_cliente'] == 5) {
		$status_cliente = "Eq sin Recuperar";
	} else if ($info['status_cliente'] == 6) {
		$status_cliente = "Cancelado";
	} else if ($info['status_cliente'] == 7) {
		$status_cliente = "Prospecto";
	} else if ($info['status_cliente'] == 8) {
		$status_cliente = "Dificil Rec.";
	} else if ($info['status_cliente'] == 9) {
		$status_cliente = "Por Revisar";
	}
	
	$folio_cliente = $info['folio_cliente'];
	$onu_cliente = $info['onu_cliente'];
	$bandera_cliente = $info['bandera_cliente'];
	$numero_cliente = $info['numero_cliente'];
	$apellido_p_cliente = $info['apellido_p_cliente'];
	$apellido_m_cliente = $info['apellido_m_cliente'];
	$nombre_cliente = $info['nombre_cliente'];

	$data[] = [
		'id_cliente' => $id_cliente,
		'status_cliente' => $status_cliente,
		'folio_cliente' => $folio_cliente,
		'onu_cliente' => $onu_cliente,
		'bandera_cliente' => $bandera_cliente,
		'numero_cliente' => $numero_cliente,
		'apellido_p_cliente' => $apellido_p_cliente,
		'apellido_m_cliente' => $apellido_m_cliente,
		'nombre_cliente' => $nombre_cliente
	];
}


print json_encode($data, JSON_UNESCAPED_UNICODE); //envio el array final el formato json a AJAX
$conexion = null;
