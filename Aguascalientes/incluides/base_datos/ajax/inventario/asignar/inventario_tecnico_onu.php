<?php
session_start();
//aqui se pide la conexion a la bd
include "../../../conexion/conexion.php";
$id_usuario =  $_SESSION['nombre'];
//estos son las variables extraidas mediante el metodo post 
$nummac = strtoupper($_POST['nummac']);
$instalador_onu = $_POST['instalador_onu'];
//primero se hace la consulta para ver si existe el dato
$sql_select = mysqli_query($conexion, "SELECT `mac_inventario`, `id_instalador`, `tipo_inventario` FROM `inventario` WHERE `mac_inventario`= '$nummac' AND `id_instalador` = 0 ");
$sql_select2 = mysqli_query($conexion, "SELECT `mac_inventario`, `id_instalador`, `tipo_inventario` FROM `inventario` WHERE `mac_inventario`= '$nummac' AND `id_instalador` != 0 ");
$numero = mysqli_num_rows($sql_select);
$numero2 = mysqli_num_rows($sql_select2);

if($numero>=1){
    $sql = mysqli_query($conexion, "UPDATE `inventario` SET `id_instalador`= $instalador_onu WHERE `mac_inventario` = '$nummac' ");
    echo "success";
    $mensaje = 'Se asigno la onu '. $nummac . ' al tecnico con id '.$instalador_onu;
    $sql_log = mysqli_query($conexion, "INSERT INTO `log`( `accion_log`, `nombre_usuario`)
    VALUES ( '$mensaje' ,'$id_usuario')");
}
else if ($numero2>=1){
    echo "error";
}else{
    echo "error2";
}
?>