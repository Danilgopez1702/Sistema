<?php
include_once '../../conexion/conexion.php';

$consulta = mysqli_query($conexion, "SELECT * FROM `log`");

$data = array();

while ($datas = mysqli_fetch_assoc($consulta)) {

	$id_log = $datas['id_log'];
	$accion_log = $datas['accion_log'];
	$nombre_usuario = $datas['id_usuario'];
	$id_cliente = $datas['id_cliente'];
	$time_log = $datas['time_log'];


	$query_usuario = mysqli_query($conexion, "SELECT * FROM `usuario` WHERE `id_usuario` =  '$nombre_usuario'");
	$usuario_nombre = mysqli_fetch_assoc($query_usuario);
	$usuario = $usuario_nombre['usuario_usuario'];

	if (!$id_cliente) {
		$n_cliente =  "n/a";
	} else {
		$cliente = $id_cliente;
		$query_cliente = mysqli_query($conexion, "SELECT * FROM `cliente` WHERE `id_cliente` =  '$cliente'");
		$cliente_nombre = mysqli_fetch_assoc($query_cliente);
		$n_cliente = $cliente_nombre['numero_cliente'];
	}

	$data[] = [
		'id_log' => $id_log,
		'accion_log' => $accion_log,
		'usuario' => $usuario,
		'n_cliente' => $n_cliente,
		'time_log' => $time_log
	];
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //envio el array final el formato json a AJAX