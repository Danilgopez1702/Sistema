<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
require("../conexion/conexion.php");

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

header("location: ../../admin/clientes/encuestas/caratula_encuesta.php?id=$id");
}
?>