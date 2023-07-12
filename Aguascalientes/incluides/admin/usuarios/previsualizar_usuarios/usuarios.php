<?php
include "../../../header/header_admin.php";
require("../../../base_datos/conexion/conexion.php");
include "../../../modal/agregar/agregar_usuario.php";
include "../../../modal/editar/editar_usuario.php";
?>

<h2>Nuevo Usuarios</h2>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Consultar Usuarios</h4>
    </div>
    <div class="card-body ">
        <div>
            <a data-toggle="modal" href="#modal_agregar_usuario" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fa fa-plus"></i>
                </span>
                <span class="text">Agregar Usuario</span>
            </a>
        </div>
        <br>
        <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>

                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Contraseña</th>
                    <th>Tipo</th>
                    <th>Status</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script src="../../../js/tablas/buscador_usuario.js"></script>

<?php
include "../../../header/header2_admin.php";
?>