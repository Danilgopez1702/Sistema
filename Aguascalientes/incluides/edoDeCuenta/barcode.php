<?php
/*
 *  Author:  David S. Tufts
 *  Company: Rocketwood.LLC
 *	  www.rocketwood.com
 *  Date:	05/25/2003
 *  Usage:
 *	  <img src="/barcode.php?text=testing" alt="testing" />
 */
	
	// Get pararameters that are passed in through $_GET or set to the default value
// Get thickness parameter from $_GET:
function DV ($atributos){
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
			if (strlen($arr1[$key]) > 1) { 
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
	
	foreach ($arr1 as $key => $value) {
		$helper2 += $arr1[$key];
	}

	$helper2 = $helper2 % 10;

	if ($helper2 == 0) {
		$helper2 = 0;
	} else {
		$helper2 = 10 - $helper2;
	}
	return $helper2;
}
	$preciocode = (int)$row['precio_cliente'];
	$preciocode = str_pad($preciocode, 5, '0', STR_PAD_LEFT); 

	$DV = '57'.$row['numero_cliente'].'20500101'.$preciocode;
	$thickness = "2";
	$text = "57".$row['numero_cliente']."20500101".$preciocode.DV($DV);
	$size = "5";
	$orientation = "horizontal";
	$code_type = "code25";
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
	$code_string = "1111" . $code_string . "311";
	
	// Pad the edges of the barcode
	$code_length = 26;
	for ( $i=1; $i <= strlen($code_string); $i++ )
		$code_length = $code_length + (integer)(substr($code_string,($i-1),1));
	if ( strtolower($orientation) == "horizontal" ) {
		//$img_width = $code_length;
		$img_width = $code_length * $thickness;
		$img_height = $size * 20;
	} else {
		$img_width = $size;
		$img_height = $code_length;
	}
	$image = imagecreate($img_width, 120); //CUSTOM MOD
	$black = imagecolorallocate ($image, 0, 0, 0);
	$white = imagecolorallocate ($image, 255, 255, 255);
	imagefill( $image, 0, 0, $white );
	//$location = 10;
	$location = 0;
	for ( $position = 1 ; $position <= strlen($code_string); $position++ ) {
		$cur_size = ($location + (substr ($code_string, ($position-1), 1) ) *$thickness);
		//$cur_size = ($location+(substr($code_string, ($position – 1), 1) )*$thickness);
		//$cur_size = $location + (substr ($code_string, ($position – 1), 1) ) * $thickness;
		if ( strtolower($orientation) == "horizontal" )
			imagefilledrectangle( $image, $location, 0, $cur_size, $img_height, ($position % 2 == 0 ? $white : $black) );
		else
			imagefilledrectangle( $image, 0, $location, $img_width, $cur_size, ($position % 2 == 0 ? $white : $black) );
		$location = $cur_size;
	}


	$srcbarra = $image;

	$white = imagecolorallocate($srcbarra, 0, 0, 0);

	$font_path = dirname(__DIR__).'/edoDeCuenta/OpenSans-Regular.ttf';

	$text = $text;

	imagettftext($srcbarra, 15, 0, 90, 120, $white, $font_path, $text);

?>