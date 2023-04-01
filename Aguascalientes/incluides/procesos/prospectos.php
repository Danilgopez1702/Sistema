<?php
require("../../../base_datos/conexion/conexion.php");
    $consultar_cliente = mysqli_query($conexion, "SELECT * FROM cliente WHERE id_cliente = $id_cliente");
    $cliente = mysqli_fetch_assoc($consultar_cliente);

    $nombre = $cliente['nombre_cliente'];
    $paterno = $cliente['apellido_p_cliente'];
    $materno = $cliente['apellido_m_cliente'];
    $postal = $cliente['codigo_postal'];
    $estado = $cliente['estado'];
    $municipio = $cliente['municipio'];
    $colonia = $cliente['colonia_cliente'];
    $calle = $cliente['calle_cliente'];
    $ref = $cliente['ref_dom'];
    $n_ext = $cliente['numero_ext'];
    $n_int = $cliente['numero_int'];
    $calle1 = $cliente['entre_calle1'];
    $calle2 = $cliente['entre_calle2'];
    $tel1 = $cliente['tel1_cliente'];
    $tel2 = $cliente['tel2_cliente'];          
?> 