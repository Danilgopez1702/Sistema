<?php
require("../../../base_datos/conexion/conexion.php");
    $consultar_cliente = mysqli_query($conexion, "SELECT * FROM prospecto WHERE `id_prospecto` = $id_prosp");
    $cliente = mysqli_fetch_assoc($consultar_cliente);

    $nombre = $cliente['nombre_prospecto'];
    $paterno = $cliente['apellido_p_prospecto'];
    $materno = $cliente['apellido_m_prospecto'];
    $postal = $cliente['postal_prospecto'];
    $estado = $cliente['estado_prospecto'];
    $municipio = $cliente['municipio_prospecto'];
    $colonia = $cliente['colonia_prospecto'];
    $calle = $cliente['calle_prospecto'];
    $ref = $cliente['ref'];
    $n_ext = $cliente['n_ext'];
    $n_int = $cliente['n_int'];
    $calle1 = $cliente['calle1'];
    $calle2 = $cliente['calle2'];
    $tel1 = $cliente['tel1'];
    $tel2 = $cliente['tel2'];          
    $comentarios = $cliente['notas_prospectos'];          
?> 