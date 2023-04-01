<?php

$okFactura = 0; //si 1, se envia la factura

if(file_exists('../../connection.php')) 
	require_once('../../connection.php');

if(file_exists('../connection.php')) 
	require_once('../connection.php');

error_reporting(E_ALL); // esta linea la podemos comentar al acabar las pruebas
ini_set('display_errors', 1); // esta linea la podemos comentar al acabar las pruebas 

require_once 'vendor/autoload.php';

/******GET LAST ID para folio de factura*******/
$sql4 = "SELECT idTimbres FROM timbres ORDER BY idTimbres DESC LIMIT 0, 1";
$result4 = $con->query($sql4);
$row4 = $result4->fetch_assoc();
$nextID = $row4["idTimbres"];
$nextID = $nextID + 1;
$result4->close();

/******GET datos de facturacion del cliente*******/
$sql2 = "SELECT * FROM datos_facturacion WHERE idClientes = ".$idClientes;
$result2 = $con->query($sql2);
$row2 = $result2->fetch_assoc();
$result2->close();

/******GET precio_mensual (total) del cliente*******/
$sql3 = "SELECT precio_mensual FROM clientes WHERE idClientes = ".$idClientes;
$result3 = $con->query($sql3);
$row3 = $result3->fetch_assoc();
$result3->close();

$barcode = '57'.$row2['num_cliente'].date("Ymd").intval($row2['precio_mensual']);

$subtotal = $row2['precio_mensual'];
$subtotal = $subtotal / 1.16;
$subtotal = number_format($subtotal, 2);

$total = $subtotal * 1.16;
$total = number_format($total, 2);

$iva = $subtotal * 0.16 ;
$iva = number_format($iva, 2);

