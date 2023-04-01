<?php 
$suscriptor = $row['nombre']." ".$row['apellido_paterno']." ".$row['apellido_materno'];
$domicilio = $row['calle']." ".$row['numero_ext']." ".$row['numero_int'].", ".$row['colonia'];
$nocliente = $row['num_cliente'];
$paquete = $row['paquete'];
$total = "$".number_format((float)$row['precio_mensual'], 2, '.', '');
$fechalimite = strftime("%d de %B de %Y",strtotime($row['fecha_ultimo_corte']));

$jpg_image = imagecreatefrompng(dirname(__DIR__).'/edoDeCuenta/template.png');
$negro = imagecolorallocate($jpg_image, 0, 0, 0);
$fuente = dirname(__DIR__).'/edoDeCuenta/OpenSans-Regular.ttf';
$src = $jpg_image;

//no de cliente
imagettftext($jpg_image, 18, 0, 630, 268, $negro, $fuente, $nocliente);
//paquete
//imagettftext($jpg_image, 16, 0, 580, 300, $negro, $fuente, $paquete);
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
$stylesheet = file_get_contents(dirname(__DIR__).'/edoDeCuenta/mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);

ob_start();
imagepng($jpg_image);
$imagedata = ob_get_contents();
ob_end_clean();

$html = '<img src="data:image/png;base64,'.base64_encode($imagedata).'"/>';

$mpdf->WriteHTML($html,2);

/********
SEND EMAIL
*********/
$content = $mpdf->Output('DigitalNet_EdoDeCuenta.pdf','S');
$filename = "DigitalNet_EdoDeCuenta.pdf";

$from_name = "DigitalNet";
$from_mail = 'servicio@digitalnetags.com.mx';
$replyto = 'servicio@digitalnetags.com.mx';

$mailto = $row['email'];
$subject = 'DigitalNet - Estado de Cuenta';
$message     = " ";

try {
	$mail = new PHPMailer(true);
	$mail->AddReplyTo($replyto, $from_name);
	$mail->SetFrom($from_mail, $from_name);
	$mail->AddAddress($mailto);
	$mail->Subject = $subject;
	$mail->MsgHTML($message);
	$mail->AddStringAttachment($content,$filename);

	if (!$mail->Send()) {
	    echo "correo no enviado: ".$row['nombre']." ".$row['apellido_paterno']." (ID: ".$row['idClientes'].")\r\n";
	} else {
	   	echo "correo enviado a cliente: ".$row['nombre']." ".$row['apellido_paterno']." (ID: ".$row['idClientes'].")\r\n";
	}
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}

imagedestroy($jpg_image);
?>