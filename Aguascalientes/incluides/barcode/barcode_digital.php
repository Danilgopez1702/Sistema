<?php
//ejem:88010722600015050 || DV:6
/*
 * 	Algoritmo Base 10
 */ 
function DV ($atributos){
	//Empezando de atrás para adelante se multiplica el primer número del código por 2, el siguiente
	//por 1, el siguiente por 2, el siguiente por 1 y así sucesivamente. 
	$hex = strrev($atributos); 
	$arr1 = str_split($hex);
	$arr3 = array();
	$hex = base_convert($hex,2,10); 
	$hex = $hex % 10;
	$i = 0;
	$helper2 = 0;
	foreach ($arr1 as $key => $value) {
		if($i == 0){
			$arr1[$key] = $value * 2;
			$helper = 0;
			if (strlen($arr1[$key]) > 1) { // (los números de 2 cifras se separan y se suman) 
				$arr2 = str_split($arr1[$key]);
				foreach ($arr2 as $key2 => $value2) {
					$helper = $helper + $arr2[$key2];
				}
			} else {
				$helper = $arr1[$key];
			}
			$arr1[$key] = $helper;
			$i++;
		} else {
			$arr1[$key] = $value * 1;
			$i--;
		}
	}
	
	//se suman los resultados
	foreach ($arr1 as $key => $value) {
		$helper2 += $arr1[$key];
	}

	//Se divide el resultado de la suma entre 10 y se obtiene el residuo 
	$helper2 = $helper2 % 10;

	//Si el resido es igual a cero el dígito es cero. Si el residuo es diferente de cero el dígito es el
	//resultado de restarle a 10 el residuo 
	if ($helper2 == 0) {
		$helper2 = 0;
	} else {
		$helper2 = 10 - $helper2;
	}
	//echo "DV:".$helper2."<br>"; 
	return $helper2;
}

function codeString ($texts) {
	foreach ($texts as $text) {
		$code_string = "";
		$code_array1 = array("1","2","3","4","5","6","7","8","9","0");
		$code_array2 = array("3-1-1-1-3","1-3-1-1-3","3-3-1-1-1","1-1-3-1-3","3-1-3-1-1","1-3-3-1-1","1-1-1-3-3","3-1-1-3-1","1-3-1-3-1","1-1-3-3-1");
		for ( $X = 1; $X <= strlen($text); $X++ ) {
			for ( $Y = 0; $Y < count($code_array1); $Y++ ) {
				if ( substr($text, ($X-1), 1) == $code_array1[$Y] )
					$temp[$X] = $code_array2[$Y];
			}
		}
		for ( $X=1; $X<=strlen($text); $X+=2 ) {
			if ( isset($temp[$X]) && isset($temp[($X + 1)]) ) {
				$temp1 = explode( "-", $temp[$X] );
				$temp2 = explode( "-", $temp[($X + 1)] );
				for ( $Y = 0; $Y < count($temp1); $Y++ )
					$code_string .= $temp1[$Y] . $temp2[$Y];
			}
		}
		$codes[] = "1111" . $code_string . "311";
	}
	return array($codes[0]);
}

$text = [];
$clientes = [];
$code_string = [];
$image = [];
$black = [];
$white = [];
$start = $_GET['start'];
$thickness = 1;
$importeA = 0;
$importe = 0;

//get clientes
	$clientes = $start;
	$clientes = str_pad($clientes,6,"0",STR_PAD_LEFT);

//get texto de códigos de barras

	$importe = $_GET['importe'];
	$importeA = $_GET['importe'];
	$DVA = '574004'.$clientes.'20990101'.$importeA;
	$text = array("574004".$clientes."20990101".$importeA.DV($DVA));


//var_dump($text);


	$code_string = array(codeString($text)[0]);


//var_dump($code_string);

$img_width = (262 * $thickness); //thickness
$img_height = 80;

header('Content-Type: image/png');


	//$image[$i] = imagecreate(850, 235);
	$image = imagecreate(900, 235);
	$black = imagecolorallocate ($image, 0, 0, 0);
	$white = imagecolorallocate ($image, 255, 255, 255);
	imagefill( $image, 0, 0, $white );

//print bars

	$location = 100;
	for ( $position = 1 ; $position <= strlen($code_string[0]); $position++ ) {
		$cur_size = ($location + (substr ($code_string[0], ($position-1), 1) ) * $thickness);
		imagefilledrectangle( $image, $location, 0, $cur_size, $img_height, ($position % 2 == 0 ? $white : $black) );
		$location = $cur_size;
	}




// Allocate A Color For The Text
	$white = imagecolorallocate($image, 0, 0, 0);
	$blue = imagecolorallocate($image, 96, 167, 209);

//get font
$font_path = 'OpenSans-Regular.ttf';

//print text
	$num_inicioA = substr($text[0],0,2);
	imagettftext($image, 15, 0, 65, 102, $blue, $font_path, $num_inicioA);

	$num_clienteA = substr($text[0],2,10);
	imagettftext($image, 15, 0, 88, 102, $white, $font_path, $num_clienteA);

	$num_finalA = substr($text[0],12);
	imagettftext($image, 15, 0, 199, 102, $blue, $font_path, $num_finalA);


//invoke planilla
    
	$dest = imagecreatefrompng('tarjeta-planilla-a.png');


	imagecopymerge($dest, $image, 5, 100, 0, 0, 435, 105, 100);

$full_height = 240.3 ;
$back = imagecreatetruecolor ( 435 , $full_height );

$barcode_y = 0;

	imagecopymerge($back,$dest, 0, $barcode_y, 0, 0, 435, 250, 100);
	$barcode_y += 240.3;

imagepng($back);

imagedestroy($dest);
/*
$im = imagecreatefrompng("tarjeta-a-b&w.png");
imagepng($im);
imagedestroy($im);
*/
	
?>