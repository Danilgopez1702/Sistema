<?php
require("../../../base_datos/conexion/conexion.php");
$consultar_cliente = mysqli_query($conexion, "SELECT * FROM cliente WHERE id_cliente = $id_cliente");
$cliente = mysqli_fetch_assoc($consultar_cliente);

$id_cliente = $cliente['id_cliente'];
$num_cliente = $cliente['numero_cliente'];
$nombre_completo = $cliente['nombre_cliente'] ." " . $cliente['apellido_p_cliente'] ." " . $cliente['apellido_m_cliente'];
$nombre = $cliente['nombre_cliente'];
$apellido = $cliente['apellido_p_cliente'] . " ". $cliente['apellido_m_cliente'];
$email = $cliente['email_cliente'];
$calle = $cliente['calle_cliente'] . " " . $cliente['numero_ext'];
$interior = $cliente['numero_int'];
$postal = $cliente['codigo_postal'];
$estado = $cliente['estado'];
$colonia = $cliente['colonia_cliente'];
$municipio = $cliente['municipio'];
$estado = $cliente['estado'];
$pais = "Mexico";
$tel1 = $cliente['tel1_cliente'];
$tel2 = $cliente['tel2_cliente'];
$precio = $cliente['precio_cliente'];
$velocidad_cliente = $cliente['velocidad_cliente'];

?>