<?php
$importe = $_GET['importe']; 
$start = $_GET['start'];
?>

<table style="text-align:center;">
	<tr>
		<td>
            <img alt="" width="90%" src="barcode_digital.php?start=<?php echo $start;?>&importe=<?php echo $importe; ?>" />
		</td>
		<td>
		    <img alt="" width="90%" src="barcode_digital_B.php?start=<?php echo $start;?>&importe=<?php echo $importe; ?>" />
		</td>
	</tr>
</table>