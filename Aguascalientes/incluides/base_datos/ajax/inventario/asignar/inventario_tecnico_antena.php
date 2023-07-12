<?php
session_start();
//aqui se pide la conexion a la bd
include "../../../conexion/conexion.php";
$id_usuario =  $_SESSION['id_usuario'];
//estos son las variables extraidas mediante el metodo post 
$numradio = strtoupper($_POST['numradio']);
$instalador_antena = $_POST['instalador_antena'];
//primero se hace la consulta para ver si existe el dato
$sql_select = mysqli_query($conexion, "SELECT   `radio_inventario`, `id_instalador`, `tipo_inventario` FROM `inventario` WHERE `radio_inventario`= '$numradio' AND `id_instalador` = 2 ");
$sql_select2 = mysqli_query($conexion, "SELECT   `radio_inventario`, `id_instalador`, `tipo_inventario` FROM `inventario` WHERE `radio_inventario`= '$numradio' AND `id_instalador` != 2 ");
$numero = mysqli_num_rows($sql_select);
$numero2 = mysqli_num_rows($sql_select2);

if($numero >= 1){
    $sql_tecnico = mysqli_query($conexion,"SELECT * FROM `usuario` WHERE `id_usuario` = '$instalador_antena' ");
    $tecnico = mysqli_fetch_assoc($sql_tecnico);
    $nombre = $tecnico['usuario_usuario'];
    $sql = mysqli_query($conexion, "UPDATE `inventario` SET `id_instalador`= $instalador_antena WHERE `radio_inventario` = '$numradio' ");
    echo "success";
    $mensaje = 'Se asigno la onu '. $instalador_antena . ' al tecnico '.$nombre;
    $sql_log = mysqli_query($conexion, "INSERT INTO `log`( `accion_log`, `id_usuario`)
    VALUES ( '$mensaje' ,'$id_usuario')");

}
else if ($numero2 >= 1){
    echo "error";
}else{
    echo "error2";
}


?>