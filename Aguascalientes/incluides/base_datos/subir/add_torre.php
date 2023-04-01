<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
    if (empty($_POST['torre']) || empty($_POST['nombre']) || empty($_POST['direccion']) || empty($_POST['cfe'])) {
    } else {
        require("../conexion/conexion.php");


        $torre = $_POST['torre'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $cfe = $_POST['cfe'];

        $sql = mysqli_query($conexion, "INSERT INTO `torres`(`lugar_torre`, `cliente_torre`, `direccion_torre`, `cfe_torre`) 
        VALUES ('$torre','$nombre','$direccion','$cfe')");

        var_dump($sql);
        mysqli_close($conexion);

        header("location: ../../admin/torres/ver_torres/telefonos_torres.php");
    }
}
