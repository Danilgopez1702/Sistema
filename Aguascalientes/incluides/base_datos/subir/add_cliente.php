<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
    if (
        empty($_POST['folio']) || empty($_POST['n_cliente']) || empty($_POST['paquete']) || empty($_POST['velocidad']) || empty($_POST['precio_m'])
        || empty($_POST['vendedor']) || empty($_POST['fecha_instalacion']) || empty($_POST['instalador']) || empty($_POST['instalacion_nueva'])
        || empty($_POST['nombre']) || empty($_POST['paterno']) || empty($_POST['materno']) || empty($_POST['nacimiento']) || empty($_POST['postal'])
        || empty($_POST['estado']) || empty($_POST['municipio']) || empty($_POST['colonia']) || empty($_POST['calle']) || empty($_POST['n_ext']) ||
        empty($_POST['calle1']) || empty($_POST['calle2']) || empty($_POST['ref']) || empty($_POST['tel1']) || empty($_POST['tel2'])
        || empty($_POST['ref1']) || empty($_POST['ref_tel']) || empty($_POST['ref2']) || empty($_POST['ref_tel2'])
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
        if (!$_POST['antena']) {
        } else {

            $antena = $_POST['antena'];
        }
        if (!$_POST['onu']) {
        } else {

            $onu = $_POST['onu'];
        }
        if (!$_POST['ont']) {
        } else {

            $ont = $_POST['ont'];
        }
        $ip1 = "10";
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $ip = $ip1 . "." . $ip2 . "." . $ip3 . "." . $ip4;

        if (!$_POST['zona_onu']) {
            $zona = $_POST['zona_ont'];
        } else {
            $zona = $_POST['zona_onu'];
        }
        if (!$_POST['bote_onu']) {
            $bote = $_POST['bote_ont'];
        } else {
            $bote = $_POST['bote_onu'];
        }
        if (!$_POST['zona_ont']) {
            $zona = $_POST['zona_onu'];
        } else {
            $zona = $_POST['zona_ont'];
        }
        if (!$_POST['bandera_onu']) {
            $bandera = $_POST['bandera_ont'];
        } else {
            $bandera = $_POST['bandera_onu'];
        }
        if (!$_POST['puerto_onu']) {
            $puerto = $_POST['puerto_ont'];
        } else {
            $puerto = $_POST['puerto_onu'];
        }
        if (!$_POST['router']) {
        } else {
            $router = $_POST['router'];
        }

        if ($instalacion_nueva == 1) {

            $sql = mysqli_query($conexion, "INSERT INTO `cliente`(`numero_cliente`, `folio_cliente`, `status_cliente`, `paquete_cliente`,
        `velocidad_cliente`, `precio_cliente`, `fecha_instalacion`, `fecha_corte`, `ip_cliente`, `vendedor_cliente`, `id_instalador`,
        `nombre_cliente`, `apellido_p_cliente`, `apellido_m_cliente`, `fecha_nacimiento`, `email_cliente`, `calle_cliente`, 
        `numero_ext`, `numero_int`, `municipio`, `estado`, `colonia_cliente`, `codigo_postal`, `entre_calle1`, `entre_calle2`, 
        `ref_dom`, `tel1_cliente`, `tel2_cliente`, `tel3_cliente`, `ref_nombre1`, `ref_tel1`, `ref_nombre2`, `ref_tel2`,
        `radio_cliente`,`factura`, `por_revisar`, `id_zona`, `id_cede`) VALUES ('$n_cliente','$folio', 0,'$paquete','$velocidad','$precio_m','$fecha_instalacion',
        '$fecha_corte','$ip','$vendedor','$instalador','$nombre', '$paterno','$materno','$nacimiento','$email','$calle','$n_ext','$n_int','$municipio','$estado',
        '$colonia','$postal','$calle1','$calle2','$ref', '$tel1','$tel2','$tel3','$ref1','$ref_tel','$ref2','$ref_tel2', '$antena', 1, 2, '$zona', 1)");

            $sql_id = mysqli_query($conexion, "SELECT * FROM `cliente` WHERE numero_cliente = '$n_cliente'");
            $extraccion_id = mysqli_fetch_assoc($sql_id);
            $id = $extraccion_id['id_cliente'];

            $sql_encuesta = mysqli_query($conexion, "INSERT INTO `encuesta`(`id_cliente`, `status_encuesta`) 
        VALUES ('$id',1)");

            $sql_revisar = mysqli_query($conexion, "INSERT INTO `revisar`( `id_cliente`, `status_revisar`)
        VALUES ('$id',1)");
        } else if ($instalacion_nueva == 2) {

            $sql = mysqli_query($conexion, "INSERT INTO `cliente`(`numero_cliente`, `folio_cliente`, `status_cliente`, `paquete_cliente`,
        `velocidad_cliente`, `precio_cliente`, `fecha_instalacion`, `fecha_corte`, `vendedor_cliente`, `id_instalador`,
        `nombre_cliente`, `apellido_p_cliente`, `apellido_m_cliente`, `fecha_nacimiento`, `email_cliente`, `calle_cliente`, 
        `numero_ext`, `numero_int`, `municipio`, `estado`, `colonia_cliente`, `codigo_postal`, `entre_calle1`, `entre_calle2`, 
        `ref_dom`, `tel1_cliente`, `tel2_cliente`, `tel3_cliente`, `ref_nombre1`, `ref_tel1`, `ref_nombre2`, `ref_tel2`,
         `router_cliente`, `onu_cliente`, `bandera_cliente`, `bote_cliente`, `puerto_cliente`, 
        `factura`, `por_revisar`, `id_zona` , `id_cede`) VALUES ('$n_cliente','$folio', 0,'$paquete','$velocidad','$precio_m','$fecha_instalacion','$fecha_corte',
        '$vendedor','$instalador','$nombre', '$paterno','$materno','$nacimiento','$email','$calle','$n_ext','$n_int','$municipio','$estado','$colonia','$postal',
        '$calle1','$calle2','$ref', '$tel1','$tel2','$tel3','$ref1','$ref_tel','$ref2','$ref_tel2', '$router', '$onu', '$bandera', '$bote', '$puerto', 1, 2,'$zona', 1)");

            $sql_id = mysqli_query($conexion, "SELECT * FROM `cliente` WHERE numero_cliente = '$n_cliente'");
            $extraccion_id = mysqli_fetch_assoc($sql_id);
            $id = $extraccion_id['id_cliente'];

            $sql_encuesta = mysqli_query($conexion, "INSERT INTO `encuesta`(`id_cliente`, `status_encuesta`) VALUES ('$id',1)");

            $sql_revisar = mysqli_query($conexion, "INSERT INTO `revisar`( `id_cliente`, `status_revisar`) VALUES ('$id',1)");

            $sql_inventario = mysqli_query($conexion, "UPDATE `inventario` SET `id_instalador`= '$instalador',`asignado_inventario`= 0,`id_cliente`= '$id' 
            WHERE `onu_inventario` = '$onu' or `mac_inventario` = '$onu'");

            $sql_inventario = mysqli_query($conexion, "UPDATE `inventario` SET `id_instalador`= '$instalador',`asignado_inventario`= 0,`id_cliente`= '$id' 
            WHERE `radio_inventario` = '$bandera'");

        } else if ($instalacion_nueva == 3) {

            $sql = mysqli_query($conexion, "INSERT INTO `cliente`(`numero_cliente`, `folio_cliente`, `status_cliente`, `paquete_cliente`,
        `velocidad_cliente`, `precio_cliente`, `fecha_instalacion`, `fecha_corte`, `vendedor_cliente`, `id_instalador`,
        `nombre_cliente`, `apellido_p_cliente`, `apellido_m_cliente`, `fecha_nacimiento`, `email_cliente`, `calle_cliente`, 
        `numero_ext`, `numero_int`, `municipio`, `estado`, `colonia_cliente`, `codigo_postal`, `entre_calle1`, `entre_calle2`, 
        `ref_dom`, `tel1_cliente`, `tel2_cliente`, `tel3_cliente`, `ref_nombre1`, `ref_tel1`, `ref_nombre2`, `ref_tel2`,
         `router_cliente`, `ont_cliente`, `bandera_cliente`, `bote_cliente`, `puerto_cliente`, 
        `factura`, `por_revisar`, `id_zona` , `id_cede`) VALUES ('$n_cliente','$folio', 0,'$paquete','$velocidad','$precio_m','$fecha_instalacion','$fecha_corte',
        '$vendedor','$instalador','$nombre', '$paterno','$materno','$nacimiento','$email','$calle','$n_ext','$n_int','$municipio','$estado','$colonia','$postal',
        '$calle1','$calle2','$ref', '$tel1','$tel2','$tel3','$ref1','$ref_tel','$ref2','$ref_tel2', '$router', '$ont', '$bandera', '$bote', '$puerto', 1, 2,'$zona', 1)");

            $sql_id = mysqli_query($conexion, "SELECT * FROM `cliente` WHERE numero_cliente = '$n_cliente'");
            $extraccion_id = mysqli_fetch_assoc($sql_id);
            $id = $extraccion_id['id_cliente'];

            $sql_encuesta = mysqli_query($conexion, "INSERT INTO `encuesta`(`id_cliente`, `status_encuesta`) 
        VALUES ('$id',1)");

            $sql_revisar = mysqli_query($conexion, "INSERT INTO `revisar`( `id_cliente`, `status_revisar`)
        VALUES ('$id',1)");

            $sql_inventario = mysqli_query($conexion, "UPDATE `inventario` SET `id_instalador`= '$instalador',`asignado_inventario`= 0,`id_cliente`= '$id' 
        WHERE `onu_inventario` = '$ont' or `mac_inventario` = '$ont'");
        }
        $sacar_id = mysqli_query($conexion, "SELECT * FROM `cliente` WHERE `folio_cliente` = '$folio'");
        $sacar = mysqli_fetch_assoc($sacar_id);
        $redir = $sacar['id_cliente'];

        //var_dump($sql);
        mysqli_close($conexion);

        $perfil = $velocidad;
        if ($instalacion_nueva == 1) {
            $mac = $antena;
        } else if ($instalacion_nueva == 2) {
            $mac = $onu;
        } else if ($instalacion_nueva == 3) {
            $suma = base_convert($ont, 16, 10);
            $suma = $suma +1;
            $mac = base_convert($suma, 10, 16);
        }
        $mac = str_replace(":", "", $mac);
        $mac = wordwrap($mac, 2, ':', true);
        $mac = strtoupper($mac);

        include('../../mikrotik/manual_cambiar_paquete.php');

        var_dump($vendedor, $sql);

        header("location: ../../admin/clientes/consultar/caratula.php?id=$redir");
    }
}
