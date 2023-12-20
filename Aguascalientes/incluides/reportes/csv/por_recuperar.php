<?php
    include_once "../../base_datos/conexion/conexion.php"; 

    $filename = "Por_Recuperar";         //File Name
    //header info for browser
    header("Content-Type: application/csv");    
    header("Content-Disposition: attachment; filename=$filename.csv");  
    header("Pragma: no-cache"); 
    header("Expires: 0");

    $sql = mysqli_query($conexion, "SELECT tel1_cliente , numero_cliente from cliente WHERE status_cliente = 5");
    $sql2 = mysqli_query($conexion, "SELECT tel2_cliente , numero_cliente from cliente WHERE status_cliente = 5");

    $schema_insert1 = "94491285888,Carlos";
    print(trim($schema_insert1));
    print "\n";

    while($dato = mysqli_fetch_array($sql)){
        $tel1 = $dato['tel1_cliente'];
        $num = $dato['numero_cliente'];

        if(strlen($tel1) == 10 && is_numeric($tel1)) {
            $schema_insert = "9".$tel1.",".$num;
            print(trim($schema_insert));
            print "\n";

        }
    }
    while($dato = mysqli_fetch_array($sql2)){
        $tel2 = $dato['tel2_cliente'];
        $num2 = $dato['numero_cliente'];

        if(strlen($tel2) == 10 && is_numeric($tel2)){
            $schema_insert = "9".$tel2.",".$num2;
            print(trim($schema_insert));
            print "\n";

        }
    }
    print(trim($schema_insert1));
    print "\n";
?>