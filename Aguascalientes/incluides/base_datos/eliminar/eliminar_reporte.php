<?php
session_start();
if ($_SESSION['rol'] == 3132) {
    require("../conexion/conexion.php");
    $numero = $_POST['numero'];

    $consulta_cliente = mysqli_query($con, "SELECT `id_cliente` FROM `cliente` WHERE `numero_cliente` = '$numero'");
    $extraer_cliente = mysqli_fetch_assoc($consulta_cliente);
    $id = $extraer_cliente["id_cliente"];

    if ($extraer_cliente >= 1) {

        $update_reportes = mysqli_query($con, "UPDATE `reportes` SET `status_reportes`='0',`activo_reportes`='1' WHERE `id_cliente` = '$id'");
        echo "Ok";

    } else {

        echo "error2";

    }

}
?>