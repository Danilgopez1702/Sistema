<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
require("../conexion/conexion.php");

$id_cliente = $_POST['id'];
$nombre = $_POST['nombre'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$nacimiento = $_POST['nacimiento'];
$postal = $_POST['postal'];
$estado = $_POST['estado'];
$municipio = $_POST['municipio'];
$colonia = $_POST['colonia'];
$calle = $_POST['calle'];
$exterior = $_POST['n_ext'];
$interior = $_POST['n_int'];
$email = $_POST['email'];
$rfc = $_POST['rfc'];
$regimen = $_POST['regimen'];

    $sql3 = mysqli_query($conexion, "UPDATE `facturacion` SET `nombre_factura`= '$nombre',`paterno_factura`= '$paterno',`materno_factura`= '$materno',`nacimiento_factura`= '$nacimiento',
    `email_factura`= '$email',`calle_factura`= '$calle',`ext_factura`= '$exterior',`int_factura`= '$interior',`estado_factura`= '$estado',
    `municipio_factura`= '$municipio',`colonia_factura`= '$colonia',`cp_factura`= '$postal',`rfc_factura`='$rfc',`regimen_factura`='$regimen',`status_facturacion`= 2 
    WHERE id_cliente = $id_cliente");
}
var_dump($sql3);
?>
<meta http-equiv="refresh" content="1; url=../../admin/clientes/facturacion/datos_facturacion.php?id=<?php echo $id_cliente ?>">