<?php
require("../base_datos/conexion/conexion.php");
header('Access-Control-Allow-Origin: *');

$tecnico = $_POST['tecnico'];
$tipo = $_POST['tipo'];
//tipo: 1 = antena |||  2 = onu  |||   3 = ont
$response = [];

if ($tipo == 1) {
    $query_antena = mysqli_query($conexion, "SELECT `radio_inventario` FROM `inventario` WHERE tipo_inventario = 3 && fallo_inventario = 2 && asignado_inventario !=2 && id_instalador = '$tecnico'");
    while ($row = mysqli_fetch_assoc($query_antena)) {
        $response[] = $row;
    }
} elseif ($tipo == 2) {

    $mac_onu = [];
    $pon_onu = [];
    $bandera_onu = [];

    $query_mac_onu = mysqli_query($conexion, "SELECT `mac_inventario` FROM `inventario` WHERE tipo_inventario = 1 && fallo_inventario = 2 && asignado_inventario !=2 && id_instalador = '$tecnico'");
    while ($row = mysqli_fetch_assoc($query_mac_onu)) {
        $mac_onu[] = $row;
    }

    $query_pon_onu = mysqli_query($conexion, "SELECT `onu_inventario` FROM `inventario` WHERE tipo_inventario = 1 && fallo_inventario = 2 && asignado_inventario !=2 && id_instalador = '$tecnico'");
    while ($row = mysqli_fetch_assoc($query_pon_onu)) {
        $pon_onu[] = $row;
    }

    $query_bandera_onu = mysqli_query($conexion, "SELECT `bandera_inventario` FROM `inventario` WHERE tipo_inventario = 4 && fallo_inventario = 2 && asignado_inventario !=2 && id_instalador = '$tecnico'");
    while ($row = mysqli_fetch_assoc($query_bandera_onu)) {
        $bandera_onu[] = $row;
    }
    $response = [
        'mac_onu' => $mac_onu,
        'pon_onu' => $pon_onu,
        'bandera' => $bandera_onu
    ];
} elseif ($tipo == 3) {

    $mac_ont = [];
    $pon_ont = [];
    $bandera_ont = [];

    $query_mac_ont = mysqli_query($conexion, "SELECT `mac_ont_inventario` FROM `inventario` WHERE tipo_inventario = 2 && fallo_inventario = 2 && asignado_inventario !=2 && id_instalador = '$tecnico'");
    while ($row = mysqli_fetch_assoc($query_mac_ont)) {
        $mac_ont[] = $row;
    }

    $query_pon_ont = mysqli_query($conexion, "SELECT `ont_inventario` FROM `inventario` WHERE tipo_inventario = 2 && fallo_inventario = 2 && asignado_inventario !=2 && id_instalador = '$tecnico'");
    while ($row = mysqli_fetch_assoc($query_pon_ont)) {
        $pon_ont[] = $row;
    }

    $query_bandera_ont = mysqli_query($conexion, "SELECT `bandera_inventario` FROM `inventario` WHERE tipo_inventario = 4 && fallo_inventario = 2 && asignado_inventario !=2 && id_instalador = '$tecnico'");
    while ($row = mysqli_fetch_assoc($query_bandera_ont)) {
        $bandera_ont[] = $row;
    }
    $response = [
        'mac_ont' => $mac_ont,
        'pon_ont' => $pon_ont,
        'bandera' => $bandera_ont
    ];
} else {
    $response = "no entra";
}

// Convertir el array en JSON y enviarlo
header('Content-type: application/json');
echo json_encode($response, JSON_UNESCAPED_UNICODE);
?>