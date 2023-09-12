<?php
include_once '../../conexion/conexion.php';

$consulta = mysqli_query($conexion, "SELECT * FROM `prospecto`");

$data = array();

while ($datas = mysqli_fetch_assoc($consulta)) {
	$id_prospecto = $datas['id_prospecto'];
	$apellido_p_prospecto = $datas['apellido_p_prospecto'];
	$apellido_m_prospecto = $datas['apellido_m_prospecto'];
	$nombre_prospecto = $datas['nombre_prospecto'];
	$tel1 = $datas['tel1'];

	$data[] = [
		'id_prospecto' => $id_prospecto,
		'apellido_p_prospecto' => $apellido_p_prospecto,
		'apellido_m_prospecto' => $apellido_m_prospecto,
		'nombre_prospecto' => $nombre_prospecto,
		'tel1' => $tel1
	];
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //envio el array final el formato json a AJAX