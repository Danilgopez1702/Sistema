<?php
include_once "../../base_datos/conexion/conexion.php";

$tecnico = $_POST['tecnicos'];
date_default_timezone_set('America/Mazatlan');
$fecha_hoy = date("Y-m-d");
$filename = "Historial de Reportes " . "-" . $tecnico . "-" . $fecha_hoy;         //File Name
//header info for browser
header("Content-Type: application/csv");
header("Content-Disposition: attachment; filename=$filename.csv");
header("Pragma: no-cache");
header("Expires: 0");

if ($tecnico == 9999) {
    $query_reparaciones = mysqli_query($conexion, "SELECT quejas.reparador, clientes.nombre, clientes.apellido_paterno, clientes.apellido_materno, clientes.num_cliente, clientes.calle, clientes.numero_ext, clientes.numero_int, clientes.colonia, clientes.ref_dom, clientes.tel1, clientes.tel2, clientes.onu, clientes.ont, clientes.num_equipo, quejas.fechaAsignacion, quejas.noReporte, quejas.mensaje, quejas.porRevisar, usuarios.usuario FROM `quejas` LEFT JOIN clientes ON quejas.idClientes = clientes.idClientes LEFT JOIN usuarios ON quejas.idUsuarios = usuarios.idUsuarios 
    WHERE quejas.porRevisar != 0 AND quejas.tipo = 'Reparaciones' AND quejas.noReporte != '' AND quejas.reparador != ''");

    $schema_insert = "nombre,fecha reporte,estatus,# reporte,numero de cliente,mensaje,dio de alta,calle,# exterior,# interior,colonia,referencia,telefono1,telefono2,onu,ont,antena,reparador";
    print(trim(strtoupper($schema_insert)));
    print "\n";

} else {
    $query_reparaciones = mysqli_query($conexion, "SELECT quejas.reparador, clientes.nombre, clientes.apellido_paterno, clientes.apellido_materno, clientes.num_cliente, clientes.calle, clientes.numero_ext, clientes.numero_int, clientes.colonia, clientes.ref_dom, clientes.tel1, clientes.tel2, clientes.onu, clientes.ont, clientes.num_equipo, quejas.fechaAsignacion, quejas.noReporte, quejas.mensaje, quejas.porRevisar, usuarios.usuario FROM `quejas` LEFT JOIN clientes ON quejas.idClientes = clientes.idClientes LEFT JOIN usuarios ON quejas.idUsuarios = usuarios.idUsuarios 
    WHERE quejas.porRevisar != 0 AND quejas.tipo = 'Reparaciones' AND quejas.noReporte != '' AND quejas.reparador = '$tecnico'");

    $schema_insert = "nombre,fecha reporte,estatus,# reporte,numero de cliente,mensaje,dio de alta,calle,# exterior,# interior,colonia,referencia,telefono1,telefono2,onu,ont,antena";
    print(trim(strtoupper($schema_insert)));
    print "\n";
}

while ($data = mysqli_fetch_assoc($query_reparaciones)) {

    $nombre = $data['nombre'];
    $a_p = $data['apellido_paterno'];
    $a_m = $data['apellido_materno'];
    $borrar = array(",", ".", "\n", "\r");
    $nombre_completo = $nombre . " " . $a_p . " " . $a_m;
    $fecha_asignacion = $data['fechaAsignacion'];
    $no_reporte = $data['noReporte'];
    $num_cliente = $data['num_cliente'];
    $mensa = $data['mensaje'];
    $mensaje = str_replace($borrar, ' ', $mensa);
    $calle = $data['calle'];
    $no_ext = $data['numero_ext'];
    $no_int = $data['numero_int'];
    $col = $data['colonia'];
    $colonia = str_replace($borrar, ' ', $col);
    $ref = $data['ref_dom'];
    $ref_dom = str_replace($borrar, ' ', $ref);
    $tel1 = $data['tel1'];
    $tel2 = $data['tel2'];
    $usuario = $data['usuario'];
    $porRevisar = $data['porRevisar'];
    $rep = $data['reparador'];
    $onu = $data['onu'];
    $ont = $data['ont'];
    $antena = $data['num_equipo'];

    switch ($porRevisar) {
        case 1:
            $estatus = "Revisar(Tecnico)";
            break;
        case 2:
            $estatus = "Revisar(Admin)";
            break;
        case 3:
            $estatus = "Nuevamente(Tecnico)";
            break;
        case 4:
            $estatus = "Nuevamente(Admin)";
            break;
        case 5:
            $estatus = "moroso";
            break;
        default:
            $estatus = "no";
    }

    if ($estatus != "no") {
        $schema_insert = $nombre_completo . "," . $fecha_asignacion . "," . $estatus . "," . $no_reporte . "," . $num_cliente . "," . $mensaje . "," . $usuario . "," . $calle . "," . $no_ext . "," . $no_int . "," . $colonia . "," . $ref_dom . "," . $tel1 . "," . $tel2 . "," . $onu . "," . $ont . "," . $antena . "," . $rep;
        print(trim(strtoupper($schema_insert)));
        print "\n";
    }
}
?>