<?php
require("../../../base_datos/conexion/conexion.php");

    $consultar_cliente = mysqli_query($conexion, "SELECT * FROM cliente WHERE id_cliente = $id");
    $cliente = mysqli_fetch_assoc($consultar_cliente);

    $id_cliente = $cliente['id_cliente'];
    $num_cliente = $cliente['numero_cliente'];
    $nombre_completo = $cliente['nombre_cliente'] ." " . $cliente['apellido_p_cliente'] ." " . $cliente['apellido_m_cliente'];