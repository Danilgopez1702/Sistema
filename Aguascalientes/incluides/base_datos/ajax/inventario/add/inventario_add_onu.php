<?php
session_start();
//aqui se pide la conexion a la bd
include "../../../conexion/conexion.php";
$id_usuario =  $_SESSION['nombre'];
//estos son las variables extraidas mediante el metodo post 
$numonu = strtoupper($_POST['numonu']);
$nummac = $_POST['nummac'];
$fallo = $_POST['fallo'];
//primero se hace la consulta para ver si existe el dato
$sql_select = mysqli_query($conexion, "SELECT * FROM `inventario` WHERE `onu_inventario`= '$numonu'");
$numero = mysqli_num_rows($sql_select);
if($numero>=1){
    //si es mayor a 1 indica que ya existe el dato en la bd
    //el echo error es para mandar llamar en ad_inv_onu.js la alerta (temporal) tipo error
echo "error";
}else{
    //si no es mayor a 1 se inserta los datos que estan en el post
$sql = mysqli_query($conexion, "INSERT INTO `inventario`(`onu_inventario`,`id_instalador`, `mac_inventario`,`fallo_inventario`, `tipo_inventario``id_zona`)
 VALUES ('$numonu', 2,'$nummac','$fallo',1,1)");
//el valor mensajes es para llamarlo en el log como string
$mensajes ='Se agrego el equipo con onu '.$numonu .' y con mac'.$nummac.' al inventario';
//esta consulta inserta valores en el historial (logs)
$sql_log = mysqli_query($conexion, "INSERT INTO `log`( `accion_log`, `nombre_usuario`)
 VALUES ('$mensajes' ,'$id_usuario')");
    //el echo error es para mandar llamar en ad_inv_onu.js la alerta (temporal) tipo success
echo "success";
}


?>