<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
require("../conexion/conexion.php");

$id_cliente = $_GET['id'];
$estado = $_GET['estado'];

if($estado == 1){
    $edit = mysqli_query($conexion,"INSERT INTO `facturacion`(`id_cliente`, `status_facturacion`) VALUES ('$id_cliente','$estado')"); 
    $edit_fact = mysqli_query($conexion,"UPDATE `cliente` SET `factura`= 2 WHERE `id_cliente` = '$id_cliente'");  
}else if($estado == 2){
	$edit = mysqli_query($conexion,"UPDATE `facturacion` SET `status_facturacion`='$estado' WHERE `id_cliente` = '$id_cliente'");   
	$edit_fact = mysqli_query($conexion,"UPDATE `cliente` SET `factura`= 1 WHERE `id_cliente` = '$id_cliente'");   
}
?>
<meta http-equiv="refresh" content="1; url=../../admin/clientes/consultar/caratula.php?id=<?php echo $id_cliente ?>">
<?php
}