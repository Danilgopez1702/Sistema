<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
	require("../conexion/conexion.php");
	$id = $_GET['id'];
	$in = $_GET['in'];

	$sql = mysqli_query($conexion, "DELETE FROM `reportes` WHERE `id_reportes` = '$id'");

	var_dump($sql);
	mysqli_close($conexion);

	if ($in == 1) {
		header("location: ../../admin/reportes/visualizacion/ver_reparaciones.php");
	}
	if ($in == 2) {
		header("location: ../../admin/reportes/visualizacion/ver_migraciones.php");
	}
	if ($in == 3) {
		header("location: ../../admin/reportes/visualizacion/ver_ventas.php");
	}
	if ($in == 4) {
		header("location: ../../admin/reportes/visualizacion/ver_migraciones.php");
	}
	
}
