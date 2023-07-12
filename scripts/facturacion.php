<?php
require("conexion.php");
require("conexion_antiguo.php");
$sql_usuario = mysqli_query($con, "SELECT * FROM datos_facturacion");
$usuario_num = mysqli_num_rows($sql_usuario);

if ($usuario_num > 0) {
	while ($data = mysqli_fetch_assoc($sql_usuario)) {

		$idClientes = $data['idClientes'];
		$num_cliente = $data['num_cliente'];
		$precio_mensual = $data['precio_mensual'];
		$fecha_emision = $data['fecha_emision'];
		$nombre = $data['nombre'];
		$apellido_paterno = $data['apellido_paterno'];
		$apellido_materno = $data['apellido_materno'];
		$fecha_nacimiento = $data['fecha_nacimiento'];
		$email = $data['email'];
		$calle = $data['calle'];
		$numero_ext = $data['numero_ext'];
		$numero_int = $data['numero_int'];
		$colonia = $data['colonia'];
		$codigo_postal = $data['codigo_postal'];
		$localidad = $data['localidad'];
		$estado = $data['estado'];
		$municipio = $data['municipio'];
		$rfc = $data['rfc'];
		$timestamp = $data['timestamp'];
		$regimen = $data['regimen'];


		$sql = mysqli_query($conexion, "INSERT INTO `facturacion`(`id_cliente`, `numero_cliente`, `precio_cliente`,
		 `emicion_factura`, `nombre_factura`, `paterno_factura`, `materno_factura`, `nacimiento_factura`, `email_factura`, 
		 `calle_factura`, `ext_factura`, `int_factura`, `estado_factura`, `municipio_factura`, `colonia_factura`, `cp_factura`, 
		 `rfc_factura`, `regimen_factura`, `status_facturacion`, `id_zona`, `timestap`) VALUES ('$idClientes', '$num_cliente', '$precio_mensual',
		 '$fecha_emision', '$nombre', '$apellido_paterno', '$apellido_materno', '$fecha_nacimiento', '$email', '$calle', '$numero_ext',
		 '$numero_int', '$estado', '$municipio',  '$colonia', '$codigo_postal', '$rfc', '$regimen', 2, 1, '$timestamp')");

		var_dump($sql);
	}
}
?>