<?php
date_default_timezone_set('America/Mexico_City');
    $host = "mysql1005.mochahost.com";
    $user = "carlosfe_sistemadn";
    $clave = "sistemadn";
    $bd = "carlosfe_sistemadn";

    $conexion = mysqli_connect($host,$user,$clave,$bd);
    if (mysqli_connect_errno()){
        echo "No se pudo conectar a la base de datos";
        exit();
    }

    mysqli_select_db($conexion,$bd) or die("No se encuentra la base de datos");

    
?>