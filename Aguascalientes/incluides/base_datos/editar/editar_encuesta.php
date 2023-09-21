<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
require("../conexion/conexion.php");


$nombre_usuario = $_SESSION['nombre'];
$id_usuario = $_SESSION['id_usuario'];

$id = $_POST['id'];
$tipo = $_POST['tipo'];

if($tipo == 1){
    $razon = 'Cliente Mala Informacion';
}else if($tipo == 2){
    $razon ='Numeros Erroneos';
}else if($tipo == 3){
    $razon = 'Numero Fuera del Area de Servicio';
}else if(!$tipo){
    $razon = $_POST['razon'];
}
$sql = mysqli_query($conexion, "UPDATE `encuesta` SET `status_encuesta`= 3,`razon_encuesta`='$razon' WHERE `id_cliente` =  '$id'"); 

$mensajes = 'El usuario: ' . $nombre_usuario . ' edito la encuesta con id: ' . $id;
$log = mysqli_query($conexion, "INSERT INTO `log`(`accion_log`, `id_usuario`, `id_cliente`) VALUES ('$mensajes,'$id_usuario','$id_cliente')");

header("location: ../../admin/clientes/encuestas/caratula_encuesta.php?id=$id");
}
?>