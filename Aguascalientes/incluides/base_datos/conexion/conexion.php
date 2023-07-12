<?php
date_default_timezone_set('America/Mexico_City');
    $host = "mocha3035.mochahost.com";
    $user = "inventar_admin";
    $clave = "Digitalayayayayayay1.";
    $bd = "inventar_sistemadn";

    $conexion = mysqli_connect($host,$user,$clave,$bd);
    if (mysqli_connect_errno()){
        echo "No se pudo conectar a la base de datos";
        exit();
    }

    mysqli_select_db($conexion,$bd) or die("No se encuentra la base de datos");

    
?>