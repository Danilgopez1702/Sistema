<?php
require("conexion.php");
require("conexion_antiguo.php");

$borrado = mysqli_query($conexion, "DELETE FROM `cliente`");

$sql_clientes = mysqli_query($con, "SELECT * FROM `clientes`");
$clientes_cont = mysqli_num_rows($sql_clientes);



if ($clientes_cont > 0) {
    while ($data = mysqli_fetch_assoc($sql_clientes)) {

        $idClientes = $data['idClientes'];
        $status = $data['status'];
        $folio = $data['folio'];
        $paquete = $data['paquete'];
        $velocidad = $data['velocidad'];
        $precio_mensual = $data['precio_mensual'];
        $paquete_bak = $data['paquete_bak'];
        $velocidad_bak = $data['velocidad_bak'];
        $precio_mensual_bak = $data['precio_mensual_bak'];
        $actualizado = $data['actualizado'];
        $fecha_instalacion = $data['fecha_instalacion'];
        $fecha_ultimo_corte_2 = $data['fecha_ultimo_corte_2'];
        $num_cliente = $data['num_cliente'];
        $forma_pago = $data['forma_pago'];
        $pago_suscripcion = $data['pago_suscripcion'];
        $ip = $data['ip'];
        $vendedor = $data['vendedor'];
        $instalador = $data['instalador'];
        $num_equipo = $data['num_equipo'];
        $nombre = $data['nombre'];
        $apellido_paterno = $data['apellido_paterno'];
        $apellido_materno = $data['apellido_materno'];
        $fecha_nacimiento = $data['fecha_nacimiento'];
        $email = $data['email'];
        $calle = $data['calle'];
        $numero_ext = $data['numero_ext'];
        $numero_int = $data['numero_int'];
        $colonia = $data['colonia'];
        $codigo_postal = $data['codigo_postal'];
        $entre_calle1 = $data['entre_calle1'];
        $entre_calle2 = $data['entre_calle2'];
        $ref_dom = $data['ref_dom'];
        $tel1 = $data['tel1'];
        $tel2 = $data['tel2'];
        $tel3 = $data['tel3'];
        $ref_fam_nom = $data['ref_fam_nom'];
        $ref_fam_tel = $data['ref_fam_tel'];
        $ref_nofam_nom = $data['ref_nofam_nom'];
        $ref_nofam_tel = $data['ref_nofam_tel'];
        $notas = $data['notas'];
        $factura = $data['factura'];
        $contrato_fisico = $data['contrato_fisico'];
        $gestionando = $data['gestionando'];
        $fechaPromesa = $data['fechaPromesa'];
        $edoCuenta_enviado = $data['edoCuenta_enviado'];
        $porRevisar = $data['porRevisar'];
        $porRevidInstaladorRevisarisar = $data['idInstaladorRevisar'];
        $cron_checado = $data['cron_checado'];
        $fechaTecnicoRechazado = $data['fechaTecnicoRechazado'];
        $razonTecnicoRechazado = $data['razonTecnicoRechazado'];
        $timestamp = $data['timestamp'];
        $EsFibra = $data['EsFibra'];
        $NumRouter = $data['NumRouter'];
        $siesDHCP = $data['siesDHCP'];
        $onu = $data['onu'];
        $bandera = $data['bandera'];

        if($porRevisar == 0){

            $por_revisar = 1;
            $encuesta_cliente = 1;

        }else if($porRevisar == 1){

            $por_revisar = 1;
            $encuesta_cliente = 1;

        }else if($porRevisar == 2){

            $por_revisar = 1;
            $encuesta_cliente = 1;

        }else if($porRevisar == 3){

            $por_revisar = 1;
            $encuesta_cliente = 1;

        }else if($porRevisar == 4){

            $por_revisar = 1;
            $encuesta_cliente = 1;

        }else if($porRevisar == 5){

            $por_revisar = 1;
            $encuesta_cliente = 1;

        }else if($porRevisar == 6){

            $por_revisar = 1;
            $encuesta_cliente = 1;

        }else if($porRevisar == 7){

            $por_revisar = 1;
            $encuesta_cliente = 1;

        }

        $sql_instalador = mysqli_query($conexion, "SELECT * FROM `usuario` WHERE `usuario_usuario` = '$instalador'");
        $clientes_instaladors = mysqli_num_rows($sql_instalador);

        if($clientes_instaladors > 0){
            $clientes_instalador = mysqli_fetch_assoc($sql_instalador);
            $instaladors = $clientes_instalador['id_usuario'];

        }else{

            $instaladors = 1;

        }
        
        $sql_vendedor = mysqli_query($conexion, "SELECT * FROM `usuario` WHERE `usuario_usuario` = '$vendedor'");
        $clientes_vendedors = mysqli_num_rows($sql_vendedor);

        if($clientes_vendedors > 0){

            $clientes_vendedor = mysqli_fetch_assoc($sql_vendedor);
            $vendedors = $clientes_vendedor['id_usuario'];

        }else{

            $vendedors = 1;
        }
        
        
        try{
            if (!$NumRouter) {
                $sql = mysqli_query($conexion, "INSERT INTO `cliente`(`id_cliente`,`numero_cliente`, `folio_cliente`, `status_cliente`, `paquete_cliente`, `velocidad_cliente`,
            `precio_cliente`, `fecha_instalacion`, `fecha_corte`, `ip_cliente`, `vendedor_cliente`, `id_instalador`, `nombre_cliente`, `apellido_p_cliente`, `apellido_m_cliente`,
            `fecha_nacimiento`, `email_cliente`, `calle_cliente`,`numero_ext`, `numero_int`, `colonia_cliente`, `codigo_postal`, `entre_calle1`, `entre_calle2`, 
            `ref_dom`, `tel1_cliente`, `tel2_cliente`, `ref_nombre1`, `ref_tel1`, `ref_nombre2`, `ref_tel2`,
            `radio_cliente`,`factura`, `id_zona`) VALUES ('$idClientes','$num_cliente','$folio', '$status','$paquete_bak','$velocidad',
            '$precio_mensual','$fecha_instalacion','$fecha_ultimo_corte_2','$ip','$vendedors','$instaladors','$nombre','$apellido_paterno','$apellido_materno',
            '$fecha_nacimiento','$email','$calle','$numero_ext','$numero_int','$colonia','$codigo_postal','$entre_calle1','$entre_calle2',
            '$ref_dom', '$tel1','$tel2','$ref_fam_nom','$ref_fam_tel','$ref_nofam_nom','$ref_nofam_tel','$num_equipo', '$factura', 1)");
    
                //var_dump($sql);
            } else {
    
                $sql = mysqli_query($conexion, "INSERT INTO `cliente`(`id_cliente`,`numero_cliente`, `folio_cliente`, `status_cliente`, `paquete_cliente`,
            `velocidad_cliente`, `precio_cliente`, `fecha_instalacion`, `fecha_corte`, `vendedor_cliente`, `id_instalador`,`nombre_cliente`, `apellido_p_cliente`, `apellido_m_cliente`,
            `fecha_nacimiento`, `email_cliente`, `calle_cliente`,`numero_ext`, `numero_int`, `colonia_cliente`, `codigo_postal`, `entre_calle1`, `entre_calle2`, 
            `ref_dom`, `tel1_cliente`, `tel2_cliente`, `ref_nombre1`, `ref_tel1`, `ref_nombre2`, `ref_tel2`,`router_cliente`, `onu_cliente`, `bandera_cliente`,
            `factura`, `id_zona`) VALUES ('$idClientes','$num_cliente','$folio','$status','$paquete_bak',
            '$velocidad','$precio_mensual','$fecha_instalacion','$fecha_ultimo_corte_2','$vendedors','$instaladors','$nombre','$apellido_paterno','$apellido_materno',
            '$fecha_nacimiento','$email','$calle',$numero_ext,'$numero_int','$colonia',$codigo_postal,'$entre_calle1','$entre_calle2',
            '$ref_dom', $tel1, $tel2,'$ref_fam_nom','$ref_fam_tel','$ref_nofam_nom','$ref_nofam_tel', '$NumRouter','$onu','$bandera', '$factura', 1)");
            }
        } catch (Throwable $e) {
            echo('<pre>');
            echo $num_cliente;
            echo('<pre>');    
        }
        //var_dump($sql);
    }
}
