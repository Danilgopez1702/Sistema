<?php
include_once('../base_datos/conexion/conexion.php'); 
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
include("../facturas/4.0/generar_factura_boton.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
   
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($okFactura == 1) {
    //get facturas
    $facturaXML = file_get_contents("../facturas/4.0/xml/".$last_id.".xml");
    unlink("../facturas/4.0/xml/".$last_id.".xml");
    $facturaPDF = file_get_contents($response->body->cfdi->PDF);

    //set facturas
    file_put_contents('facturas_temp/FacturaServicio_DigitalNet_'.date("Ymd").'_'.$id.'.xml', $facturaXML);
    file_put_contents('facturas_temp/FacturaServicio_DigitalNet_'.date("Ymd").'_'.$id.'.pdf', $facturaPDF);

    $mail = new PHPMailer(true);

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mco22.prodns.mx;mail.digitalnetags.com.mx';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'servicio@digitalnetags.com.mx';                 // SMTP username
    $mail->Password = 'SkuB5Yn5MZ4EPgdH';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->setFrom('servicio@digitalnetags.com.mx', 'Digital Net');
    $mail->addAddress($email, $name);     // Add a recipient
    $mail->addReplyTo('servicio@digitalnetags.com.mx', 'Digital Net');
    /*$mail->addCC('cc@example.com');*/
    $mail->addBCC('servicio@digitalnetags.com.mx');

    /*$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name*/

    $mail->Subject = 'Factura DigitalNet';
    $mail->Body    = 'Factura de su servicio de Internet.';
    $mail->AltBody = 'Factura de su servicio de Internet.';

    $mail->isHTML(true);    
    $mail->setLanguage('es', 'language');

    /*if(!$mail->send()) {
        echo 'El mensaje no se pudo enviar.';
        echo 'Error: ' . $mail->ErrorInfo . '. Contacte al administrador (Mike).';
    } else {
        echo 'El mensaje fue enviado';
    }*/

    //Attach multiple files one by one
    //for ($ct = 0; $ct < count($_FILES['userfile']['tmp_name']); $ct++) {
        //$uploadfile = tempnam(sys_get_temp_dir(), sha1('FacturaServicio_DigitalNet_'.date("Ymd")));
        /*$filename = 'facturas_temp/FacturaServicio_DigitalNet_'.date("Ymd").'.xml';
        if (move_uploaded_file('facturas_temp/FacturaServicio_DigitalNet_'.date("Ymd").'.xml', $uploadfile)) {*/
            $mail->addAttachment('facturas_temp/FacturaServicio_DigitalNet_'.date("Ymd").'_'.$id.'.xml');
        /*} else {
            echo 'Failed to move file to ' . $uploadfile;
        }*/

        //$uploadfile2 = tempnam(sys_get_temp_dir(), sha1('FacturaServicio_DigitalNet_'.date("Ymd")));
       /*$filename2 = 'facturas_temp/FacturaServicio_DigitalNet_'.date("Ymd").'.pdf';
        if (move_uploaded_file('facturas_temp/FacturaServicio_DigitalNet_'.date("Ymd").'.pdf', $uploadfile2)) {*/
            $mail->addAttachment('facturas_temp/FacturaServicio_DigitalNet_'.date("Ymd").'_'.$id.'.pdf');
        /*} else {
            echo 'Failed to move file to ' . $uploadfile2;
        }*/


    //}
    if (!$mail->send()) {
        echo "Error: " . $mail->ErrorInfo . ". Contacte al administrador.";
    } else {
        //$msg .= "Mensaje con archivos enviado!";
        //TODO OK
    }

    //delete facturas de temp
    ignore_user_abort(true);
    unlink('facturas_temp/FacturaServicio_DigitalNet_'.date("Ymd").'_'.$id.'.xml');
    unlink('facturas_temp/FacturaServicio_DigitalNet_'.date("Ymd").'_'.$id.'.pdf');

    echo "1";
} else {
    echo "2";
}
    

?>