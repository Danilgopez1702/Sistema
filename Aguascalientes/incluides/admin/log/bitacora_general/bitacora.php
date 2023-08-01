<?php
include "../../../header/header_admin.php";
require("../../../base_datos/conexion/conexion.php");
?>

<h2>Bitacora</h2>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Consultar Bitacora</h4>
    </div>
    <div class="card-body ">
        <br>
        <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>

                    <th>ID</th>
                    <th>Accion</th>
                    <th>Responsable</th>
                    <th>Numero de Cliente</th>
                    <th>Fecha</th>

                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script src="../../../js/tablas/buscador_bitacora.js"></script>

<?php
include "../../../header/header2.php";
?>