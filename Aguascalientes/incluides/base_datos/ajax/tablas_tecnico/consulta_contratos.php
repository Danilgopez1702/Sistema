<?php
include_once '../../conexion/conexion.php';
session_start();
$reparador = $_SESSION['id_usuario'];
$consulta = mysqli_query($conexion, "SELECT * FROM `cliente` WHERE `por_revisar` = 2 and `vendedor_cliente` = '$reparador'");
$datos = mysqli_num_rows($consulta);
$data = array();

while ($info = mysqli_fetch_assoc($consulta)) {

    $id_cliente = $info['id_cliente'];
    $onu_cliente = $info['onu_cliente'];
    $bandera_cliente = $info['bandera_cliente'];
    $numero_cliente = $info['numero_cliente'];
    $apellido_p_cliente = $info['apellido_p_cliente'];
    $apellido_m_cliente = $info['apellido_m_cliente'];
    $nombre_cliente = $info['nombre_cliente'];

    $data[] = [
        'id_cliente' => $id_cliente,
        'onu_cliente' => $onu_cliente,
        'bandera_cliente' => $bandera_cliente,
        'numero_cliente' => $numero_cliente,
        'apellido_p_cliente' => $apellido_p_cliente,
        'apellido_m_cliente' => $apellido_m_cliente,
        'nombre_cliente' => $nombre_cliente
    ];
}


print json_encode($data, JSON_UNESCAPED_UNICODE); //envio el array final el formato json a AJAX
$conexion = null;
