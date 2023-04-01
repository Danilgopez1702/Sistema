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
$stylesheet = file_get_contents(dirname(__DIR__).'/edoDeCuenta/mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);

ob_start();
imagepng($jpg_image);
$imagedata = ob_get_contents();
ob_end_clean();


$html = '<img src="data:image/png;base64,'.base64_encode($imagedata).'"/>';

$mpdf->WriteHTML($html,2);
//$mpdf->Output('mpdf.pdf','I');



/********
SEND EMAIL
*********/
//Get Last Month
//$last_month = ucwords(strftime('%B %Y',strtotime('-1 month')));

// FOR EMAIL
$content = $mpdf->Output('S'); // Saving pdf to attach to email 
$content = chunk_split(base64_encode($content));
$uid = md5(uniqid(time()));
// Email settings
$mailto = $row['email'];
//$mailto = "dexmikerdz@gmail.com,".$row['email'];
$from_name = "DigitalNet";
$from_mail = 'servicio@digitalnetags.com.mx';
$replyto = 'servicio@digitalnetags.com.mx';
$subject = 'DigitalNet - Estado de Cuenta';
//$filename = basename($file);
$filename = basename("DigitalNet_EdoDeCuenta.pdf");

$eol = PHP_EOL;

/*$header = "From: ".$from_name." <".$from_mail.">".$eol;
$header .= "Reply-To: ".$replyto.$eol;
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"";*/

$header  = "From: ".$from_name." <".$from_mail.">".$eol;
$header .= "Reply-To: ".$replyto.$eol;
$header .= "MIME-Version: 1.0".$eol; 
$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"";

$message = "--".$uid.$eol;
$message .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
$message .= "This is a MIME encoded message.".$eol;

// message
$message .= "--".$uid.$eol;
$message .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
$message .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$message .= $body.$eol;

// attachment
$message .= "--".$uid.$eol;
$message .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol; 
$message .= "Content-Transfer-Encoding: base64".$eol;
$message .= "Content-Disposition: attachment".$eol.$eol;
$message .= $content.$eol;
$message .= "--".$uid."--";

/*$message = "--".$uid.$eol;
$message .= "Content-Type: text/html; charset=ISO-8859-1".$eol;
$message .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$message .= $body.$eol;
$message .= "--".$uid.$eol;

$message .= "Content-Type: application/pdf; name=\"".$filename."\"".$eol;
$message .= "Content-Transfer-Encoding: base64";
$message .= "Content-Disposition: attachment";
$message .= $content.$eol;
$message .= "--".$uid."--";*/

//$mpdf->Output(); // For sending Output to browser
//$mpdf->Output('lubus_mdpf_demo.pdf','D'); // For Download

if (mail($mailto, $subject, $message, $header)) {
    echo "correo enviado a cliente: ".$row['nombre']." ".$row['apellido_paterno']." ".$row['idClientes']." (".$row['idClientes'].")<br><br>";
} else {
    echo "correo no enviado: ".$row['nombre']." ".$row['apellido_paterno']." ".$row['idClientes']." (".$row['idClientes'].")<br><br>";
}

imagedestroy($jpg_image);
?>