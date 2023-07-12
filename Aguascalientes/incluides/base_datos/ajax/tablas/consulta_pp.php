<?php
include_once '../../conexion/conexion_local.php';

$consulta = mysqli_query($conn, "SELECT * FROM emp ORDER BY emp_id");

$data = array();

while ($datas = mysqli_fetch_assoc($consulta)) {

	$emp_id = $datas['emp_id'];
	$lugar = $datas['lugar'];
	$cliente = $datas['cliente'];
	$status = $datas['status'];
	$corte = $datas['corte'];
	

	$data[] = [
		'emp_id' => $emp_id,
		'lugar' => $lugar,
		'cliente' => $cliente,
		'status' => $status,
		'corte' => $corte
	];
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //envio el array final el formato json a AJAX