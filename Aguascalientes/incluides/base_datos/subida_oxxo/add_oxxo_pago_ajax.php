<?php

require_once('../conexion/conexion.php');

try {
        $lugar = $_POST['lugar'];
        $fecha_pago = $_POST['fecha_pago'];
        // HORA DE PAGO 
        $hora = $_POST['hora'];
        // NUM DE CLIENTE
        $num_cliente = $_POST['num_cliente'];
        // MONTO DE PAGO 
        $monto = $_POST['monto'];

        // INSERTAMOS REGISTRO DE PAGO EN BDD
        $sql = mysqli_query($conexion, "INSERT INTO pagos (metodo, lugar, fecha, hora, num_cliente, monto) VALUES ('oxxo','$lugar','$fecha_pago','$hora','$num_cliente','$monto')");

        $result = mysqli_query($conexion, "SELECT * FROM `cliente` WHERE `numero_cliente` = '$num_cliente'");
        $row = mysqli_fetch_array($result);
        $status = $row["status_cliente"];
        $fecha_ultimo_corte = $row['fecha_corte'];
        $velocidad = $row['velocidad'];
        $no_antena = $row['radio'];
        $no_router = $row['router'];


        include('../../mikrotik/oxxo_cambiar.php');
/*
        // Reseteamos el bool del estado de cuenta enviado
        $sql_update_edoCuenta = "UPDATE clientes SET edoCuenta_enviado = 0 WHERE idClientes = '".$row['idClientes']."'";
        if (mysqli_query($con, $sql_update_edoCuenta)) {
            echo "";
        } else {
            echo "error: " . mysqli_error($con);
        }

        // Enviamos factura de pago si el cliente está habilitado para eso
        if ($row['factura'] == 1) {
            $idClientes = $row['idClientes'];
            include(dirname(__FILE__).'/phpmailer/enviar_factura_manual_activo.php');
        }

        // enviamos confirmación de pago
        include(dirname(__FILE__).'/mails/email_pago_ok.php');
 */
} catch(PDOException $e){
    echo "error: ".$sql . "<br>" . $e->getMessage();
}

$conn = null;

$executionTime = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];

//sleep(5);

echo "tiempo: ".$executionTime;

/*header("Location: ../oxxo_tabla.php");
die();*/

?>