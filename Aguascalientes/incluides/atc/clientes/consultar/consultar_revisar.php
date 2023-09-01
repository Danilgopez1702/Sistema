<?php
include "../../../header/header_atc.php";
require("../../../base_datos/conexion/conexion.php");
?>

<h2>Tabla de Clientes por Revisar</h2>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Consultar Cliente</h4>
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
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="../../../js/tablas_atc/buscador_revisar.js"></script>
<?php
include "../../../header/header2.php";
?>