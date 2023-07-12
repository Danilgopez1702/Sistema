<?php
include "../../../header/header_admin.php";
require("../../../base_datos/conexion/conexion.php");

?>

<h2>Ver migraciones</h2>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Consultar Migraciones</h4>
    </div>
    <div class="card-body ">

        <br>
        <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
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
                    <th>Comentario</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script src="../../../js/tablas/buscador_migraciones.js"></script>

<?php
include "../../../header/header2_admin.php";
?>