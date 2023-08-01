<?php
include "../../../header/header_atc.php";
$id_cliente = $_GET['id'];
include "../../../procesos/procesos_facturacion.php";
include "../../../mikrotik/get_info.php";
?>
<h2>Consulta de Cliente</h2>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Datos de Facturacion de <?php echo $nombre_completo ?> (Numero de cliente: <?php echo $num_cliente ?>).</h4>
    </div>
    <div class="card-body">
        <form class="forms-sample" method='post' id="formo" action='../../../base_datos/subir/add_cliente.php' enctype="multipart/form-data">

        </form>
    </div>
</div>