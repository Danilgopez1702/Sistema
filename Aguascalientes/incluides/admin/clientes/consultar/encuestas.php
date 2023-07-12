<?php
include "../../../header/header_admin.php";
require("../../../base_datos/conexion/conexion.php");
$acomodo = $_GET['acomodo'];
?>

<h2>Contratos por Encuestar</h2>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Consultar Contratos por Encuestar</h4>
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
                        <th>Numero de Cliente</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Nombre(s)</th>
                        <th>Fecha de Instalacion</th>
                        <th>Revisar</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="../../../js/tablas/buscador_encuestas.js"></script>
<?php
include "../../../header/header2_admin.php";
?>