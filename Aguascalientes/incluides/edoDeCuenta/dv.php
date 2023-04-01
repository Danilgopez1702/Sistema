<?php 
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
?>