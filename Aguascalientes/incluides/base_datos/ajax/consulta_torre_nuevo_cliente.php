<?php
include('../conexion/conexion.php');

$instalador = $_POST['instalador'];
$tipo = $_POST['tipo']; 

//seleccionar equipos que tenga asignado un instalador 
$equipos = "";
    $query = mysqli_query($conexion, "SELECT * FROM `inventario` WHERE tipo_inventario = 3 && fallo_inventario = 2 && id_instalador = '$instalador'");
    if (mysqli_num_rows($query) > 0){   //hay equipos asignados, imprimir options
        while($row = $query->fetch_assoc()) {
            $equipos .= '<option value="'.$row["radio_inventario"].'">'.$row["radio_inventario"].'</option>';
        }
        echo $equipos;
    } else {                            // NO hay equipos asignados
        echo '<option value="---">No hay equipos asignados a este Instalador</option>';
    }

      
?>