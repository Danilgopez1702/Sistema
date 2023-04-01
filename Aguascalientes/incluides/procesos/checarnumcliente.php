<?php
require("../base_datos/conexion/conexion.php");
$num = $_POST['num_cliente'];
$sql_id = mysqli_query($conexion, "SELECT * FROM `cliente` WHERE numero_cliente = '$num'");
$extraccion_id = mysqli_num_rows($sql_id);

//ya hay contrato con ese num de cliente
if ($extraccion_id > 0) { 
	echo "error2";
} else {
	echo "ok";
}
