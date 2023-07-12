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
	$size = 3;
	$thickness = 1.3;
	$code_string = "";
	$code_string2 = "";

	$text = "57400400000120500101299000";
	$text2 ="57400400019920500101299009";

	// Translate the $text into barcode the correct $code_type
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


	for ( $X = 1; $X <= strlen($text2); $X++ ) {
		for ( $Y = 0; $Y < count($code_array1); $Y++ ) {
			if ( substr($text2, ($X-1), 1) == $code_array1[$Y] )
				$temp[$X] = $code_array2[$Y];
		}
	}
	for ( $X=1; $X<=strlen($text2); $X+=2 ) {
		if ( isset($temp[$X]) && isset($temp[($X + 1)]) ) {
			$temp1 = explode( "-", $temp[$X] );
			$temp2 = explode( "-", $temp[($X + 1)] );
			for ( $Y = 0; $Y < count($temp1); $Y++ )
				$code_string2 .= $temp1[$Y] . $temp2[$Y];
		}
	}
	$code_string2 = "1111" . $code_string2 . "311";

	// Pad the edges of the barcode
	/*$code_length = 26;
	for ( $i=1; $i <= strlen($code_string); $i++ )
		$code_length = $code_length + (integer)(substr($code_string,($i-1),1));*/

	//$img_width = $code_length;
	$img_width = 262 * $thickness;
	$img_height = 60;
	
	$image = imagecreate($img_width, 120);
	$black = imagecolorallocate ($image, 0, 0, 0);
	$white = imagecolorallocate ($image, 255, 255, 255);
	imagefill( $image, 0, 0, $white );

	$image2 = imagecreate($img_width, 120);
	$black2 = imagecolorallocate ($image2, 0, 0, 0);
	$white2 = imagecolorallocate ($image2, 255, 255, 255);
	imagefill( $image2, 0, 0, $white2 );


	$location = 0;
	for ( $position = 1 ; $position <= strlen($code_string); $position++ ) {
		$cur_size = ($location + (substr ($code_string, ($position-1), 1) ) * $thickness);
		imagefilledrectangle( $image, $location, 0, $cur_size, $img_height, ($position % 2 == 0 ? $white : $black) );
		$location = $cur_size;
	}

	$location = 0;
	for ( $position = 1 ; $position <= strlen($code_string2); $position++ ) {
		$cur_size = ($location + (substr ($code_string2, ($position-1), 1) ) * $thickness);
		imagefilledrectangle( $image2, $location, 0, $cur_size, $img_height, ($position % 2 == 0 ? $white : $black) );
		$location = $cur_size;
	}


	// Draw barcode to the screen
	header ('Content-type: image/png');

	// Allocate A Color For The Text
	$white = imagecolorallocate($image, 0, 0, 0);
	$white2 = imagecolorallocate($image2, 0, 0, 0);

	// Set Path to Font File
	$font_path = 'OpenSans-Regular.ttf';

	// Set Text to Be Printed On Image
	$text = $text;
	$text2 = $text2;

	// Print Text On Image
	imagettftext($image, 15, 0, 15, 80, $white, $font_path, $text);
	imagettftext($image2, 15, 0, 15, 80, $white, $font_path, $text2);

			//creas plantilla de 2
			$dest = imagecreatefrompng('tarjeta-planilla.png');
			$dest2 = imagecreatefrompng('tarjeta-planilla.png');
			$dest3 = imagecreatefrompng('tarjeta-planilla.png');
			$dest4 = imagecreatefrompng('tarjeta-planilla.png');
			$dest5 = imagecreatefrompng('tarjeta-planilla.png');
			$dest6 = imagecreatefrompng('tarjeta-planilla.png');

			//agregas barcode
			imagecopymerge($dest, $image, 22, 100, 0, 0, 340, 80, 100);
			imagecopymerge($dest, $image, 390, 100, 0, 0, 340, 80, 100);

			imagecopymerge($dest2, $image2, 22, 100, 0, 0, 340, 80, 100);
			imagecopymerge($dest2, $image2, 390, 100, 0, 0, 340, 80, 100);

			$back = imagecreatetruecolor ( 732 , 1290 );
			// Copy and merge

			imagecopymerge($back, $dest, 0, 0, 0, 0, 732, 215, 100);
			imagecopymerge($back, $dest2, 0, 215, 0, 0, 732, 215, 100);
			imagecopymerge($back, $dest3, 0, 430, 0, 0, 732, 215, 100);
			imagecopymerge($back, $dest4, 0, 645, 0, 0, 732, 215, 100);
			imagecopymerge($back, $dest5, 0, 860, 0, 0, 732, 215, 100);
			imagecopymerge($back, $dest5, 0, 1075, 0, 0, 732, 215, 100);

			// Copy and merge
			//imagecopymerge($dest, $image, 390, 100, 0, 0, 340, 80, 100);

			/*
			loop
			*/
			/*for ($i=0; $i < 2; $i++) { 
				$part_image = imagecreatetruecolor(you know your parameters, atleast you should);
				//do the imagecopyresampled with your coordinates 
				imagepng($part_image, $part_path); //save the image, make sure each time you do a different filename in order not to overwrite the first part - maybe increment a $counter variable and append it to the filename like "part1.jpg" and so on
				//or imagepng, see php docs for these functions
				imagedestroy($part_image);
			}*/
			/*
			loop end
			*/

			// Output and free from memory
			//header('Content-Type: image/gif');
			imagepng($back);

			imagedestroy($dest);
			imagedestroy($dest2);
			imagedestroy($dest3);
			imagedestroy($dest4);
			imagedestroy($dest5);
			imagedestroy($src);
	
?>