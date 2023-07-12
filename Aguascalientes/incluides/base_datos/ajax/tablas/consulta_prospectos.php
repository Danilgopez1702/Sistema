<?php
include_once '../../conexion/conexion.php';

	$consulta = mysqli_query($conexion, "SELECT * FROM `prospecto`");


$datos = mysqli_num_rows($consulta);

$data = array();

while ($info = mysqli_fetch_assoc($consulta)) {

	$id_prospecto = $info['id_prospecto'];
	$apellido_p__prospecto = $info['apellido_p__prospecto'];
	$apellido_m__prospecto = $info['apellido_m__prospecto'];
	$nombre_prospecto = $info['nombre_prospecto'];
	$tel1 = $info['tel1'];

	$data[] = [
		'id_prospecto' => $id_prospecto,
		'apellido_p__prospecto' => $apellido_p__prospecto,
		'apellido_m__prospecto' => $apellido_m__prospecto,
		'nombre_prospecto' => $nombre_prospecto,
		'tel1' => $tel1
	];
}


print json_encode($data, JSON_UNESCAPED_UNICODE); //envio el array final el formato json a AJAX
$conexion = null;
