<?php
include_once '../../conexion/conexion.php';

session_start();
$reparador = $_SESSION['id_usuario'];

$query = "SELECT * FROM `cliente` WHERE `por_revisar` = 2 and `vendedor_cliente` = '$reparador'";
$consulta = mysqli_query($conexion, $query);

if (!$consulta) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

$data = array();

while ($info = mysqli_fetch_assoc($consulta)) {
    $id_cliente = $info['id_cliente'];
    $status_cliente = $info['status_cliente'];
    $ont_cliente = $info['ont_cliente'];
    $onu_cliente = $info['onu_cliente'];
    $bandera_cliente = $info['bandera_cliente'];
    $numero_cliente = $info['numero_cliente'];
    $apellido_p_cliente = $info['apellido_p_cliente'];
    $apellido_m_cliente = $info['apellido_m_cliente'];
    $nombre_cliente = $info['nombre_cliente'];

    $data[] = [
        'id_cliente' => $id_cliente,
        'status_cliente' => $status_cliente,
        'ont_cliente' => $ont_cliente,
        'onu_cliente' => $onu_cliente,
        'bandera_cliente' => $bandera_cliente,
        'numero_cliente' => $numero_cliente,
        'apellido_p_cliente' => $apellido_p_cliente,
        'apellido_m_cliente' => $apellido_m_cliente,
        'nombre_cliente' => $nombre_cliente
    ];
}
mysqli_free_result($consulta); // Liberar los resultados
$conexion->close(); // Cerrar la conexión

print json_encode($data, JSON_UNESCAPED_UNICODE); // Enviar respuesta JSON
?>