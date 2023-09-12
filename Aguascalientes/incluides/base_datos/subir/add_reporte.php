<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
    if (empty($_POST['nombre']) || empty($_POST['botes']) || empty($_POST['tipo']) || empty($_POST['ip'])) {
    } else {
        require("../conexion/conexion.php");
        $id_usuario =  $_SESSION['nombre'];

        $consulta = mysqli_query($conexion, "SELECT * FROM `reportes` ORDER BY id_reportes ASC");
        $consultas = mysqli_fetch_assoc($consulta);
		$reportes = $consultas['no_reporte_reportes'];
		$num_repo = substr($reportes, 0, 4);
		$prox_repo = substr($reportes, 2);
		$p_repo = intval($prox_repo);
		$p_repo = $p_repo +1;

		if(strlen ($p_repo) == 4){
			$repo_str = (string)$p_repo;
			$numero_reporte = '000000' . $repo_str;
		}else if(strlen ($p_repo) == 5){
			$repo_str = (string)$p_repo;
			$numero_reporte = '00000' . $repo_str;
		}else if(strlen ($p_repo) == 6){
			$repo_str = (string)$p_repo;
			$numero_reporte = '0000' . $repo_str;
		}else if(strlen ($p_repo) == 7){
			$repo_str = (string)$p_repo;
			$numero_reporte = '000' . $repo_str;
		}else if(strlen ($p_repo) == 8){
			$repo_str = (string)$p_repo;
			$numero_reporte = '00' . $repo_str;
		}else if(strlen ($p_repo) == 9){
			$repo_str = (string)$p_repo;
			$numero_reporte = '0' . $repo_str;
		}else if(strlen ($p_repo) == 10){
			$repo_str = (string)$p_repo;
			$numero_reporte = $repo_str;
		}

        $id = $_POST['id'];
        $tipo = $_POST['tipo'];
        $fecha = $_POST['fecha'];
        $asignacion = $_POST['asignacion'];
        $reparador = $_POST['reparador'];
        $reporte = $_POST['reporte'];
        

        $sql = mysqli_query($conexion, "INSERT INTO `reportes`(`status_reportes`, `id_cliente`, `no_reporte_reportes`,  `fecha_creacion`, `tipo_reportes`, `mensaje_reportes`, `id_usuario`,
         `fecha_reportes`, `id_reparador`) VALUES ( 1, '$id', '$numero_reporte','$fecha', '$tipo', '$reporte', '$id_usuario', '$asignacion', '$reparador')");

        mysqli_close($conexion);

		if($tipo == 1){
			header("location: ../../admin/reportes/caratula/reparaciones.php?id=".$id);
		}else if($tipo == 2){
			header("location: ../../admin/reportes/caratula/migraciones.php?id=".$id);
		}else if($tipo == 4){
			header("location: ../../admin/reportes/caratula/domicilio.php?id=".$id);
		}
    }
}
