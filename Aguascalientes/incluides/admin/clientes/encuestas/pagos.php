<?php
include "../../../header/header_admin.php";
require("../../../base_datos/conexion/conexion_local.php");
?>

<h2>Tabla de Clientes por Revisar</h2>
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
                        <th>Lugar</th>
                        <th>Cliente</th>
                        <th>Status</th>
                        <th>Fecha Corte</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="../../../js/tablas/buscador_pp.js"></script>
<?php
include "../../../header/header2_admin.php";
?>