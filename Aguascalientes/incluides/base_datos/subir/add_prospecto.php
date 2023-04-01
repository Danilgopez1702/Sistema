<?php
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
    $ref = $_POST['ref'];
    $n_ext = $_POST['n_ext'];
    $n_int = $_POST['n_int'];
    $calle1 = $_POST['calle1'];
    $calle2 = $_POST['calle2'];
    $tel1 = $_POST['tel1'];
    $tel2 = $_POST['tel2'];

    $sql = mysqli_query($conexion, "INSERT INTO `cliente`(`status_cliente`, `nombre_cliente`, `apellido_p_cliente`,`apellido_m_cliente`,`calle_cliente`, `numero_ext`, `numero_int`, `municipio`, `estado`, `colonia_cliente`, `codigo_postal`, `entre_calle1`, `entre_calle2`,`ref_dom`, `tel1_cliente`, `tel2_cliente`,`factura`, `por_revisar`, `id_zona`) 
    VALUES ( 8,'$nombre','$paterno','$materno','$calle',$n_ext,'$n_int','$municipio','$estado','$colonia',$postal,'$calle1','$calle2', '$ref', '$tel1','$tel2', 1, 2, 1)");

    echo $sql;
}
?>
<meta http-equiv="refresh" content="1; url=../../admin/clientes/prospecto/consultar_prospecto.php">
