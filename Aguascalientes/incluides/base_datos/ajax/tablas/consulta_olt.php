<?php
include_once '../../conexion/conexion.php';

$consulta = mysqli_query($conexion, "SELECT * FROM `zonafibra`");

$data = array();

while ($datas = mysqli_fetch_assoc($consulta)) {
	$id_zonafibra = $datas['id_zonafibra'];
	$nombre_zonafibra = $datas['nombre_zonafibra'];
	$botes_zonafibra = $datas['botes_zonafibra'];
	$puertos_zonafibra = $datas['puertos_zonafibra'];

	if($datas['equipo_zonafibra'] == 1){
		$equipo_zonafibra = "Gpon";
	}else if($datas['equipo_zonafibra'] == 2){
		$equipo_zonafibra = "Epon";
	}
	$ip_zonafibra = $datas['ip_zonafibra'];
	$data[] = [
		'id_zonafibra' => $id_zonafibra,
		'nombre_zonafibra' => $nombre_zonafibra,
		'botes_zonafibra' => $botes_zonafibra,
		'puertos_zonafibra' => $puertos_zonafibra,
		'equipo_zonafibra' => $equipo_zonafibra,
		'ip_zonafibra' => $ip_zonafibra
	];
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //envio el array final el formato json a AJAX