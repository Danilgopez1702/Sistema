<?php
require("../../../base_datos/conexion/conexion.php");
date_default_timezone_set('America/Mazatlan');


$query_activos = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '0'");
$activos = mysqli_num_rows($query_activos);

$query_vencer = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '1'");
$vencer = mysqli_num_rows($query_vencer);

$query_morosos = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '2'");
$morosos = mysqli_num_rows($query_morosos);

$query_inactivos = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '3'");
$inactivos = mysqli_num_rows($query_inactivos);

$query_recuperado = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '4'");
$recuperado = mysqli_num_rows($query_recuperado);

$query_sinrec = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '5'");
$sinrec = mysqli_num_rows($query_sinrec);

$query_cancelado = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '6'");
$cancelado = mysqli_num_rows($query_cancelado);

$query_dificil = mysqli_query($conexion, "SELECT * FROM cliente WHERE `status_cliente` = '7'");
$dificil = mysqli_num_rows($query_dificil);

$query_reparaciones = mysqli_query($conexion, "SELECT * FROM `reportes` WHERE `tipo_reportes` = 1");
$reparaciones = mysqli_num_rows($query_reparaciones);

$query_migraciones = mysqli_query($conexion, "SELECT * FROM `reportes` WHERE `tipo_reportes` = 2");
$migraciones = mysqli_num_rows($query_migraciones);

$query_ventas = mysqli_query($conexion, "SELECT * FROM `reportes` WHERE `tipo_reportes` = 3");
$ventas = mysqli_num_rows($query_ventas);

$query_cambio = mysqli_query($conexion, "SELECT * FROM `reportes` WHERE `tipo_reportes` = 4");
$cambio = mysqli_num_rows($query_cambio);

$query_rev = mysqli_query($conexion, "SELECT * FROM `revisar` WHERE `status_revisar` = 1");
$rev = mysqli_num_rows($query_rev);

$query_rev2 = mysqli_query($conexion, "SELECT * FROM `revisar` WHERE `status_revisar` = 2");
$rev2 = mysqli_num_rows($query_rev2);

$query_en = mysqli_query($conexion, "SELECT * FROM `encuesta` WHERE `status_encuesta` = 1");
$en = mysqli_num_rows($query_en);

$query_en2 = mysqli_query($conexion, "SELECT * FROM `encuesta` WHERE `status_encuesta` = 2");
$en2 = mysqli_num_rows($query_en2);

$query_repo = mysqli_query($conexion, "SELECT * FROM `reportes` WHERE `status_reportes` = 1 and `tipo_reportes` = 1");
$rep = mysqli_num_rows($query_repo);
$segunda = 0;
$moroso =0;
if($rep > 0){
    while($data = mysqli_fetch_assoc($query_repo)){
		if($data['fecha_rechazo'] != '0000-00-00'){
			$segunda = $segunda + 1;
		}
		if($data['moroso_reportes'] == 2){
			$moroso = $moroso + 1;
		}
	}
}

?>