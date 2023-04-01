<?php
require("../conexion/conexion.php");
$id_cliente = $_GET['id'];
$consultar_factura = mysqli_query($conexion, "SELECT * FROM `facturacion` WHERE id_cliente = '$id_cliente'");

$consultar_cliente = mysqli_query($conexion, "SELECT * FROM cliente WHERE id_cliente = '$id_cliente'");
$cliente = mysqli_fetch_assoc($consultar_cliente);
$nombre = $cliente['nombre_cliente'];
$paterno = $cliente['apellido_p_cliente'];
$materno = $cliente['apellido_m_cliente'];
$nacimiento = $cliente['fecha_nacimiento'];
$email = $cliente['email_cliente'];
$calle = $cliente['calle_cliente'];
$exterior = $cliente['numero_ext'];
$interior = $cliente['numero_int'];
$estado = $cliente['estado'];
$municipio = $cliente['municipio'];
$colonia = $cliente['colonia_cliente'];
$postal = $cliente['codigo_postal'];
$precio = $cliente['precio_cliente'];
$fechaActual = date('Y-m-d');

if (mysqli_num_rows($consultar_factura) < 0) {
    $data = mysqli_fetch_assoc($consultar_cliente);
    $status_factura = $data['status_factura'];
    if ($status_factura == 1) {
        $sql1 = mysqli_query($conexion, "UPDATE `facturacion` SET `status_facturacion`= 2 WHERE id_cliente = '$id_cliente'");
    } else {
        $sql2 = mysqli_query($conexion, "UPDATE `facturacion` SET `status_facturacion`= 1 WHERE id_cliente = '$id_cliente'");
    }
} else {

    $sql3 = mysqli_query($conexion, "INSERT INTO `facturacion`(`id_cliente`, `precio_cliente`, `emicion_factura`, `nombre_factura`, `paterno_factura`, 
    `materno_factura`, `nacimiento_factura`, `email_factura`, `calle_factura`, `ext_factura`, `int_factura`, `estado_factura`, `municipio_factura`, `colonia_factura`, 
    `cp_factura`, `status_facturacion`, `id_zona`) VALUES ('$id_cliente', '$precio', '$fechaActual', '$nombre', 
    '$paterno', '$materno', '$nacimiento', '$email', '$calle', '$exterior', '$interior', '$estado', '$municipio', '$colonia', $postal, 2, 1)");
}
var_dump($sql3);
?>                  
<meta http-equiv="refresh" content="1; url=../../admin/clientes/facturacion/datos_facturacion.php?id=<?php echo $id_cliente ?>">