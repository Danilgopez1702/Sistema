<?php
include_once "../../base_datos/conexion/conexion.php";
//aqui se pone el nombre que se le va a poner eal archivo
$filename = "digitalnet_historico_autorizacion_pagos_manual_" . date("d-m-Y");         //File Name
//aqui va el formato en el que se va a descargar el archivo
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$filename.xls");
header("Pragma: no-cache");
header("Expires: 0");
//se hace la consulta de los nombres de las celdas a imprimir
$query = mysqli_query($conexion, "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'digital_sistemadn' AND TABLE_NAME = 'pago_manual'");
while ($row = mysqli_fetch_assoc($query)) {
    $result[] = $row;
}
$x = 0;
$columnArr = array_column($result, 'COLUMN_NAME');
$lenght = count($columnArr);
while( $x< $lenght){
    echo $columnArr[$x]. "\t";
    $x++;
}echo "\n";
//se mandan llamar los valores de las variables
$sql = mysqli_query($conexion, "SELECT `id_manual`,`No_cliente`,`Autorizacion`,`fecha` FROM `pago_manual` ");
$result_sql = mysqli_num_rows($sql);
if ($result_sql > 0) {
    while ($data_sql = mysqli_fetch_assoc($sql)) {
        $id_manual = $data_sql['id_manual'];
        $No_cliente = $data_sql['No_cliente'];
        $Autorizacion = $data_sql['Autorizacion'];
        $fecha = $data_sql['fecha'];
        //se imprimern los valores seleccionados del array
       echo $id_manual . "\t" . $No_cliente . "\t" . $Autorizacion . "\t" . $fecha  ."\n";
    }
}
?>