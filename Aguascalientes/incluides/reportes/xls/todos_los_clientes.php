<?php
include_once "../../base_datos/conexion/conexion.php";
//aqui se pone el nombre que se le va a poner eal archivo
$filename = "digitalnet_clientes_todos_" . date("d-m-Y");         //File Name
//aqui va el formato en el que se va a descargar el archivo
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$filename.xls");
header("Pragma: no-cache");
header("Expires: 0");
//se hace la consulta de los nombres de las celdas a imprimir
$query = mysqli_query($conexion, "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'digital_sistemadn' AND TABLE_NAME = 'cliente'");
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
$sql = mysqli_query($conexion, "SELECT `id_cliente`, `numero_cliente`, `folio_cliente`, `status_cliente`, `paquete_cliente`, `velocidad_cliente`, `precio_cliente`, `fecha_instalacion`, `fecha_corte`, `ip_cliente`, `vendedor_cliente`,
 `id_instalador`, `nombre_cliente`, `apellido_p_cliente`, `apellido_m_cliente`, `fecha_nacimiento`, `email_cliente`, `calle_cliente`, `numero_ext`, `numero_int`, `colonia_cliente`, `codigo_postal`, `entre_calle1`, `entre_calle2`, `ref_dom`, `tel1_cliente`, `tel2_cliente`, `tel3_cliente`, 
 `ref_nombre1`, `ref_tel1`, `ref_nombre2`, `ref_tel2`, `radio_cliente`, `es_fibra`, `router_cliente`, `onu_cliente`, `bandera_cliente`, `bote_cliente`, `puerto_cliente`, `factura`, `por_revisar`, `id_zona`, `cron_checador`, `TIMESTAMP` FROM `cliente`");
$result_sql = mysqli_num_rows($sql);
if ($result_sql > 0) {
    while ($data_sql = mysqli_fetch_assoc($sql)) {
        $id_cliente = $data_sql['id_cliente'];
        $numero_cliente = $data_sql['numero_cliente'];
        $folio_cliente = $data_sql['folio_cliente'];
        $status_cliente = $data_sql['status_cliente'];
        $paquete_cliente = $data_sql['paquete_cliente'];
        $velocidad_cliente = $data_sql['velocidad_cliente'];
        $precio_cliente = $data_sql['precio_cliente'];
        $fecha_instalacion = $data_sql['fecha_instalacion'];
        $fecha_corte = $data_sql['fecha_corte'];
        $ip_cliente = $data_sql['ip_cliente'];
        $vendedor_cliente = $data_sql['vendedor_cliente'];
        $id_instalador = $data_sql['id_instalador'];
        $nombre_cliente = $data_sql['nombre_cliente'];
        $apellido_p_cliente = $data_sql['apellido_p_cliente'];
        $apellido_m_cliente = $data_sql['apellido_m_cliente'];
        $fecha_nacimiento = $data_sql['fecha_nacimiento'];
        $email_cliente = $data_sql['email_cliente'];
        $calle_cliente = $data_sql['calle_cliente'];
        $numero_ext = $data_sql['numero_ext'];
        $numero_int = $data_sql['numero_int'];
        $colonia_cliente = $data_sql['colonia_cliente'];
        $codigo_postal = $data_sql['codigo_postal'];
        $entre_calle1 = $data_sql['entre_calle1'];
        $entre_calle2 = $data_sql['entre_calle2'];
        $ref_dom = $data_sql['ref_dom'];
        $tel1_cliente = $data_sql['tel1_cliente'];
        $tel2_cliente = $data_sql['tel2_cliente'];
        $tel3_cliente = $data_sql['tel3_cliente'];
        $ref_nombre1 = $data_sql['ref_nombre1'];
        $ref_tel1 = $data_sql['ref_tel1'];
        $ref_nombre2 = $data_sql['ref_nombre2'];
        $ref_tel2 = $data_sql['ref_tel2'];
        $radio_cliente = $data_sql['radio_cliente'];
        $es_fibra = $data_sql['es_fibra'];
        $router_cliente = $data_sql['router_cliente'];
        $onu_cliente = $data_sql['onu_cliente'];
        $bandera_cliente = $data_sql['bandera_cliente'];
        $bote_cliente = $data_sql['bote_cliente'];
        $puerto_cliente = $data_sql['puerto_cliente'];
        $factura = $data_sql['factura'];
        $por_revisar = $data_sql['por_revisar'];
        $id_zona = $data_sql['id_zona'];
        $cron_checador = $data_sql['cron_checador'];
        $TIMESTAMP = $data_sql['TIMESTAMP'];
        //se imprimern los valores seleccionados del array
       echo $id_cliente . "\t" . $numero_cliente . "\t" . $folio_cliente . "\t" . $status_cliente  . "\t" . $paquete_cliente  . "\t" .  $velocidad_cliente . "\t" .
            $precio_cliente . "\t" . $fecha_instalacion . "\t" . $fecha_corte  . "\t" . $ip_cliente  . "\t" . $vendedor_cliente . "\t" .  $id_instalador
            . "\t" . $nombre_cliente  . "\t" . $apellido_p_cliente . "\t" .  $apellido_m_cliente . "\t" .  $fecha_nacimiento . "\t" . $email_cliente
            . "\t" . $calle_cliente  . "\t" . $numero_ext  . "\t" . $numero_int . "\t" .  $colonia_cliente  . "\t" . $codigo_postal . "\t" .  $entre_calle1
            . "\t" . $entre_calle2 . "\t" .  $ref_dom . "\t" . $tel1_cliente  . "\t" . $tel2_cliente  . "\t" . $tel3_cliente  . "\t" . $ref_nombre1
            . "\t" . $ref_tel1 . "\t" .  $ref_nombre2  . "\t" . $ref_tel2 . "\t" .  $radio_cliente  . "\t" . $es_fibra . "\t" .  $router_cliente
            . "\t" . $onu_cliente . "\t" .  $bandera_cliente  . "\t" . $bote_cliente . "\t" .  $puerto_cliente . "\t" .  $factura  . "\t" . $por_revisar
            . "\t" . $id_zona  . "\t" . $cron_checador . "\t" .  $TIMESTAMP. "\n";
    }
}
?>