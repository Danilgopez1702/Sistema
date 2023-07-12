<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
    if (empty($_POST['nombre']) || empty($_POST['botes']) || empty($_POST['tipo']) || empty($_POST['ip'])) {
    } else {
        require("../conexion/conexion.php");


        $nombre = $_POST['nombre'];
        $botes = $_POST['botes'];
        $puertos = $_POST['puertos'];
        $tipo = $_POST['tipo'];
        $ip = $_POST['ip'];

        $sql = mysqli_query($conexion, "INSERT INTO `zonafibra`(`nombre_zonafibra`, `botes_zonafibra`, `puertos_zonafibra`, `equipo_zonafibra`, `ip_zonafibra`, `zona_zonafibra`)
         VALUES ('$nombre','$botes','$puertos','$tipo','$ip',1)");

        mysqli_close($conexion);

        header("location: ../../admin/olt/ver_olt/olt.php");
    }
}
