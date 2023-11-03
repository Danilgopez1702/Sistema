<?php
include "../../../header/header_admin.php";
require("../../../base_datos/conexion/conexion.php");
$acomodo = $_GET['acomodo'];

if ($acomodo == 0) {
	$oracion = "Clientes Activos";
} else if ($acomodo == 1) {
	$oracion = "Clientes Por Vencer";
} else if ($acomodo == 2) {
	$oracion = "Clientes Morosos";
} else if ($acomodo == 3) {
	$oracion = "Clientes Morosos Inactivos";
} else if ($acomodo == 4) {
	$oracion = "Equipos Recuperados";
} else if ($acomodo == 5) {
	$oracion = "Equipos por Recuperar";
} else if ($acomodo == 6) {
	$oracion = "Clientes Cancelados";
} else if ($acomodo == 7) {
	$oracion = "Prospectos";
} else if ($acomodo == 8) {
	$oracion = "Dificil Recuperacion";
} else if ($acomodo == 9) {
	$oracion = "Clientes por Revisar";
}else{
    $oracion = "Clientes";
}
?>

<h2>Tabla de <?php echo $oracion ?></h2>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Consultar Cliente</h4>
        <input  type="hidden" class="form-control" id="acomodo" name="acomodo" value="<?php echo $acomodo ?>" />
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Status</th>
                        <th>Folio</th>
                        <th>Onu</th>
                        <th>Ont</th>
                        <th>Bandera</th>
                        <th>Numero de Cliente</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Nombre(s)</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="../../../js/tablas/buscador_contrato.js"></script>
<?php
include "../../../header/header2.php";
?>