<?php
session_start();
if ($_SESSION['rol'] == 3132) {
    if (empty($_POST['nombre']) || empty($_POST['ip']) || empty($_POST['user']) || empty($_POST['pass'])) {
    } else {
        require("../conexion/conexion.php");


        $nombre = $_POST['nombre'];
        $ip = $_POST['ip'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $sql = mysqli_query($conexion, "INSERT INTO `mk`(`nombre_mk`, `ip_mk`, `user_mk`, `pass_mk`, `puerto_mk`, `zona_mk`) 
        VALUES ('$nombre','$ip','$user','$pass',2089,1)");

        mysqli_close($conexion);

        header("location: ../../admin/mk/ver_mk/mk.php");
    }
}
