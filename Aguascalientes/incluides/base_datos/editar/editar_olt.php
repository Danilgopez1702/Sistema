<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
	require("../conexion/conexion.php");
	$id_usuario =  $_SESSION['nombre'];

	//traemos la info. del modal
	$id_zonafibra = $_POST['editar_id_zonafibra'];
	$nombre_zonafibra = $_POST['editar_nombre_zonafibra'];
	$botes_zonafibra = $_POST['editar_botes_zonafibra'];
	$puertos_zonafibra = $_POST['editar_puertos_zonafibra'];
	$equipo_zonafibra = $_POST['editar_equipo_zonafibra'];
	$ip_zonafibra = $_POST['editar_ip_zonafibra'];

	if ($equipo_zonafibra == "Gpon") {
		$estatus = 1;
	} else if ($equipo_zonafibra == "Epon") {
		$estatus = 2;
	}

	//Se realiza la consulta para registrar los movimientos
	$sql_consulta = mysqli_query($conexion, "SELECT * FROM `zonafibra` WHERE `id_zonafibra` = '$id_zonafibra'");
	$consulta = mysqli_fetch_assoc($sql_consulta);

	$antes_nombre_zonafibra = $consulta['nombre_zonafibra'];
	$antes_botes_zonafibra = $consulta['botes_zonafibra'];
	$antes_puertos_zonafibra = $consulta['puertos_zonafibra'];
	$antes_equipo_zonafibra = $consulta['equipo_zonafibra'];
	$antes_ip_zonafibra = $consulta['ip_zonafibra'];

	if ($nombre_zonafibra != $antes_nombre_zonafibra) {
		$mensaje = 'Se cambio el nombre de la OLT, de ' . $antes_nombre_zonafibra . ' a ' . $nombre_zonafibra;
		//agreagar a log
		$sql_log = mysqli_query($conexion, "INSERT INTO `log`( `accion_log`, `id_usuario`)
                                        VALUES ('$mensaje' ,'$id_usuario')");
	} else if ($botes_zonafibra != $antes_botes_zonafibra) {
		$mensaje = 'Se cambiaron los botes de ' . $nombre_zonafibra;
		//agreagar a log
		$sql_log = mysqli_query($conexion, "INSERT INTO `log`( `accion_log`, `id_usuario`)
                                        VALUES ('$mensaje' ,'$id_usuario')");
	} else if ($puertos_zonafibra != $antes_puertos_zonafibra) {
		$mensaje = 'Se cambiaron los puertos de ' . $nombre_zonafibra;
		//agreagar a log
		$sql_log = mysqli_query($conexion, "INSERT INTO `log`( `accion_log`, `id_usuario`)
                                        VALUES ('$mensaje' ,'$id_usuario')");
	} else if ($equipo_zonafibra != $antes_equipo_zonafibra) {
		$mensaje = 'Se cambio el equipo ' . $nombre_zonafibra . 'de ' . $antes_equipo_zonafibra . ' a ' . $equipo_zonafibra;
		//agreagar a log
		$sql_log = mysqli_query($conexion, "INSERT INTO `log`( `accion_log`, `id_usuario`)
                                        VALUES ('$mensaje' ,'$id_usuario')");
	} else if ($ip_zonafibra != $antes_ip_zonafibra) {
		$mensaje = 'Se cambio la ip de ' . $nombre_zonafibra . 'de ' . $ip_zonafibra . ' a ' . $antes_ip_zonafibra;
		//agreagar a log
		$sql_log = mysqli_query($conexion, "INSERT INTO `log`( `accion_log`, `id_usuario`)
                                        VALUES ('$mensaje' ,'$id_usuario')");
	}

	//Se Realiza la Actualizacion
	$sql = mysqli_query($conexion, "UPDATE `zonafibra` SET `nombre_zonafibra`='$nombre_zonafibra', `botes_zonafibra`='$botes_zonafibra', `puertos_zonafibra`='$puertos_zonafibra',`equipo_zonafibra`='$estatus',
	`ip_zonafibra`='$ip_zonafibra' WHERE `id_zonafibra` = '$id_zonafibra' ");
	var_dump($sql);
	header("location: ../../admin/olt/ver_olt/olt.php");
}
