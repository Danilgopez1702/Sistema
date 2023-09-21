<?php
session_start();
if ($_SESSION['rol'] == 2) {

    require("../../conexion/conexion.php");

    $nombre_usuario = $_SESSION['nombre'];
    $id_usuario = $_SESSION['id_usuario'];

    $id_cliente = $_POST['id'];
    $n_cliente = $_POST['n_cliente'];
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

    $sql_update_antena = mysqli_query($conexion, "UPDATE `cliente` SET
        `numero_cliente`= '$n_cliente',`nombre_cliente`= '$nombre',`apellido_p_cliente`= '$paterno',`apellido_m_cliente`= '$materno',
        `fecha_nacimiento`= '$nacimiento',`email_cliente`= '$email', `calle_cliente`= '$calle',`numero_ext`= '$n_ext',`numero_int`= '$n_int',
        `municipio`= '$municipio', `estado`= '$estado',`colonia_cliente`= '$colonia',`codigo_postal`= '$postal',`entre_calle1`= '$calle1',
        `entre_calle2`= '$calle2',`ref_dom`= '$ref',`tel1_cliente`= '$tel1',`tel2_cliente`= '$tel2', `tel3_cliente`= '$tel3',`ref_nombre1`= '$ref1',
        `ref_tel1`= '$ref_tel',`ref_nombre2`= '$ref2', ref_tel2`= '$ref_tel2' WHERE `id_cliente` = '$id_cliente' ");

    $mensajes = 'El usuario: ' . $nombre_usuario . ' modifico el cliente: ' . $n_cliente;
    $log = mysqli_query($conexion, "INSERT INTO `log`(`accion_log`, `id_usuario`, `id_cliente`) VALUES ('$mensajes,'$id_usuario','$id_cliente')");
}

?>
<meta http-equiv="refresh" content="0; url=../../../atc/clientes/consultar/caratula.php?id=<?php echo $id_cliente ?>">