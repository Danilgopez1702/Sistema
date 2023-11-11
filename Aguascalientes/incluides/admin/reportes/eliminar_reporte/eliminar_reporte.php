<?php
include "../../../header/header_admin.php";
require("../../../base_datos/conexion/conexion.php");
?>
<h2>Reportes</h2>
<div class="card shadow mb-5">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Cerrar Reportes Antiguos</h4>
    </div>
    <div class="card-body ">
        <br>
        <!-- Datos del Contrato -->
        <div class="card shadow mb-2">
            <div class="card-header py-sm-2">
                <h4 class="m-0 font-weight-bold text-primary">Ingresa el Numero del Cliente:</h4>
            </div>
            <div class="form py-5">
                <div class="container">
                    <form method='POST' id="form" name="form" action='../../../base_datos/eliminar/eliminar_reporte.php'
                        enctype="multipart/form-data">
                        <div class="form-row align-items-center">
                            <div class="form-inline col-sm-8">
                                <label class="col col-form-label">Numero de Cliente:</label>
                                <div class="col">
                                    <input type="text" class="form-control col-sm-12" id="numero" name="numero"
                                        maxlength="10" required>
                                </div>
                                <div class="col">
                                    <button id="eliminar" name="eliminar" class="btn btn-danger"
                                        onclick="eliminar();">Cerrar Reportes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../js/reportes/eliminar.js"></script>
    <?php
    include "../../../header/header2.php";
    ?>