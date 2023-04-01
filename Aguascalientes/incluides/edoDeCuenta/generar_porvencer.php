<?php 
//header('Content-Type: image/png');
setlocale(LC_TIME,"es_MX");
include("../pdf/mpdf.php");
/************
TARJETA OXXO
************/
include ('barcode.php');
/************
end TARJETA OXXO
************/

/*if ($row['factura'] == 1) {	//si factura, tomar los datos de mascarilla factura
	$sql_status2 = "SELECT nombre, calle, numero_ext, numero_int, colonia, precio_mensual FROM datos_facturacion WHERE idClientes = ".$_GET['idClientes'];
	$result2 = mysqli_query($con,$sql_status2);
	$row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

	$suscriptor = $row2['nombre'];
	$domicilio = $row2['calle']." ".$row2['numero_ext']." ".$row2['numero_int'].", ".$row2['colonia'];
	$nocliente = $row['num_cliente'];
	$paquete = $row['paquete'];
	$total = number_format((float)$row2['precio_mensual'], 2, '.', '');
	$fechalimite = strftime("%d de %B de %Y",strtotime($row['fecha_ultimo_corte']));

} else {*/

	$suscriptor = $row['nombre']." ".$row['apellido_paterno']." ".$row['apellido_materno'];
	$domicilio = $row['calle']." ".$row['numero_ext']." ".$row['numero_int'].", ".$row['colonia'];
	$nocliente = $row['num_cliente'];
	$paquete = $row['paquete'];
	$total = "$".number_format((float)$row['precio_mensual'], 2, '.', '');
	$fechalimite = strftime("%d de %B de %Y",strtotime($row['fecha_ultimo_corte']));
//}

$jpg_image = imagecreatefrompng('template.png');
$negro = imagecolorallocate($jpg_image, 0, 0, 0);
$fuente = 'OpenSans-Regular.ttf';
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

$mpdf=new mPDF('c','Letter'); 
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