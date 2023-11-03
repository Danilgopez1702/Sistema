<?php
require("../base_datos/conexion/conexion.php");
header('Access-Control-Allow-Origin: *');

$query_zona = mysqli_query($conexion, "SELECT `nombre_zonafibra`, `botes_zonafibra`, `equipo_zonafibra` FROM `zonafibra`");
while ($row = mysqli_fetch_assoc($query_zona)) {
    $zona[] = $row;
}
// Convertir el array en JSON y enviarlo
header('Content-type: application/json');
echo json_encode($zona, JSON_UNESCAPED_UNICODE);
?>