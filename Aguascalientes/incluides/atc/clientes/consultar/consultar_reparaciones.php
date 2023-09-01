<?php
include "../../../header/header_atc.php";
require("../../../base_datos/conexion/conexion.php");
$acomodo = $_GET['acomodo'];

if ($acomodo == 1) {
    $oracion = "Primera Revisión";
} else if ($acomodo == 2) {
    $oracion = "Segunda Revisión";
} else if ($acomodo == 3) {
    $oracion = "Revisón Morosa";
}
?>

<h2>Tabla de <?php echo $oracion ?>
</h2>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Consultar Reportes</h4>
    </div>
    <div class="card-body ">

        <br>
        <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
        <input  type="hidden" class="form-control" id="acomodo" name="acomodo" value="<?php echo $acomodo ?>" />
            <thead>
                <tr>

                    <th>ID</th>
                    <th>Activo</th>
                    <th># Reporte</th>
                    <th>Numero del Cliente</th>
                    <th>Nombre del Cliente</th>
                    <th>Agente</th>
                    <th>Tecnico Asignado</th>
                    <th>Fecha del Reporte</th>
                    <th>tipo</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script src="../../../js/tablas/buscador_reparacion.js"></script>

<?php
include "../../../header/header2.php";
?>