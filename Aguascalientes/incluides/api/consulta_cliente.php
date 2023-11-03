<?php
require("../base_datos/conexion/conexion.php");
header('Access-Control-Allow-Origin: *');

$numeroCliente = $_POST['numero_cliente'];
$nombre = $_POST['nombre_cliente'];
$apellidoPaterno = $_POST['paterno_cliente'];
$apellidoMaterno = $_POST['materno_cliente'];

// Construir la consulta con los criterios de busqueda
$query = "SELECT * FROM cliente WHERE numero_cliente LIKE '%$numeroCliente%' AND nombre_cliente LIKE '%$nombre%' 
AND apellido_p_cliente LIKE '%$apellidoPaterno%' AND apellido_m_cliente LIKE '%$apellidoMaterno%' LIMIT 1";

// Ejecutar el query
$result = mysqli_query($conexion, $query);
$consulta = mysqli_num_rows($result);
$cliente = mysqli_fetch_assoc($result);

$onu = $cliente['onu_cliente'];
$ont = $cliente['ont_cliente'];
$radio = $cliente['radio_cliente'];


//tipo: 1 = antena || 2 = onu  || 3 = ont
if ($consulta > 0) {

    if (!$onu && !$ont) {

        $cliente = [
            "1" => $cliente
        ];

        header('Content-type:application/json');
        echo json_encode($cliente, JSON_UNESCAPED_UNICODE);

    } else if (!$radio && !$ont) {

        $cliente = [
            "2" => $cliente
        ];

        header('Content-type:application/json');
        echo json_encode($cliente, JSON_UNESCAPED_UNICODE);

    } else if (!$radio && !$onu) {

        $cliente = [
            "3" => $cliente
        ];

        header('Content-type:application/json');
        echo json_encode($cliente, JSON_UNESCAPED_UNICODE);

    }

} else {
    $cliente = "error";

    header('Content-type:application/json');
    echo json_encode($cliente, JSON_UNESCAPED_UNICODE);

}
?>