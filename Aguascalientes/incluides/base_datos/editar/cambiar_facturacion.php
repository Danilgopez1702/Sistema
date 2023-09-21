<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
require("../conexion/conexion.php");

$nombre_usuario = $_SESSION['nombre'];
$id_usuario = $_SESSION['id_usuario'];

$id_cliente = $_GET['id'];
$estado = $_GET['estado'];

$consulta = mysqli_query($conexion,"SELECT `numero_cliente` FROM `cliente` WHERE `id_cliente` = '$id_cliente'");
$num_consulta = mysqli_fetch_assoc($consulta);
$num_cliente = $num_consulta['numero_cliente'];

if($estado == 1){
    $edit = mysqli_query($conexion,"INSERT INTO `facturacion`(`id_cliente`, `status_facturacion`) VALUES ('$id_cliente','$estado')"); 
    $edit_fact = mysqli_query($conexion,"UPDATE `cliente` SET `factura`= 2 WHERE `id_cliente` = '$id_cliente'");  
    
    $mensajes = 'El usuario: ' . $nombre_usuario . ' activo la facturacion del cliente: ' . $num_cliente;
    $log = mysqli_query($conexion, "INSERT INTO `log`(`accion_log`, `id_usuario`, `id_cliente`) VALUES ('$mensajes,'$id_usuario','$id_cliente')");

}else if($estado == 2){
	$edit = mysqli_query($conexion,"UPDATE `facturacion` SET `status_facturacion`='$estado' WHERE `id_cliente` = '$id_cliente'");   
	$edit_fact = mysqli_query($conexion,"UPDATE `cliente` SET `factura`= 1 WHERE `id_cliente` = '$id_cliente'");   

    $mensajes = 'El usuario: ' . $nombre_usuario . ' desactivo la facturacion del cliente: ' . $num_cliente;
    $log = mysqli_query($conexion, "INSERT INTO `log`(`accion_log`, `id_usuario`, `id_cliente`) VALUES ('$mensajes,'$id_usuario','$id_cliente')");
}
?>
<meta http-equiv="refresh" content="1; url=../../admin/clientes/consultar/caratula.php?id=<?php echo $id_cliente ?>">
<?php
}