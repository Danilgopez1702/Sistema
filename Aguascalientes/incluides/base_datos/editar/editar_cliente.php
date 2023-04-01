<?php
if (
    empty($_POST['folio']) || empty($_POST['n_cliente']) || empty($_POST['paquete']) || empty($_POST['velocidad']) || empty($_POST['precio_m'])
    || empty($_POST['vendedor']) || empty($_POST['fecha_instalacion']) || empty($_POST['instalador']) || empty($_POST['instalacion_nueva'])
    || empty($_POST['nombre']) || empty($_POST['paterno']) || empty($_POST['materno']) || empty($_POST['nacimiento']) || empty($_POST['postal'])
    || empty($_POST['estado']) || empty($_POST['municipio']) || empty($_POST['colonia']) || empty($_POST['calle']) || empty($_POST['n_ext']) ||
    empty($_POST['calle1']) || empty($_POST['calle2']) || empty($_POST['ref']) || empty($_POST['tel1']) || empty($_POST['tel2'])
    || empty($_POST['tel3']) || empty($_POST['ref1']) || empty($_POST['ref_tel']) || empty($_POST['ref2']) || empty($_POST['ref_tel2'])
) {

} else {
    require("../conexion/conexion.php");

    $folio = $_POST['folio'];
    $n_cliente = $_POST['n_cliente'];
    $paquete = $_POST['paquete'];
    $velocidad = $_POST['velocidad'];
    $precio_m = $_POST['precio_m'];
    $vendedor = $_POST['vendedor'];
    $fecha_instalacion = $_POST['fecha_instalacion'];
    $fecha_corte = date("Y-m-d", strtotime($fecha_instalacion . "+ 1 month"));
    $instalador = $_POST['instalador'];
    $instalacion_nueva = $_POST['instalacion_nueva'];
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $nacimiento = $_POST['nacimiento'];
    $postal = $_POST['postal'];
    $estado = $_POST['estado'];
    $municipio = $_POST['municipio'];
    $colonia = $_POST['colonia'];
    $calle = $_POST['calle'];
    $n_ext = $_POST['n_ext'];
    $n_int = $_POST['n_int'];
    $calle1 = $_POST['calle1'];
    $calle2 = $_POST['calle2'];
    $ref = $_POST['ref'];
    $tel1 = $_POST['tel1'];
    $tel2 = $_POST['tel2'];
    $tel3 = $_POST['tel3'];
    $email = $_POST['email'];
    $ref1 = $_POST['ref1'];
    $ref_tel = $_POST['ref_tel'];
    $ref2 = $_POST['ref2'];
    $ref_tel2 = $_POST['ref_tel2'];
    $antena = $_POST['antena'];
    $ip1 = $_POST['ip1'];
    $ip2 = $_POST['ip2'];
    $ip3 = $_POST['ip3'];
    $ip4 = $_POST['ip4'];
    $ip = $ip1 . "." . $ip2 . "." . $ip3 . "." . $ip4;
    $zona_onu = $_POST['zona_onu'];
    $zona_ont = $_POST['zona_ont'];
    $bote_onu = $_POST['bote_onu'];
    $bote_ont = $_POST['bote_ont'];
    $puerto_onu = $_POST['puerto_onu'];
    $puerto_ont = $_POST['puerto_ont'];
    $onu = $_POST['onu'];
    $ont = $_POST['ont'];
    $router = $_POST['router'];
    $bandera_onu = $_POST['bandera_onu'];
    $bandera_ont = $_POST['bandera_ont'];

    if ($instalacion_nueva == 1) {

        $sql = mysqli_query($conexion, "INSERT INTO `cliente`(`numero_cliente`, `folio_cliente`, `status_cliente`, `paquete_cliente`,
        `velocidad_cliente`, `precio_cliente`, `fecha_instalacion`, `fecha_corte`, `ip_cliente`, `vendedor_cliente`, `id_instalador`,
        `nombre_cliente`, `apellido_p_cliente`, `apellido_m_cliente`, `fecha_nacimiento`, `email_cliente`, `calle_cliente`, 
        `numero_ext`, `numero_int`, `municipio`, `estado`, `colonia_cliente`, `codigo_postal`, `entre_calle1`, `entre_calle2`, 
        `ref_dom`, `tel1_cliente`, `tel2_cliente`, `tel3_cliente`, `ref_nombre1`, `ref_tel1`, `ref_nombre2`, `ref_tel2`,
        `radio_cliente`,`factura`, `por_revisar`, `id_zona`) VALUES ('$n_cliente','$folio',
        0,'$paquete','$velocidad','$precio_m','$fecha_instalacion','$fecha_corte','$ip','$vendedor','$instalador','$nombre',
        '$paterno','$materno','$nacimiento','$email','$calle','$n_ext','$n_int','$municipio','$estado','$colonia','$postal','$calle1','$calle2','$ref',
        '$tel1','$tel2','$tel3','$ref1','$ref_tel','$ref2','$ref_tel2','$ref_tel2','$ref_tel2', '$antena', 1, 1, 1)");

        $sql_id = mysqli_query($conexion, "SELECT * FROM `cliente` WHERE numero_cliente = '$n_cliente'");
        $extraccion_id = mysqli_fetch_assoc($query_id);
        $id = $extraccion_id['id_cliente'];
    } else if ($instalacion_nueva == 2) {

        $sql = mysqli_query($conexion, "INSERT INTO `cliente`(`numero_cliente`, `folio_cliente`, `status_cliente`, `paquete_cliente`,
        `velocidad_cliente`, `precio_cliente`, `fecha_instalacion`, `fecha_corte`, `vendedor_cliente`, `id_instalador`,
        `nombre_cliente`, `apellido_p_cliente`, `apellido_m_cliente`, `fecha_nacimiento`, `email_cliente`, `calle_cliente`, 
        `numero_ext`, `numero_int`, `municipio`, `estado`, `colonia_cliente`, `codigo_postal`, `entre_calle1`, `entre_calle2`, 
        `ref_dom`, `tel1_cliente`, `tel2_cliente`, `tel3_cliente`, `ref_nombre1`, `ref_tel1`, `ref_nombre2`, `ref_tel2`,
         `router_cliente`, `onu_cliente`, `bandera_cliente`, `bote_cliente`, `puerto_cliente`, 
        `factura`, `por_revisar`, `id_zona`) VALUES ('$n_cliente','$folio',
        0,'$paquete','$velocidad','$precio_m','$fecha_instalacion','$fecha_corte','$vendedor','$instalador','$nombre',
        '$paterno','$materno','$nacimiento','$email','$calle','$n_ext','$n_int','$municipio','$estado','$colonia','$postal','$calle1','$calle2','$ref',
        '$tel1','$tel2','$tel3','$ref1','$ref_tel','$ref2','$ref_tel2','$ref_tel2','$ref_tel2', '$router', '$onu', '$bandera', '$bote', '$puerto', 1, 1, 1)");
        $sql_id = mysqli_query($conexion, "SELECT * FROM `cliente` WHERE numero_cliente = '$n_cliente'");
        $extraccion_id = mysqli_fetch_assoc($query_id);
        $id = $extraccion_id['id_cliente'];
    } else if ($instalacion_nueva == 3) {

        $sql = mysqli_query($conexion, "INSERT INTO `cliente`(`numero_cliente`, `folio_cliente`, `status_cliente`, `paquete_cliente`,
        `velocidad_cliente`, `precio_cliente`, `fecha_instalacion`, `fecha_corte`, `vendedor_cliente`, `id_instalador`,
        `nombre_cliente`, `apellido_p_cliente`, `apellido_m_cliente`, `fecha_nacimiento`, `email_cliente`, `calle_cliente`, 
        `numero_ext`, `numero_int`, `municipio`, `estado`, `colonia_cliente`, `codigo_postal`, `entre_calle1`, `entre_calle2`, 
        `ref_dom`, `tel1_cliente`, `tel2_cliente`, `tel3_cliente`, `ref_nombre1`, `ref_tel1`, `ref_nombre2`, `ref_tel2`,
        `ont_cliente`, `bandera_cliente`, `bote_cliente`, `puerto_cliente`, `factura`, `por_revisar`, `id_zona`) VALUES ('$n_cliente','$folio',
        0,'$paquete','$velocidad','$precio_m','$fecha_instalacion','$fecha_corte','$vendedor','$instalador','$nombre',
        '$paterno','$materno','$nacimiento','$email','$calle','$n_ext','$n_int','$municipio','$estado','$colonia','$postal','$calle1','$calle2','$ref',
        '$tel1','$tel2','$tel3','$ref1','$ref_tel','$ref2','$ref_tel2', '$ont', '$bandera_ont', '$bote_ont', '$puerto_ont', 1, 1, 1)");
        echo($velocidad." ". $paquete);
        $sql_id = mysqli_query($conexion, "SELECT * FROM `cliente` WHERE numero_cliente = '$n_cliente'");
        $extraccion_id = mysqli_fetch_assoc($sql_id);
        $id = $extraccion_id['id_cliente'];
    }

    //var_dump($sql);
    mysqli_close($conexion);

    $perfil = $velocidad;
    if ($instalacion_nueva == 1) {
        $mac = $antena;
    } else if ($instalacion_nueva == 2) {
        $mac = $onu;
    } else if ($instalacion_nueva == 3) {
        $mac = $ont;
    }
    $mac = str_replace(":", "", $mac);
    $mac = wordwrap($mac, 2, ':', true);
    $mac = strtoupper($mac);

    include('../../mikrotik/manual_cambiar_paquete.php');

    echo($id);

    //header("location: ../../admin/clientes/consultar/caratula.php?id=$id");
}
?>
<meta http-equiv="refresh" content="1; url=../../admin/clientes/consultar/caratula.php?id=<?php echo $id ?>">
