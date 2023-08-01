<?php
include "../../../header/header_admin.php";
require("../../../base_datos/conexion/conexion.php");
include "../../../modal/editar/editar_ont.php";
?>

<h2>Inventario de ONT</h2>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Consulta de ONT</h4>
    </div>
    <div class="card-body ">
        <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">  
            <thead>
                <tr>
                    
                    <th>ID</th>
                    <th>MAC</th>
                    <th>Onu</th>
                    <th>Asignado</th>
                    <th>En Fallo</th>
                    <th>Agregado</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script src="../../../js/tablas/buscador_ont.js"></script>

<?php
include "../../../header/header2.php";
?>