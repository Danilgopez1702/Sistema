<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
	require("../conexion/conexion.php");
	$id = $_GET['id'];

	$sql = mysqli_query($conexion, "DELETE FROM `zonafibra` WHERE `id_zonafibra` = '$id'");

	var_dump($sql);
	mysqli_close($conexion);

	header("location: ../../admin/olt/ver_olt/olt.php");
}
