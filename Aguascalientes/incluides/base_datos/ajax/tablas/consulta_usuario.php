<?php
include_once '../../conexion/conexion.php';

$consulta = mysqli_query($conexion, "SELECT * FROM usuario ORDER BY id_usuario");

$data = array();

while ($datas = mysqli_fetch_assoc($consulta)) {
	$id_usuario = $datas['id_usuario'];
	if($datas['tipo_usuario'] == 3132) {
		$tipo_usuario = "Super Usuario";
	}else if($datas['tipo_usuario'] == 1) {
		$tipo_usuario = "Administrador";
	}else if($datas['tipo_usuario'] == 2) {
		$tipo_usuario = "Atencion a Clientes";
	}else if($datas['tipo_usuario'] == 3) {
		$tipo_usuario = "Cobranza";
	}else if($datas['tipo_usuario'] == 4) {
		$tipo_usuario = "Tecnicos";
	}
	$usuario_usuario = $datas['usuario_usuario'];
	$pass_usuario = $datas['pass_usuario'];
	if($datas['status_usuario'] == 1){
		$status_usuario = "Activo";
	}elseif($datas['status_usuario'] == 3){
		$status_usuario = "Tecnico Deshabilitado";
	}else if($datas['status_usuario'] == 2){
		$status_usuario = "Inactivo";
	}

	$data[] = [
		'id_usuario' => $id_usuario,
		'tipo_usuario' => $tipo_usuario,
		'usuario_usuario' => $usuario_usuario,
		'pass_usuario' => $pass_usuario,
		'status_usuario' => $status_usuario
	];
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //envio el array final el formato json a AJAX