<?php 
//header('Content-Type: image/png');
setlocale(LC_TIME,"es_MX");
require("../base_datos/conexion/conexion.php");
require_once __DIR__ . '/vendor/autoload.php';
use Mpdf\Mpdf;
$mpdf = new \Mpdf\Mpdf();
$id = $_GET['id'];

/***************
DATOS DEL CLIENTE
****************/
$sql_status = "SELECT * FROM cliente WHERE id_cliente = '$id'";
$result = mysqli_query($conexion,$sql_status);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);


/************
TARJETA OXXO
************/
include ('barcode.php');
/************
end TARJETA OXXO
************/


	$suscriptor = $row['nombre_cliente']." ".$row['apellido_p_cliente']." ".$row['apellido_m_cliente'];
	$domicilio = $row['calle_cliente']." ".$row['numero_ext']." ".$row['numero_int'].", ".$row['colonia_cliente'];
	$nocliente = $row['numero_cliente'];
	$paquete = $row['paquete_cliente'];
	$total = "$".number_format((float)$row['precio_cliente'], 2, '.', '');
	$fechalimite = date('d-m-Y', strtotime($row['fecha_corte']));


$jpg_image = imagecreatefrompng('template.png');
$negro = imagecolorallocate($jpg_image, 0, 0, 0);
$fuente = 'OpenSans-Regular.TTF';
$src = $jpg_image;

//no de cliente
imagettftext($jpg_image, 18, 0, 630, 268, $negro, $fuente, $nocliente);
//paquete
imagettftext($jpg_image, 16, 0, 580, 300, $negro, $fuente, $paquete);
//suscriptor
imagettftext($jpg_image, 16, 0, 178, 335, $negro, $fuente, $suscriptor);
//domicilio
imagettftext($jpg_image, 16, 0, 168, 367, $negro, $fuente, $domicilio);
//total
imagettftext($jpg_image, 18, 0, 210, 400, $negro, $fuente, $total);
//fecha limite
imagettftext($jpg_image, 16, 0, 665, 400, $negro, $fuente, $fechalimite);

imagecopymerge($jpg_image, $srcbarra, 250, 1050, 0, 0, 491, 120, 100);


$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0;
$stylesheet = file_get_contents('mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);

ob_start();
imagepng($jpg_image);
$imagedata = ob_get_contents();
ob_end_clean();


$html = '<img src="data:image/png;base64,'.base64_encode($imagedata).'"/>';

$mpdf->WriteHTML($html,2);
$mpdf->Output('mpdf.pdf','I');
exit;

imagedestroy($jpg_image);

?>