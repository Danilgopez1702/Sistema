<?php
require_once("../../../base_datos/conexion/conexion_antiguo.php");
$bandera = '00000000';
for ($i = 1; $i <= 1000; $i++) {
    $bandera = $bandera + 1;
    if(strlen($bandera) == 1){
        $banderas = '0000000' . $bandera;
        $banderitas = (string)$banderas;
    }else if(strlen($bandera) == 2){
        $banderas = '000000' . $bandera;
        $banderitas = (string)$banderas;
    }else if(strlen($bandera) == 3){
        $banderas = '00000' . $bandera;
        $banderitas = (string)$banderas;
    }else if(strlen($bandera) == 4){
        $banderas = '0000' . $bandera;
        $banderitas = (string)$banderas;
    }else if(strlen($bandera) == 5){
        $banderas = '000' . $bandera;
        $banderitas = (string)$banderas;
    }else if(strlen($bandera) == 6){
        $banderas = '00' . $bandera;
        $banderitas = (string)$banderas;
    }else if(strlen($bandera) == 7){
        $banderas = '0' . $bandera;
        $banderitas = (string)$banderas;
    }else if(strlen($bandera) == 7){
        $banderas = $bandera;
        $banderitas = (string)$banderas;
    }
    $bandera_oc = 'A' . $banderitas;
    echo $bandera_oc;
    $sql = mysqli_query($con, "INSERT INTO `inventarioBandera`( `no_bandera`, `fallo`) 
    VALUES ('$bandera_oc','NO')");
    var_dump($sql);
    ?>
    <br>
    <?php
}
?>
