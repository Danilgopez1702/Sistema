<?php
include_once '../../conexion/conexion.php';

$consulta = mysqli_query($conexion, "SELECT * FROM `inventario` WHERE `tipo_inventario` = 3");

$data = array();

while ($datas = mysqli_fetch_assoc($consulta)) {
	$id_inventario = $datas['id_inventario'];
	$radio_inventario = $datas['radio_inventario'];
	if ($datas['id_instalador'] == 2) {
		$asignado = "No Asignado";
	} else if ($datas['id_instalador'] != 2) {
		$instalador = $datas['id_instalador'];
		$query_instalador = mysqli_query($conexion, "SELECT * FROM `usuario` WHERE `id_usuario` =  '$instalador'");
		$instalador_nombre = mysqli_fetch_assoc($query_instalador);
		$asignado =  $instalador_nombre['usuario_usuario'];
	}
	if($datas['fallo_inventario'] == 2){
		$fallo_inventario =  "No";
	}else if($datas['fallo_inventario'] == 1){
		$fallo_inventario = "Si";
	}
	$fecha_inventario = $datas['fecha_inventario'];

	$data[] = [
		'id_inventario' => $id_inventario,
		'radio_inventario' => $radio_inventario,
		'asignado' => $asignado,
		'fallo_inventario' => $fallo_inventario,
		'fecha_inventario' => $fecha_inventario
	];
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //envio el array final el formato json a AJAX