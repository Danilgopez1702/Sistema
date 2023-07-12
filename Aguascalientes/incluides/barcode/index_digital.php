<?php 
    require("../connection.php");
    $client = $_GET['client'];
    $sql = mysqli_query($con, "SELECT * FROM `clientes` WHERE `num_cliente` LIKE '$client'");
    $data = mysqli_fetch_assoc($sql);
    
    $p_mensual = $data['precio_mensual'];
    $importe = substr($p_mensual, 0, -3); 
    $start = substr($client, -6);

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
