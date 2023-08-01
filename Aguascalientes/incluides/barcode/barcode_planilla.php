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
	return array($codes[0],$codes[1]);
}

$text = [];
$clientes = [];
$code_string = [];
$image = [];
$black = [];
$white = [];
$start = $_GET['start'];
$size = 4;
$thickness = 1;
$importeA = 0;
$importeB = 0;
$importe = 0;

//get clientes
for ($i=0; $i < $_GET['rango']; $i++) {
	$clientes[$i] = $start+($i);
	$clientes[$i] = str_pad($clientes[$i],6,"0",STR_PAD_LEFT);
}

//get texto de códigos de barras
for ($i=0; $i < $_GET['rango']; $i++) {
	$importe = $_GET['importe'];
	$importeA = $_GET['importe'];
	//$importeA = str_pad($importeA,5,"0",STR_PAD_LEFT);
	$importeB = $_GET['importe'] + 50;
	$importeB = str_pad($importeB,5,"0",STR_PAD_LEFT);
	$DVA = '574004'.$clientes[$i].'20990101'.$importeA;
	$DVB = '574004'.$clientes[$i].'20990101'.$importeB;
	$text[] = array("574004".$clientes[$i]."20990101".$importeA.DV($DVA),"574004".$clientes[$i]."20990101".$importeB.DV($DVB));
}

//var_dump($text);

for ($i=0; $i < $_GET['rango']; $i++) {
	$code_string[] = array(codeString($text[$i])[0],codeString($text[$i])[1]);
}

//var_dump($code_string);

$img_width = (262 * $thickness) * 2; //thickness
$img_height = 80;

header('Content-Type: image/png');

for ($i=0; $i < $_GET['rango']; $i++) {
	//$image[$i] = imagecreate(850, 235);
	$image[$i] = imagecreate(900, 235);
	$black[$i] = imagecolorallocate ($image[$i], 0, 0, 0);
	$white[$i] = imagecolorallocate ($image[$i], 255, 255, 255);
	imagefill( $image[$i], 0, 0, $white[$i] );
}

//print bars
for ($i=0; $i < $_GET['rango']; $i++) {
	$location = 100;
	for ( $position = 1 ; $position <= strlen($code_string[$i][0]); $position++ ) {
		$cur_size = ($location + (substr ($code_string[$i][0], ($position-1), 1) ) * $thickness);
		imagefilledrectangle( $image[$i], $location, 0, $cur_size, $img_height, ($position % 2 == 0 ? $white[$i] : $black[$i]) );
		$location = $cur_size;
	}

	$location = 549;
	for ( $position = 1 ; $position <= strlen($code_string[$i][1]); $position++ ) {
		$cur_size = ($location + (substr ($code_string[$i][1], ($position-1), 1) ) * $thickness);
		imagefilledrectangle( $image[$i], $location, 0, $cur_size, $img_height, ($position % 2 == 0 ? $white[$i] : $black[$i]) );
		$location = $cur_size;
	}
}

// Allocate A Color For The Text
for ($i=0; $i < $_GET['rango']; $i++) {
	$white[$i] = imagecolorallocate($image[$i], 0, 0, 0);
	$blue[$i] = imagecolorallocate($image[$i], 96, 167, 209);
}

//get font
$font_path = 'OpenSans-Regular.ttf';

//print text
for ($i=0; $i < $_GET['rango']; $i++) {
	$num_inicioA = substr($text[$i][0],0,2);
	imagettftext($image[$i], 15, 0, 65, 102, $blue[$i], $font_path, $num_inicioA);
	$num_inicioB = substr($text[$i][1],0,2);
	imagettftext($image[$i], 15, 0, 515, 102, $blue[$i], $font_path, $num_inicioB);

	$num_clienteA = substr($text[$i][0],2,10);
	imagettftext($image[$i], 15, 0, 88, 102, $white[$i], $font_path, $num_clienteA);
	$num_clienteB = substr($text[$i][1],2,10);
	imagettftext($image[$i], 15, 0, 538, 102, $white[$i], $font_path, $num_clienteB);

	$num_finalA = substr($text[$i][0],12);
	imagettftext($image[$i], 15, 0, 199, 102, $blue[$i], $font_path, $num_finalA);
	$num_finalB = substr($text[$i][1],12);
	imagettftext($image[$i], 15, 0, 649, 102, $blue[$i], $font_path, $num_finalB);
}

//invoke planilla
for ($i=0; $i < $_GET['rango']; $i++) {
	$dest[$i] = imagecreatefrompng("tarjeta-planilla-7.png");
}

for ($i=0; $i < $_GET['rango']; $i++) {
	imagecopymerge($dest[$i], $image[$i], 5, 100, 0, 0, 860, 105, 100);
}

$full_height = 240.3 * $_GET['rango'];
$back = imagecreatetruecolor ( 867 , $full_height );

$barcode_y = 0;

for ($i=0; $i < $_GET['rango']; $i++) {
	imagecopymerge($back,$dest[$i], 0, $barcode_y, 0, 0, 867, 240.3, 100);
	$barcode_y += 240.3;
}

imagepng($back);

for ($i=0; $i < $_GET['rango']; $i++) {
	imagedestroy($dest[$i]);
}

	
?>