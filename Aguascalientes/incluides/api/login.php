<?php
require("../base_datos/conexion/conexion.php");
header('Access-Control-Allow-Origin: *');

$usuario = $_POST['user'];
$contra = $_POST['pass'];

$clave = mysqli_real_escape_string($conexion, md5($contra));
$query = mysqli_query($conexion, "SELECT `id_usuario`, `usuario_usuario` FROM `usuario` WHERE `usuario_usuario` = '$usuario' and `md5` = '$clave'");
$resultado = mysqli_num_rows($query);

if ($resultado > 0) {
    $datos = mysqli_fetch_assoc($query);
    $id = $datos['id_usuario'];
    $nombre = $datos['usuario_usuario'];
    
    $login = [
    "id"  =>  $id,
    "nombre"  =>  $nombre
    ];
    
}else{
    $login = "error";
}
header('Content-type:application/json');
echo json_encode( $login,JSON_UNESCAPED_UNICODE );

?>