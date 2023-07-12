<?php
session_start();
//aqui se pide la conexion a la bd
include "../../../conexion/conexion.php";
$id_usuario =  $_SESSION['id_usuario'];
//estos son las variables extraidas mediante el metodo post 
$numbandera = strtoupper($_POST['numbandera']);
$instalador_bandera = $_POST['instalador_bandera'];
//primero se hace la consulta para ver si existe el dato
$sql_select = mysqli_query($conexion, "SELECT  * FROM `inventario` WHERE `bandera_inventario`= '$numbandera' AND `id_instalador` = 2 ");
$sql_select2 = mysqli_query($conexion, "SELECT * FROM `inventario` WHERE `bandera_inventario`= '$numbandera' AND `id_instalador` != 2 ");
$numero = mysqli_num_rows($sql_select);
$numero2 = mysqli_num_rows($sql_select2);

if($numero>=1 && $numero2 < 1){   
    $sql_tecnico = mysqli_query($conexion,"SELECT * FROM `usuario` WHERE `id_usuario` = '$instalador_bandera' ");
    $tecnico = mysqli_fetch_assoc($sql_tecnico);
    $nombre = $tecnico['usuario_usuario'];
    $sql = mysqli_query($conexion, "UPDATE `inventario` SET `id_instalador`= $instalador_bandera WHERE `bandera_inventario` = '$numbandera' ");
    echo "success";
    $mensaje = 'Se asigno la onu '. $instalador_bandera . ' al tecnico '.$nombre;
    $sql_log = mysqli_query($conexion, "INSERT INTO `log`( `accion_log`, `id_usuario`)
    VALUES ( '$mensaje' ,'$id_usuario')");

}
else if ($numero2>=1){
    echo "error";
}else{
    echo "error2";
}


?>