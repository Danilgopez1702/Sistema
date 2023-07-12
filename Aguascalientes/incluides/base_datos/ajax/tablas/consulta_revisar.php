<?php
include_once '../../conexion/conexion.php';


$acomodo = $_POST['acomodo'];

if ($acomodo == 1) {
	$consulta = mysqli_query($conexion, "SELECT * FROM `revisar` AS revisar INNER JOIN cliente AS cliente ON revisar.id_cliente = cliente.id_cliente");
} else if ($acomodo == 2) {
	$consulta = mysqli_query($conexion, "SELECT * FROM `revisar` AS revisar INNER JOIN  cliente AS cliente ON 
	revisar.id_cliente = cliente.id_cliente WHERE revisar.status_revisar = 2");
} else if ($acomodo == 3) {
	$consulta = mysqli_query($conexion, "SELECT * FROM `revisar` AS revisar INNER JOIN  cliente AS cliente ON 
	revisar.id_cliente = cliente.id_cliente WHERE revisar.status_revisar = 3");
}

$datos = mysqli_num_rows($consulta);
$data = array();

while ($info = mysqli_fetch_assoc($consulta)) {

	$id_cliente = $info['id_cliente'];

		$status_cliente = "Activo";
	
	
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
