<?php
include_once '../../conexion/conexion.php';

$consulta = mysqli_query($conexion, "SELECT * FROM `mk`");

$data = array();

while ($datas = mysqli_fetch_assoc($consulta)) {
	$id_mk = $datas['id_mk'];
	$ip_mk = $datas['ip_mk'];
	$nombre_mk = $datas['nombre_mk'];
	$user_mk = $datas['user_mk'];
	$pass_mk = $datas['pass_mk'];
	$zona_mk = $datas['zona_mk'];

	$data[] = [
		'id_mk' => $id_mk,
		'ip_mk' => $ip_mk,
		'nombre_mk' => $nombre_mk,
		'user_mk' => $user_mk,
		'pass_mk' => $pass_mk,
		'zona_mk' => $zona_mk
	];
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //envio el array final el formato json a AJAX