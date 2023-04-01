<?php
    require("../conexion/conexion.php");

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $postal = $_POST['postal'];
    $estado = $_POST['estado'];
    $municipio = $_POST['municipio'];
    $colonia = $_POST['colonia'];
    $calle = $_POST['calle'];
    $ref = $_POST['ref'];
    $n_ext = $_POST['n_ext'];
    $n_int = $_POST['n_int'];
    $calle1 = $_POST['calle1'];
    $calle2 = $_POST['calle2'];
    $tel1 = $_POST['tel1'];
    $tel2 = $_POST['tel2'];

    $sql = mysqli_query($conexion,"UPDATE `cliente` SET `nombre_cliente`='$nombre',`apellido_p_cliente`='$paterno',`apellido_m_cliente`='$materno',
    `calle_cliente`='$calle',`numero_ext`='$n_ext',`numero_int`='$n_int',`municipio`='$municipio',`estado`='$estado',`colonia_cliente`='$colonia',
    `codigo_postal`='$postal',`entre_calle1`='$calle1',`entre_calle2`='$calle2',`ref_dom`='$ref',`tel1_cliente`='$tel1',`tel2_cliente`='$tel2'
     WHERE `id_cliente` = '$id'");

     
    header("location: ../../admin/clientes/consultar/prospecto.php?id=$id");
?>