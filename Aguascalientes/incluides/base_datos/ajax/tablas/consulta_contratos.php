<?php
include_once '../../conexion/conexion.php';
$acomodo = $_POST['acomodo'];

if ($acomodo == 0) {
	$consulta = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '0' ORDER BY id_cliente DESC");
} else if ($acomodo == 1) {
	$consulta = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '1' ORDER BY id_cliente DESC");
} else if ($acomodo == 2) {
	$consulta = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '2' ORDER BY id_cliente DESC");
} else if ($acomodo == 3) {
	$consulta = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '3' ORDER BY id_cliente DESC");
} else if ($acomodo == 4) {
	$consulta = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '4' ORDER BY id_cliente DESC");
} else if ($acomodo == 5) {
	$consulta = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '5' ORDER BY id_cliente DESC");
} else if ($acomodo == 6) {
	$consulta = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '6' ORDER BY id_cliente DESC");
} else if ($acomodo == 7) {
	$consulta = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '7' ORDER BY id_cliente DESC");
} else if ($acomodo == 8) {
	$consulta = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '8' ORDER BY id_cliente DESC");
}  else if ($acomodo == 9) {
	$consulta = mysqli_query($conexion, "SELECT * FROM `revisar` AS revisar INNER JOIN cliente AS cliente ON revisar.id_cliente = cliente.id_cliente where `status_revisar`= 1");
}  else if ($acomodo == 10) {
	$consulta = mysqli_query($conexion, "SELECT * FROM `revisar` AS revisar INNER JOIN cliente AS cliente ON revisar.id_cliente = cliente.id_cliente where `status_revisar`= 2");
}  else if ($acomodo == 11) {
	$consulta = mysqli_query($conexion, "SELECT * FROM `revisar` AS revisar INNER JOIN cliente AS cliente ON revisar.id_cliente = cliente.id_cliente where `status_revisar`= 2");
}else {
	$consulta = mysqli_query($conexion, "SELECT * FROM cliente ORDER BY id_cliente DESC");
}

$datos = mysqli_num_rows($consulta);

$data = array();

while ($info = mysqli_fetch_assoc($consulta)) {

	$id_cliente = $info['id_cliente'];
	$status_cliente = $info['status_cliente'];
	$folio_cliente = $info['folio_cliente'];
	$onu_cliente = $info['onu_cliente'];
	$ont_cliente = $info['ont_cliente'];
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
		'ont_cliente' => $ont_cliente,
		'bandera_cliente' => $bandera_cliente,
		'numero_cliente' => $numero_cliente,
		'apellido_p_cliente' => $apellido_p_cliente,
		'apellido_m_cliente' => $apellido_m_cliente,
		'nombre_cliente' => $nombre_cliente
	];
}


print json_encode($data, JSON_UNESCAPED_UNICODE); //envio el array final el formato json a AJAX
$conexion = null;