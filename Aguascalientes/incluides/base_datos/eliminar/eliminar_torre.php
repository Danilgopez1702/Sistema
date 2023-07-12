<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
    require("../conexion/conexion.php");
    $id = $_GET['id'];

    $sql = mysqli_query($conexion, "DELETE FROM `torres` WHERE `id_torre` = '$id'");

    var_dump($sql);
    mysqli_close($conexion);

    header("location: ../../admin/torres/ver_torres/telefonos_torres.php");
}
