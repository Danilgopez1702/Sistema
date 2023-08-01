<?php
include "../../../header/header_admin.php";
require("../../../base_datos/conexion/conexion.php");
include "../../../modal/agregar/agregar_olt.php";
include "../../../modal/editar/editar_olt.php";
?>

<h2>OLT</h2>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Consultar OLT</h4>
    </div>
    <div class="card-body ">
        <div>
            <a data-toggle="modal" href="#modal_agregar_olt" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fa fa-plus"></i>
                </span>
                <span class="text">Agregar OLT</span>
            </a>
        </div>
        <br>
        <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Botes</th>
                    <th>Puertos</th>
                    <th>Tipo</th>
                    <th>Ip</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script src="../../../js/tablas/buscador_olt.js"></script>

<?php
include "../../../header/header2.php";
?>