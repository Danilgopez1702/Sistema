<?php
include('../conexion/conexion.php');


$zona = $_POST['zona'];

$equipos = "";
$query_tipo = mysqli_query($conexion, "SELECT * FROM `zonafibra` WHERE `id_zonafibra` = $zona");
$tipo = mysqli_fetch_assoc($query_tipo);
$botes = $tipo['botes_zonafibra'];
$botes_olt = intval($botes);
echo $botes_olt;
if($botes_olt > 0){
    foreach (range(1, $botes_olt) as $numero) {
            $equipos .= '<option value="'.$numero.'">'.$numero.'</option>';
        }
        echo $equipos;
    } else {
        // NO hay equipos asignados
        echo '<option value="---">No hay botes asignados a esta Zona de Fibra</option>';
    }
