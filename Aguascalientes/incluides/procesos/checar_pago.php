<?php
require("../conexion/conexion.php");

$auto = $_POST['auto'];

$consulta_manual = mysqli_query($conexion, "SELECT * FROM `pago_manual` WHERE `Autorizacion` = '$auto'");
$cont = mysqli_num_rows($consulta_manual);

if (!$cont) {
    echo "ok";
} else {
    echo "error2";
}