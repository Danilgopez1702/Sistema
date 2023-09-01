<?php

include_once "../../../header/header_tecnicos.php";
include "../../../procesos/dashboard.php";

?>
<h2>Inicio</h2>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Panel Principal</h4>
    </div>
    <!-- Datos del Contrato -->
    <div class="card-body w-100 mx-auto">
        <div class="card shadow mb-6">
            <div class="card-header py-sm-2">
                <h4 class="m-0 font-weight-bold text-primary text-center">Contratos en Revision</h4>
            </div>
            <div class="card-body">
                <div class="row mx-md-n4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm" id="revision" width="100%" cellspacing="2">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Status</th>
                                        <th>Ont</th>
                                        <th>Onu</th>
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
            </div>
        </div>
    </div>
    <!-- Reparaciones -->
    <div class="card-body w-100 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-header py-sm-2">
                <h4 class="m-0 font-weight-bold text-primary text-center">Reparaciones</h4>
            </div>
            <div class="card-body">
                <div class="row mx-md-n4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm" id="reparaciones" width="100%" cellspacing="2">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Status</th>
                                        <th># Reporte</th>
                                        <th>Numero del Cliente</th>
                                        <th>Nombre del Cliente</th>
                                        <th>Agente</th>
                                        <th>Tipo de Reporte</th>
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
                </div>
            </div>
        </div>
    </div>
    <script src="../../../js/tablas_tecnico/dashboard.js"></script>

    <?php
    include_once "../../../header/header2.php";
    ?>