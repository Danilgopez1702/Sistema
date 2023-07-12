<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
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
    $comentarios = $_POST['comentarios'];  

    $subido = mysqli_query($conexion, "INSERT INTO `cliente`(`nombre_cliente`, `apellido_p_cliente`, `apellido_m_cliente`,`calle_cliente`, `numero_ext`, `numero_int`,
     `municipio`, `estado`, `colonia_cliente`, `codigo_postal`, `entre_calle1`, `entre_calle2`, `ref_dom`, `tel1_cliente`, `tel2_cliente`,`factura`, `por_revisar`, `id_zona`,
      `cron_checador`,`id_cede`) VALUES ('$nombre','$paterno','$materno','$calle','$n_ext','$n_int','$municipio','$colonia','$calle','$postal','$calle1', '$calle2',
      '$ref','$tel1','$tel2',0,2,1,0,1)");

      $borrado = mysqli_query($conexion, "DELETE FROM `prospecto` WHERE `id_prospecto` = '$id'");

      $consulta = mysqli_query($conexion,"SELECT `id_cliente` FROM `cliente` WHERE `nombre_cliente` = '$nombre' and `apellido_p_cliente` = '$paterno' and 
      `calle_cliente` = '$calle' and `numero_ext` = '$n_ext'");
      $respuesta = mysqli_fetch_assoc($consulta);
      $id = $respuesta['id_cliente'];

      var_dump($borrado);

      header("location: ../../admin/clientes/consultar/caratula.php?id=$id");
}
?> 