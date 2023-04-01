<?php
include_once '../../conexion/conexion.php';
$acomodo = $_POST['acomodo'];
echo $acomodo;
if ($acomodo == 7) {
	$consulta = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '7' ORDER BY id_cliente");
} else if ($acomodo == 9) {
	$consulta = mysqli_query($conexion, "SELECT * FROM `cliente` WHERE `id_cliente` = 2");
} else if ($acomodo == 10) {
	$consulta = mysqli_query($conexion, "SELECT * FROM `encuesta` AS encuesta INNER JOIN  cliente AS cliente ON cliente.id_cliente = encuesta.id_encuesta");
}
$datos = mysqli_num_rows($consulta);
echo $datos;
$data = array();

while ($info = mysqli_fetch_assoc($consulta)) {

	$id_cliente = $info['id_cliente'];

	if ($acomodo == 2) {
		$status_cliente = "Por Revisar";
	}else if ($info['status_cliente'] == 7) {
		$status_cliente = "Prospecto";
	}else{
		$status_cliente = "Encuesta";
	}
	
	$folio_cliente = $info['folio_cliente'];
	$numero_cliente = $info['numero_cliente'];
	$apellido_p_cliente = $info['apellido_p_cliente'];
	$apellido_m_cliente = $info['apellido_m_cliente'];
	$nombre_cliente = $info['nombre_cliente'];

	$data[] = [
		'id_cliente' => $id_cliente,
		'status_cliente' => $status_cliente,
		'folio_cliente' => $folio_cliente,
		'numero_cliente' => $numero_cliente,
		'apellido_p_cliente' => $apellido_p_cliente,
		'apellido_m_cliente' => $apellido_m_cliente,
		'nombre_cliente' => $nombre_cliente
	];

}


print json_encode($data, JSON_UNESCAPED_UNICODE); //envio el array final el formato json a AJAX
$conexion = null;
