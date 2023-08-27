<?php
	require_once "conexion_antiguo.php";
	
	$inicio = 5451;
	$fin = 5502;
	

	for($inicio; $inicio < $fin; $inicio++){
		$bandera = 'A0000'.$inicio;
		$subida = mysqli_query($con,"INSERT INTO `inventarioBandera`(`no_bandera`, `fallo`)
		 VALUES ('$bandera', 'NO')");
		 echo $bandera;
	}