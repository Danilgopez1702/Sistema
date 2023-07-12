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

$DV = '574004'.$_GET['texto'].'20500101'.$_GET['importe'];

//echo DV($DV);
?>
<table style="text-align:center;">
	<tr>
		<td>
<img alt="<?php echo $_GET['texto'] ?>" src="barcode.php?text=574004<?php echo $_GET['texto'];?>20500101<?php echo $_GET['importe'].DV($DV); ?>&thickness=2&size=5&codetype=code25&tipo=<?php echo $_GET['tipo'];?>" />
		</td>
	</tr>
</table>