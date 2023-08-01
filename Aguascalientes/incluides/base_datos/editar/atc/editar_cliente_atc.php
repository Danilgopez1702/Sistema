<?php
session_start();
if ($_SESSION['rol'] == 2) {

    require("../../conexion/conexion.php");

    $id_cliente = $_POST['id'];
    $folio = $_POST['folio'];
    $status = $_POST['status'];
    $n_cliente = $_POST['n_cliente'];
    $paquete = $_POST['paquete'];
    $velocidad = $_POST['velocidad'];
    $precio_m = $_POST['precio_m'];
    $vendedor = $_POST['vendedor'];
    $fecha_instalacion = $_POST['fecha_instalacion'];
    $fecha_corte = $_POST['fecha_corte'];
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
    $ip = $_POST['ip'];
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

    $sql_cliente_select = mysqli_query($conexion, "SELECT * FROM `cliente` WHERE id_cliente = '$id_cliente'");
    $dato_antigua = mysqli_fetch_assoc($sql_cliente_select);

    $paquete_antigua = $dato_antigua['paquete_cliente'];
    $status_antigua = $dato_antigua['status_cliente'];
    $antena_antigua = $dato_antigua['radio_cliente'];
    $router_antigua = $dato_antigua['router_cliente'];
    $onu_antigua = $dato_antigua['onu_cliente'];
    $ont_antigua = $dato_antigua['ont_cliente'];

    if (stristr($status, "Activo")) {
        $estatus = 0;
    }else if (stristr($status, "por vencer")) {
        $estatus = 1;
    }else if (stristr($status, "moroso inactivo")) {
        $estatus = 3;
    }else if (stristr($status, "moroso")) {
        $estatus = 2;
    }else if (stristr($status, "sin recuperar")) {
        $estatus = 5;
    }else if (stristr($status, "recuperado")) {
        $estatus = 4;
    }else if (stristr($status, "cancelado")) {
        $estatus = 6;
    }else if (stristr($status, "dificil")) {
        $estatus = 8;
    }else if (stristr($status, "prospecto")) {
        $estatus = 7;
    }

    if ($instalacion_nueva == 1) {
        $mac = $antena;

        if ($status_antigua != $status) {

            if ($status == 0) {

                if ($velocidad == '1 MB') {
                    $perfil = "1Mega";
                } else if ($velocidad == '2 MB') {
                    $perfil = "2Megas";
                } else if ($velocidad == '3 MB') {
                    $perfil = "3Megas";
                } else if ($velocidad == '4 MB') {
                    $perfil = "4Megas";
                } else if ($velocidad == '5 MB') {
                    $perfil = "5Megas";
                } else if ($velocidad == '6 MB') {
                    $perfil = "6Megas";
                } else if ($velocidad == '8 MB') {
                    $perfil = "8Megas";
                } else if ($velocidad == '10 MB') {
                    $perfil = "10Megas";
                } else if ($velocidad == '15 MB') {
                    $perfil = "15Megas";
                } else if ($velocidad == '20 MB') {
                    $perfil = "20Megas";
                } else if ($velocidad == '30 MB') {
                    $perfil = "30Megas";
                } else if ($velocidad == '50 MB') {
                    $perfil = "50Megas";
                } else if ($velocidad == '100 MB') {
                    $perfil = "100Megas";
                } else if ($velocidad == '5 MBF') {
                    $perfil = "5MegasFibra";
                } else if ($velocidad == '10 MBF') {
                    $perfil = "10MegasFibra";
                }

                $fecha_corte = date("Y-m-d", strtotime($fecha_corte . "+ 1 month"));

                include "../../../mikrotik/manual_cambiar_paquete.php";
            } else if ($status == 1) {

                if ($velocidad == '1 MB') {
                    $perfil = "1Mega";
                } else if ($velocidad == '2 MB') {
                    $perfil = "2Megas";
                } else if ($velocidad == '3 MB') {
                    $perfil = "3Megas";
                } else if ($velocidad == '4 MB') {
                    $perfil = "4Megas";
                } else if ($velocidad == '5 MB') {
                    $perfil = "5Megas";
                } else if ($velocidad == '6 MB') {
                    $perfil = "6Megas";
                } else if ($velocidad == '8 MB') {
                    $perfil = "8Megas";
                } else if ($velocidad == '10 MB') {
                    $perfil = "10Megas";
                } else if ($velocidad == '15 MB') {
                    $perfil = "15Megas";
                } else if ($velocidad == '20 MB') {
                    $perfil = "20Megas";
                } else if ($velocidad == '30 MB') {
                    $perfil = "30Megas";
                } else if ($velocidad == '50 MB') {
                    $perfil = "50Megas";
                } else if ($velocidad == '100 MB') {
                    $perfil = "100Megas";
                } else if ($velocidad == '5 MBF') {
                    $perfil = "5MegasFibra";
                } else if ($velocidad == '10 MBF') {
                    $perfil = "10MegasFibra";
                }
                include "../../../mikrotik/manual_cambiar_paquete.php";
            } else if ($status == 2) {

                if ($velocidad == '1 MB') {
                    $perfil = "1Vencido";
                } else if ($velocidad == '2 MB') {
                    $perfil = "2Vencido";
                } else if ($velocidad == '3 MB') {
                    $perfil = "3Vencido";
                } else if ($velocidad == '4 MB') {
                    $perfil = "4Vencido";
                } else if ($velocidad == '5 MB') {
                    $perfil = "5Vencido";
                } else if ($velocidad == '6 MB') {
                    $perfil = "6Vencido";
                } else if ($velocidad == '8 MB') {
                    $perfil = "8Vencido";
                } else if ($velocidad == '10 MB') {
                    $perfil = "10vencido";
                } else if ($velocidad == '15 MB') {
                    $perfil = "15Vencido";
                } else if ($velocidad == '20 MB') {
                    $perfil = "20Vencido";
                } else if ($velocidad == '30 MB') {
                    $perfil = "30Vencido";
                } else if ($velocidad == '50 MB') {
                    $perfil = "50Vencido";
                } else if ($velocidad == '100 MB') {
                    $perfil = "100Vencido";
                } else if ($velocidad == '5 MBF') {
                    $perfil = "5FibraVencido";
                } else if ($velocidad == '10 MBF') {
                    $perfil = "10FibraVencido";
                }

                include "../../../mikrotik/manual_cambiar_paquete.php";
            } else if ($status == 3) {
                $perfil = "cancelado";
                include "../../../mikrotik/manual_cambiar_paquete.php";
            } else if ($status == 4) {

                $mac_vieja = $antena_antigua;
                include "../../../mikrotik/eliminar_equipo.php";
                $sql_status_4 = mysqli_query($conexion, "UPDATE `inventario` SET `id_instalador` = 0, `asignado_inventario` = 0,`id_cliente` = '' WHERE `radio_inventario `= '$antena_antigua' ");
                $antena = "";
            } else if ($status == 5) {
                $perfil = "cancelado";
                include "../../../mikrotik/manual_cambiar_paquete.php";
            }

            if (!isset($onu_antigua)) {
                $mac_vieja = $router;
                include "../../../mikrotik/eliminar_equipo.php";
            }
            if (!isset($ont_antigua)) {
                $mac_vieja = $ont_antigua;
                include "../../../mikrotik/eliminar_equipo.php";
            }
        }
        if ($paquete_antigua != $paquete) {
            $perfil = $paquete;
            include "../../../mikrotik/manual_cambiar_paquete.php";
        }
        if ($antena_antigua != $antena) {
            $mac_vieja = $antena_antigua;
            $perfil = $paquete;
            include "../../../mikrotik/eliminar_equipo.php";
            include "../../../mikrotik/manual_cambiar_paquete.php";
        }

        $sql_update_antena = mysqli_query($conexion, "UPDATE `cliente` SET
        `numero_cliente`= '$n_cliente',`folio_cliente`= '$folio',`status_cliente`= '$estatus',`paquete_cliente`= '$paquete',
        `velocidad_cliente`= '$velocidad',`precio_cliente`= '$precio_m',`fecha_corte`= '$fecha_corte',
        `ip_cliente`= '$ip',`vendedor_cliente`= '$vendedor',`id_instalador`= '$instalador',`nombre_cliente`= '$nombre',
        `apellido_p_cliente`= '$paterno',`apellido_m_cliente`= '$materno',`fecha_nacimiento`= '$nacimiento',`email_cliente`= '$email' ,
        `calle_cliente`= '$calle',`numero_ext`= '$n_ext',`numero_int`= '$n_int',`municipio`= '$municipio',
        `estado`= '$estado',`colonia_cliente`= '$colonia',`codigo_postal`= '$postal',`entre_calle1`= '$calle1',
        `entre_calle2`= '$calle2',`ref_dom`= '$ref',`tel1_cliente`= '$tel1',`tel2_cliente`= '$tel2',
        `tel3_cliente`= '$tel3',`ref_nombre1`= '$ref1',`ref_tel1`= '$ref_tel',`ref_nombre2`= '$ref2',
        `ref_tel2`= '$ref_tel2',`radio_cliente`= '$antena',`router_cliente`= '$router',`onu_cliente`='$onu',`ont_cliente`='$ont',`bandera_cliente`='$bandera_ont',`bote_cliente`='$bote_ont',`puerto_cliente`='$puerto_ont' WHERE `id_cliente` = '$id_cliente'");
    } else if ($instalacion_nueva == 2) {
        $mac = $router;

        if ($status_antigua != $status) {

            if ($status == 0) {

                if ($velocidad == '1 MB') {
                    $perfil = "1Mega";
                } else if ($velocidad == '2 MB') {
                    $perfil = "2Megas";
                } else if ($velocidad == '3 MB') {
                    $perfil = "3Megas";
                } else if ($velocidad == '4 MB') {
                    $perfil = "4Megas";
                } else if ($velocidad == '5 MB') {
                    $perfil = "5Megas";
                } else if ($velocidad == '6 MB') {
                    $perfil = "6Megas";
                } else if ($velocidad == '8 MB') {
                    $perfil = "8Megas";
                } else if ($velocidad == '10 MB') {
                    $perfil = "10Megas";
                } else if ($velocidad == '15 MB') {
                    $perfil = "15Megas";
                } else if ($velocidad == '20 MB') {
                    $perfil = "20Megas";
                } else if ($velocidad == '30 MB') {
                    $perfil = "30Megas";
                } else if ($velocidad == '50 MB') {
                    $perfil = "50Megas";
                } else if ($velocidad == '100 MB') {
                    $perfil = "100Megas";
                } else if ($velocidad == '5 MBF') {
                    $perfil = "5MegasFibra";
                } else if ($velocidad == '10 MBF') {
                    $perfil = "10MegasFibra";
                }

                $fecha_corte = date("Y-m-d", strtotime($fecha_corte . "+ 1 month"));

                include "../../../mikrotik/manual_cambiar_paquete.php";
            } else if ($status == 1) {

                if ($velocidad == '1 MB') {
                    $perfil = "1Mega";
                } else if ($velocidad == '2 MB') {
                    $perfil = "2Megas";
                } else if ($velocidad == '3 MB') {
                    $perfil = "3Megas";
                } else if ($velocidad == '4 MB') {
                    $perfil = "4Megas";
                } else if ($velocidad == '5 MB') {
                    $perfil = "5Megas";
                } else if ($velocidad == '6 MB') {
                    $perfil = "6Megas";
                } else if ($velocidad == '8 MB') {
                    $perfil = "8Megas";
                } else if ($velocidad == '10 MB') {
                    $perfil = "10Megas";
                } else if ($velocidad == '15 MB') {
                    $perfil = "15Megas";
                } else if ($velocidad == '20 MB') {
                    $perfil = "20Megas";
                } else if ($velocidad == '30 MB') {
                    $perfil = "30Megas";
                } else if ($velocidad == '50 MB') {
                    $perfil = "50Megas";
                } else if ($velocidad == '100 MB') {
                    $perfil = "100Megas";
                } else if ($velocidad == '5 MBF') {
                    $perfil = "5MegasFibra";
                } else if ($velocidad == '10 MBF') {
                    $perfil = "10MegasFibra";
                }
                include "../../../mikrotik/manual_cambiar_paquete.php";
            } else if ($status == 2) {

                if ($velocidad == '1 MB') {
                    $perfil = "1Vencido";
                } else if ($velocidad == '2 MB') {
                    $perfil = "2Vencido";
                } else if ($velocidad == '3 MB') {
                    $perfil = "3Vencido";
                } else if ($velocidad == '4 MB') {
                    $perfil = "4Vencido";
                } else if ($velocidad == '5 MB') {
                    $perfil = "5Vencido";
                } else if ($velocidad == '6 MB') {
                    $perfil = "6Vencido";
                } else if ($velocidad == '8 MB') {
                    $perfil = "8Vencido";
                } else if ($velocidad == '10 MB') {
                    $perfil = "10vencido";
                } else if ($velocidad == '15 MB') {
                    $perfil = "15Vencido";
                } else if ($velocidad == '20 MB') {
                    $perfil = "20Vencido";
                } else if ($velocidad == '30 MB') {
                    $perfil = "30Vencido";
                } else if ($velocidad == '50 MB') {
                    $perfil = "50Vencido";
                } else if ($velocidad == '100 MB') {
                    $perfil = "100Vencido";
                } else if ($velocidad == '5 MBF') {
                    $perfil = "5FibraVencido";
                } else if ($velocidad == '10 MBF') {
                    $perfil = "10FibraVencido";
                }

                include "../../../mikrotik/manual_cambiar_paquete.php";
            } else if ($status == 3) {
                $perfil = "cancelado";
                include "../../../mikrotik/manual_cambiar_paquete.php";
            } else if ($status == 4) {

                $mac_vieja = $router_antigua;
                include "../../../mikrotik/eliminar_equipo.php";
                $sql_status_4 = mysqli_query($conexion, "UPDATE `inventario` SET `id_instalador` = 0, `asignado_inventario` = 0,`id_cliente` = '' WHERE `onu_inventario `= '$onu_antigua' ");
                $antena = "";
            } else if ($status == 5) {
                $perfil = "cancelado";
                include "../../../mikrotik/manual_cambiar_paquete.php";
            }
        }
        if ($paquete_antigua != $paquete) {
            $perfil = $paquete;
            include "../../../mikrotik/manual_cambiar_paquete.php";
        }
        if ($router_antigua != $router) {
            $mac_vieja = $router_antigua;
            $perfil = $paquete;
            include "../../../mikrotik/eliminar_equipo.php";
            include "../../../mikrotik/manual_cambiar_paquete.php";
        }
        if (!isset($antena_antigua)) {
            $mac_vieja = $antena_antigua;
            include "../../../mikrotik/eliminar_equipo.php";
        }
        if (!isset($ont_antigua)) {
            $mac_vieja = $ont_antigua;
            include "../../../mikrotik/eliminar_equipo.php";
        }

        var_dump(
            $n_cliente,
            "/n",
            $folio,
            $status,
            $paquete,
            $velocidad,
            $precio_m,
            $fecha_corte,
            $ip,
            $vendedor,
            $instalador,
            $nombre,
            $paterno,
            $materno,
            $nacimiento,
            $email,
            $calle,
            $n_ext,
            $n_int,
            $municipio,
            $estado,
            $colonia,
            $postal,
            $calle1,
            $calle2,
            $ref,
            $tel1,
            $tel2,
            $tel3,
            $ref1,
            $ref_tel,
            $ref2,
            $ref_tel2,
            $antena,
            $router,
            $onu,
            $ont,
            $bandera_onu,
            $bote_onu,
            $puerto_onu
        );

        $sql_update_antena = mysqli_query($conexion, "UPDATE `cliente` SET
        `numero_cliente`= '$n_cliente',`folio_cliente`= $folio,`status_cliente`= $estatus,`paquete_cliente`= '$paquete',
        `velocidad_cliente`= '$velocidad',`precio_cliente`= '$precio_m',`fecha_corte`= '$fecha_corte',
        `ip_cliente`= '$ip',`vendedor_cliente`= '$vendedor',`id_instalador`= '$instalador',`nombre_cliente`= '$nombre',
        `apellido_p_cliente`= '$paterno',`apellido_m_cliente`= '$materno',`fecha_nacimiento`= '$nacimiento',`email_cliente`= '$email' ,
        `calle_cliente`= '$calle',`numero_ext`= '$n_ext',`numero_int`= '$n_int',`municipio`= '$municipio',
        `estado`= '$estado',`colonia_cliente`= '$colonia',`codigo_postal`= '$postal',`entre_calle1`= '$calle1',
        `entre_calle2`= '$calle2',`ref_dom`= '$ref',`tel1_cliente`= '$tel1',`tel2_cliente`= '$tel2',
        `tel3_cliente`= '$tel3',`ref_nombre1`= '$ref1',`ref_tel1`= '$ref_tel',`ref_nombre2`= '$ref2',
        `ref_tel2`= '$ref_tel2',`radio_cliente`= '$antena',`router_cliente`= '$router',`onu_cliente`='$onu',`ont_cliente`='$ont',
        `bandera_cliente`='$bandera_onu',`bote_cliente`='$bote_onu',`puerto_cliente`='$puerto_onu' WHERE `id_cliente` = '$id_cliente'");
    } else if ($instalacion_nueva == 3) {


        $consulta_ont = mysqli_query($conexion, "SELECT * from inventario WHERE ont_inventario = '$ont' or mac_ont_inventario = '$ont'");
        $$consultas = mysqli_fetch_assoc($consulta_ont);
        if (!$consultas['ont_inventario']) {
            $ont = $consultas['mac_ont_inventario'];
            $suma = base_convert($ont, 16, 10);
            $suma = $suma + 1;
            $mac = base_convert($suma, 10, 16);
        } else {
            $ont = $consultas['ont_inventario'];
            $suma = base_convert($ont, 16, 10);
            $suma = $suma + 1;
            $mac = base_convert($suma, 10, 16);
        }

        if ($status_antigua != $status) {

            if ($status == 0) {

                if ($velocidad == '1 MB') {
                    $perfil = "1Mega";
                } else if ($velocidad == '2 MB') {
                    $perfil = "2Megas";
                } else if ($velocidad == '3 MB') {
                    $perfil = "3Megas";
                } else if ($velocidad == '4 MB') {
                    $perfil = "4Megas";
                } else if ($velocidad == '5 MB') {
                    $perfil = "5Megas";
                } else if ($velocidad == '6 MB') {
                    $perfil = "6Megas";
                } else if ($velocidad == '8 MB') {
                    $perfil = "8Megas";
                } else if ($velocidad == '10 MB') {
                    $perfil = "10Megas";
                } else if ($velocidad == '15 MB') {
                    $perfil = "15Megas";
                } else if ($velocidad == '20 MB') {
                    $perfil = "20Megas";
                } else if ($velocidad == '30 MB') {
                    $perfil = "30Megas";
                } else if ($velocidad == '50 MB') {
                    $perfil = "50Megas";
                } else if ($velocidad == '100 MB') {
                    $perfil = "100Megas";
                } else if ($velocidad == '5 MBF') {
                    $perfil = "5MegasFibra";
                } else if ($velocidad == '10 MBF') {
                    $perfil = "10MegasFibra";
                }

                $fecha_corte = date("Y-m-d", strtotime($fecha_corte . "+ 1 month"));

                include "../../../mikrotik/manual_cambiar_paquete.php";
            } else if ($status == 1) {

                if ($velocidad == '1 MB') {
                    $perfil = "1Mega";
                } else if ($velocidad == '2 MB') {
                    $perfil = "2Megas";
                } else if ($velocidad == '3 MB') {
                    $perfil = "3Megas";
                } else if ($velocidad == '4 MB') {
                    $perfil = "4Megas";
                } else if ($velocidad == '5 MB') {
                    $perfil = "5Megas";
                } else if ($velocidad == '6 MB') {
                    $perfil = "6Megas";
                } else if ($velocidad == '8 MB') {
                    $perfil = "8Megas";
                } else if ($velocidad == '10 MB') {
                    $perfil = "10Megas";
                } else if ($velocidad == '15 MB') {
                    $perfil = "15Megas";
                } else if ($velocidad == '20 MB') {
                    $perfil = "20Megas";
                } else if ($velocidad == '30 MB') {
                    $perfil = "30Megas";
                } else if ($velocidad == '50 MB') {
                    $perfil = "50Megas";
                } else if ($velocidad == '100 MB') {
                    $perfil = "100Megas";
                } else if ($velocidad == '5 MBF') {
                    $perfil = "5MegasFibra";
                } else if ($velocidad == '10 MBF') {
                    $perfil = "10MegasFibra";
                }
                include "../../../mikrotik/manual_cambiar_paquete.php";
            } else if ($status == 2) {

                if ($velocidad == '1 MB') {
                    $perfil = "1Vencido";
                } else if ($velocidad == '2 MB') {
                    $perfil = "2Vencido";
                } else if ($velocidad == '3 MB') {
                    $perfil = "3Vencido";
                } else if ($velocidad == '4 MB') {
                    $perfil = "4Vencido";
                } else if ($velocidad == '5 MB') {
                    $perfil = "5Vencido";
                } else if ($velocidad == '6 MB') {
                    $perfil = "6Vencido";
                } else if ($velocidad == '8 MB') {
                    $perfil = "8Vencido";
                } else if ($velocidad == '10 MB') {
                    $perfil = "10vencido";
                } else if ($velocidad == '15 MB') {
                    $perfil = "15Vencido";
                } else if ($velocidad == '20 MB') {
                    $perfil = "20Vencido";
                } else if ($velocidad == '30 MB') {
                    $perfil = "30Vencido";
                } else if ($velocidad == '50 MB') {
                    $perfil = "50Vencido";
                } else if ($velocidad == '100 MB') {
                    $perfil = "100Vencido";
                } else if ($velocidad == '5 MBF') {
                    $perfil = "5FibraVencido";
                } else if ($velocidad == '10 MBF') {
                    $perfil = "10FibraVencido";
                }

                include "../../../mikrotik/manual_cambiar_paquete.php";
            } else if ($status == 3) {
                $perfil = "cancelado";
                include "../../../mikrotik/manual_cambiar_paquete.php";
            } else if ($status == 4) {

                $mac_vieja = $ont_antigua;
                include "../../../mikrotik/eliminar_equipo.php";
                $sql_status_4 = mysqli_query($conexion, "UPDATE `inventario` SET `id_instalador` = 0, `asignado_inventario` = 0,`id_cliente` = '' WHERE `ont_inventario `= '$ont_antigua' ");
                $antena = "";
            } else if ($status == 5) {
                $perfil = "cancelado";
                include "../../../mikrotik/manual_cambiar_paquete.php";
            }
        }
        if ($paquete_antigua != $paquete) {
            $perfil = $paquete;
            include "../../../mikrotik/manual_cambiar_paquete.php";
        }
        if ($ont_antigua != $ont) {
            $mac_vieja = $ont_antigua;
            $perfil = $paquete;
            include "../../../mikrotik/eliminar_equipo.php";
            include "../../../mikrotik/manual_cambiar_paquete.php";
        }
        if (!isset($antena_antigua)) {
            $mac_vieja = $antena_antigua;
            include "../../../mikrotik/eliminar_equipo.php";
        }
        if (!isset($onu_antigua)) {
            $mac_vieja = $router;
            include "../../../mikrotik/eliminar_equipo.php";
        }

        $sql_update_antena = mysqli_query($conexion, "UPDATE `cliente` SET
        `numero_cliente`= '$n_cliente',`folio_cliente`= '$folio',`status_cliente`= '$estatus',`paquete_cliente`= '$paquete',
        `velocidad_cliente`= '$velocidad',`precio_cliente`= '$precio_m',`fecha_corte`= '$fecha_corte',
        `ip_cliente`= '$ip',`vendedor_cliente`= '$vendedor',`id_instalador`= '$instalador',`nombre_cliente`= '$nombre',
        `apellido_p_cliente`= '$paterno',`apellido_m_cliente`= '$materno',`fecha_nacimiento`= '$nacimiento',`email_cliente`= '$email' ,
        `calle_cliente`= '$calle',`numero_ext`= '$n_ext',`numero_int`= '$n_int',`municipio`= '$municipio',
        `estado`= '$estado',`colonia_cliente`= '$colonia',`codigo_postal`= '$postal',`entre_calle1`= '$calle1',
        `entre_calle2`= '$calle2',`ref_dom`= '$ref',`tel1_cliente`= '$tel1',`tel2_cliente`= '$tel2',
        `tel3_cliente`= '$tel3',`ref_nombre1`= '$ref1',`ref_tel1`= '$ref_tel',`ref_nombre2`= '$ref2',
        `ref_tel2`= '$ref_tel2',`radio_cliente`= '$antena',`router_cliente`= '$router',`onu_cliente`='$onu',`ont_cliente`='$ont',`bandera_cliente`='$bandera_ont',`bote_cliente`='$bote_ont',`puerto_cliente`='$puerto_ont' WHERE `id_cliente` = '$id_cliente'");
    }
}

?>
<meta http-equiv="refresh" content="0; url=../../../atc/clientes/consultar/caratula.php?id=<?php echo $id_cliente ?>">