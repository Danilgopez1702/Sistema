<?php
session_start();
if ($_SESSION['rol'] == 3132 ) {
require("../conexion/conexion.php");

$id_mk = $_POST['editar_id_mk'];
$nombre = $_POST['editar_nombre_mk'];
$ip = $_POST['editar_ip_mk'];
$user = $_POST['editar_user_mk'];
$pass = $_POST['editar_pass_mk'];
$zona = $_POST['editar_zona_mk'];

if($zona == "Cede"){
    $zona2 = 1;
}

$update = mysqli_query($conexion,"UPDATE `mk` SET `nombre_mk`='$nombre',`ip_mk`='$ip',`user_mk`='$user',
`pass_mk`='$pass',`zona_mk`='$zona2' WHERE `id_mk` = '$id_mk'");


header("location: ../../admin/mk/ver_mk/mk.php");
}