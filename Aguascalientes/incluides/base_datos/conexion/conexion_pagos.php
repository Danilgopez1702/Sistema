<?php
date_default_timezone_set('America/Mexico_City');
    $host = "mysql1005.mochahost.com";
    $user = "carlosfe_pagos_admin";
    $clave = "!cNG3ZNs7!L!dmC@#nNU";
    $bd = "carlosfe_prueba";

    $conexion = mysqli_connect($host,$user,$clave,$bd);
    if (mysqli_connect_errno()){
        echo "No se pudo conectar a la base de datos";
        exit();
    }

    mysqli_select_db($conexion,$bd) or die("No se encuentra la base de datos");

    mysqli_set_charset($conexion,"utf8");

?>