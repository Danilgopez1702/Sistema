<?php
include_once '../../conexion/conexion.php';

$consulta = mysqli_query($conexion, "SELECT * FROM `pagos`");

$data = array();

while ($datas = mysqli_fetch_assoc($consulta)) {

	$id_pagos = $datas['id_pagos'];
	$lugar_pagos = $datas['lugar_pagos'];
	$fecha_pagos = $datas['fecha_pagos'];
	$hora_pagos = $datas['hora_pagos'];
	$num_cliente = $datas['num_cliente'];
	$monto_pagos = $datas['monto_pagos'];
	

	$data[] = [
		'id_pagos' => $id_pagos,
		'lugar_pagos' => $lugar_pagos,
		'fecha_pagos' => $fecha_pagos,
		'hora_pagos' => $hora_pagos,
		'num_cliente' => $num_cliente,
		'monto_pagos' => $monto_pagos
	];
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //envio el array final el formato json a AJAX