<?php
include('../conexion/conexion.php');

$instalador = $_POST['instalador'];
$tipo = $_POST['tipo'];
$zona = $_POST['zona'];

//seleccionar equipos que tenga asignado un instalador 
$equipos = "";
$query_tipo = mysqli_query($conexion, "SELECT * FROM `zonafibra` WHERE `id_zonafibra` = $zona");
$tipo = mysqli_fetch_assoc($query_tipo);
$tipo_olt = $tipo['equipo_zonafibra'];
echo $tipo_olt;
if($tipo_olt == 1){
    $query = mysqli_query($conexion, "SELECT * FROM `inventario` WHERE tipo_inventario = 2 && fallo_inventario = 2 && id_instalador = $instalador");
    if (mysqli_num_rows($query) > 0){   //hay equipos asignados, imprimir options
        while($row = $query->fetch_assoc()) {
            $equipos .= '<option value="'.$row["ont_inventario"].'">'.$row["ont_inventario"].'</option>';
        }
        echo $equipos;
    } else {                            // NO hay equipos asignados
        echo '<option value="---">No hay equipos asignados a este Instalador</option>';
    }
}else if($tipo_olt == 2){
    $query = mysqli_query($conexion, "SELECT * FROM `inventario` WHERE tipo_inventario = 2 && fallo_inventario = 2 && id_instalador = $instalador");
    if (mysqli_num_rows($query) > 0){   //hay equipos asignados, imprimir options
        while($row = $query->fetch_assoc()) {
            $equipos .= '<option value="'.$row["mac_ont_inventario"].'">'.$row["mac_ont_inventario"].'</option>';
        }
        echo $equipos;
    } else {                            // NO hay equipos asignados
        echo '<option value="---">No hay equipos asignados a este Instalador</option>';
    }
}
    
?>