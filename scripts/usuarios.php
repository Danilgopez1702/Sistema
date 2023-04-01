<?php
require("conexion.php");
require("conexion_antiguo.php");

$sql_usuario = mysqli_query($con, "SELECT `idUsuarios`, `tipo`, `activo`, `usuario`, `pass`, `nombre` FROM `usuarios`");
$usuario_num = mysqli_num_rows($sql_usuario);

if ($usuario_num > 0) {
	while ($data = mysqli_fetch_assoc($sql_usuario)) {

		$tipo = $data['tipo'];
		$activo = $data['activo'];
		$usuario = $data['usuario'];
		$pass = $data['pass'];


		$sql = mysqli_query($conexion, "INSERT INTO `usuario`( `tipo_usuario`, `usuario_usuario`, `pass_usuario`, `status_usuario`, `zona_usuario`)
		VALUES ($tipo,'$usuario','$pass',$activo,1)");

		var_dump($sql);
	}
}
?>