try {

	# llenamos los datos de nuestro CFDI
	# crearemos un xml de prueba
	$d = array();

	# datos basicos SAT
	$d['Serie'] 			= 'DN';
	$d['Folio'] 			= $nextID;  #'101';
	$d['Fecha'] 			= 'AUTO';
	$d['FormaPago'] 		= '01';
	$d['CondicionesDePago'] = 'CONDICIONES';
	$d['SubTotal'] 			= $subtotal;
	$d['Descuento'] 		= null; # o bien: null
	$d['Moneda'] 			= 'MXN';
	$d['TipoCambio'] 		= 1;
	$d['Total'] 			= $total;
	$d['TipoDeComprobante'] = 'I';
	$d['MetodoPago'] 		= 'PUE';
	$d['LugarExpedicion'] 	= '20296';

	# opciones de personalización (opcionales)
	$d['LeyendaFolio'] 		= "FACTURA"; # leyenda opcional para poner a lado del folio: FACTURA, RECIBO, NOTA DE CREDITO, ETC.

	# codigo de confirmación PAC para cfdis mayores a $20 millones
	# $d['Confirmacion'] = null;

	# CFDIs relacionados
	# $d['CfdiRelacionados']['TipoRelacion'] = null;
	# $d['CfdiRelacionados'][0]['UUID'] = null;

	# Regimen fiscal del emisor ligado al tipo de operaciones que representa este CFDI
	#$d['Emisor']['Rfc'] = 'LAF141201GA8';
	$d['Emisor']['RegimenFiscal'] = '601'; # ver catálogo del SAT

	# Datos del receptor
	$d['Receptor']['Rfc'] = $row2['rfc'];
	$d['Receptor']['Nombre'] = $row2['nombre'];
	# $d['Receptor']['ResidenciaFiscal'] = 'MEX'; # solo se usa cuando el receptor no esté dado de alta en el SAT
	$d['Receptor']['NumRegIdTrib'] = ''; # para extranjeros
	$d['Receptor']['UsoCFDI'] = 'G03'; # uso que le dará el cliente al cfdi

	# Receptor -> Domicilio (OPCIONAL)
	$d["Receptor"]["Calle"] = $row2['calle'];
	$d["Receptor"]["NoExt"] = $row2['numero_ext'];
	#$d["Receptor"]["NoInt"] = null;
	$d["Receptor"]["Colonia"] = $row2['colonia'];
	$d["Receptor"]["Localidad"] = $row2['localidad'];
	#$d["Receptor"]["Referencia"] = null;
	$d["Receptor"]["Municipio"] = $row2['municipio'];
	$d["Receptor"]["Estado"] = $row2['estado'];
	$d["Receptor"]["Pais"] = "México";
	$d["Receptor"]["CodigoPostal"] = $row2['codigo_postal'];

	# >> conceptos <<
	# concepto 1
	$d['Conceptos'][0]['ClaveProdServ'] = '01010101';
	$d['Conceptos'][0]['NoIdentificacion'] = '01'; #codigo interno o SKU, GTIN, codigo de barras, etc.
	$d['Conceptos'][0]['Cantidad'] = 1.00;
	$d['Conceptos'][0]['ClaveUnidad'] = 'E48'; # Clave SAT
	$d['Conceptos'][0]['Unidad'] = 'SERVICIO'; # Unidad de Medida
	$d['Conceptos'][0]['Descripcion'] = 'Acceso a Internet Digital Net'; #maximo 1000 caracteres
	$d['Conceptos'][0]['ValorUnitario'] = $subtotal;
	$d['Conceptos'][0]['Importe'] = $subtotal;
	# $d['Concepto'][0]['Descuento'] = null; # no se permiten valores negativos

	$d['Conceptos'][0]['Impuestos']['Traslados'][0]['Base'] 		= $subtotal;
	$d['Conceptos'][0]['Impuestos']['Traslados'][0]['Impuesto'] 	= '002';
	$d['Conceptos'][0]['Impuestos']['Traslados'][0]['TipoFactor'] 	= 'Tasa';
	$d['Conceptos'][0]['Impuestos']['Traslados'][0]['TasaOCuota'] 	= '0.160000';
	$d['Conceptos'][0]['Impuestos']['Traslados'][0]['Importe'] 		= $iva;

	$d['Impuestos']['TotalImpuestosTrasladados'] 	= $iva;

	# Definimos a detalle los traslados
	$d['Impuestos']['Traslados'][0]['Impuesto'] 	= '002'; # 001=ISR, 002=IVA, 003=IEPS
	$d['Impuestos']['Traslados'][0]['TipoFactor'] 	= 'Tasa';
	$d['Impuestos']['Traslados'][0]['TasaOCuota'] 	= '0.160000'; # 16%
	$d['Impuestos']['Traslados'][0]['Importe'] 		= $iva; # Monto

	/*echo "<pre>";
	print_r( json_encode($d) );
	echo "</pre>";*/

	# preparamos los datos
	$headers = array('Accept' 		=> 'application/json', 
					'api-usuario' 	=> 'LAF141201GA8', 
					'api-password' 	=> 'administrador1', 
					'jsoncfdi' 		=>  json_encode($d) );

	# hacemos la petición y enviamos los parametros
	$response = Unirest\Request::post('https://app.facturadigital.com.mx/api/cfdi/generar', $headers);

	$response->code;        // HTTP Status code
	$response->headers;     // Headers
	$response->body;        // Parsed body
	$response->raw_body;    // Unparsed body

	# si el timbrado es exitoso (200):
	if ( $response->code == 200 ) {
		$okFactura = 1;
		# imprimimos los datos del CFDI
		/*echo "<pre>";
		var_dump( $response->body );
		echo "</pre>";*/

		//echo $response->body->cfdi->NoCertificado."<br>";

		/*$xml = base64_decode($response->body->cfdi->XmlBase64);
		echo "xml: ".$xml;*/
		//echo base64_decode($response->body->cfdi->XmlBase64);

		//file_put_contents('xml/'..'.xml', base64_decode($response->body->cfdi->XmlBase64));

		try {
		    $conn = new PDO(
		        "mysql:host=$servername;dbname=$dbname", 
		        $username, 
		        $password,
		        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") 
		    );

		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		    $sql = "INSERT INTO timbres (
		    noCertificado, 
		    selloCFD, 
		    FechaTimbrado, 
		    UUID, 
			noCertificadoSAT, 
			selloSAT, 
			cadenaOrigTFD, 
			cadenaQR, 
			urlDownloadXML, 
			urlDownloadPDF 
			) VALUES (
	        '".$response->body->cfdi->NoCertificado."', 
	        '".$response->body->cfdi->SelloCFD."', 
	        '".$response->body->cfdi->FechaTimbrado."', 
	        '".$response->body->cfdi->UUID."', 
	        '".$response->body->cfdi->NoCertificadoSAT."', 
	        '".$response->body->cfdi->SelloSAT."', 
	        '".$response->body->cfdi->CadenaOrigTFD."', 
	        '".$response->body->cfdi->CadenaQR."', 
	        '".$response->body->cfdi->XmlBase64."', 
	        '".$response->body->cfdi->PDF."')";

	        $conn->exec($sql);

	        //se guarda xml en el servidor, con nombre del mismo ID que el timbre
	        $last_id = $conn->lastInsertId();
			file_put_contents(dirname(__FILE__).'/xml/'.$last_id.'.xml', base64_decode($response->body->cfdi->XmlBase64));

	        //=================
	        //=======LOG=======
	        //=================
	        $query = "INSERT INTO log (accion) VALUES ('Generar factura | UUID:".$response->body->cfdi->UUID."')";
	        $con->query($query);

	        //TODO OK
	        //echo "Factura generada, no. de certificado: ".$response->body->cfdi->NoCertificado."<br><br>";


		} catch(PDOException $e){
			echo $sql . "<br>" . $e->getMessage();
		}


	} else {
		# imprimimos la respuesta (JSON)
		echo $response->raw_body;
	}

} catch (Exception $e) {
	echo $e->getMessage();
}