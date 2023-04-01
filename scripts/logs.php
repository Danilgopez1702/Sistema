<?php
require("conexion.php");
require("conexion_antiguo.php");

$sql_log = mysqli_query($con, "SELECT * FROM `log` where idLog like '%796%'");
$log = mysqli_fetch_assoc($sql_log);

$accion = $log['accion'];
$sql = $log['sql'];
$usuario = $log['usuario'];
$timestamp = $log['timestamp'];

for ($i = 1; $i <= 15000; $i++) {
    $sql3 = mysqli_query($conexion, "INSERT INTO `log`(`accion`, `sql`, `usuario`, `timestamp`) 
    VALUES ('$accion','$sql','$usuario','$timestamp')");

    var_dump($sql3);
}
