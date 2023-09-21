<?php
session_start();
if ($_SESSION['rol'] == 3132) {
	require("../conexion/conexion.php");
	$id = $_GET['id'];

	$sql = mysqli_query($conexion, "DELETE FROM `mk` WHERE `id_mk` = '$id'");

	var_dump($sql);
	mysqli_close($conexion);

	header("location: ../../admin/mk/ver_mk/mk.php");
}
