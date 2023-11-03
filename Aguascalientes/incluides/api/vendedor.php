<?php
require("../base_datos/conexion/conexion.php");
header('Access-Control-Allow-Origin: *');

$clave = mysqli_real_escape_string($conexion, md5($contra));
$query = mysqli_query($conexion, "SELECT `id_usuario`, `usuario_usuario` FROM `usuario` WHERE `tipo_usuario` = 4 or `tipo_usuario` = 5");
$resultado = mysqli_num_rows($query);

if ($resultado > 0) {
    $datos = mysqli_fetch_assoc($query);
    $id = $datos['id_usuario'];
    $nombre = $datos['usuario_usuario'];
    
    $vendedor = [
    "id"  =>  $id,
    "nombre"  =>  $nombre
    ];
    
}else{
    $vendedor = "error";
}
header('Content-type:application/json');
echo json_encode( $vendedor,JSON_UNESCAPED_UNICODE );

?>