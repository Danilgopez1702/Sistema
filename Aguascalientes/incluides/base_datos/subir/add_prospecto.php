<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
if (
     empty($_POST['nombre']) || empty($_POST['paterno']) || empty($_POST['materno']) || empty($_POST['postal'])
    || empty($_POST['estado']) || empty($_POST['municipio']) || empty($_POST['colonia']) || empty($_POST['calle']) || 
    empty($_POST['n_ext']) || empty($_POST['calle1']) || empty($_POST['calle2']) || empty($_POST['tel1']) || empty($_POST['tel2'])
) {


} else {
    require("../conexion/conexion.php");

    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
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
    $comentario = $_POST['comentario'];

    var_dump($nombre, $paterno, $materno, $postal, $estado, $municipio, $colonia, $calle, $n_ext, $n_int, $calle1, $calle2, $ref, $tel1, $tel2);

    $sql = mysqli_query($conexion, "INSERT INTO `prospecto`(`nombre_prospecto`, `apellido_p__prospecto`, `apellido_m__prospecto`, `postal_prospecto`, `estado_prospecto`,
     `municipio_prospecto`, `colonia_prospecto`, `calle_prospecto`, `n_ext`, `n_int`, `calle1`, `calle2`, `ref`, `tel1`, `tel2`, `notas_prospectos`) VALUES ( '$nombre', '$paterno','$materno',
     '$postal','$estado','$municipio','$colonia','$calle','$n_ext','$n_int','$calle1','$calle2','$ref','$tel1','$tel2', '$comentario')");


    $consulta = mysqli_query($conexion,"SELECT * FROM `prospecto` WHERE `nombre_prospecto` = '$nombre' and `apellido_p__prospecto` = '$paterno' 
    and `calle_prospecto` = '$calle' and  `n_ext` = '$n_ext'");
    $consul = mysqli_fetch_assoc($consulta);
    $redir = $consul['id_prospecto'];

    header("location: ../../admin/clientes/consultar/prospecto.php?id=$redir");
}
}
?>
