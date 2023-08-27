<?php
include "../../../header/header_tecnicos.php";
require_once("../../../base_datos/conexion/conexion.php");
?>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Panel Principal</h4>
    </div>
    <!-- Busqueda -->
    <div class="card-body w-100 mx-auto">
        <div class="card shadow mb-6">
            <div class="card-header py-sm-2">
                <h4 class="m-0 font-weight-bold text-primary text-left">Buscar Cliente</h4>
            </div>
            <div class="card-body">
                <div class="row mx-md-n4">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Numero de Cliente">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Apellido Paterno">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Apellido Materno">
                            </div>
                            <div class="col text-center">
                            <button type="submit" class="btn btn-primary" id="buscar" name="buscar" onclick="busqueda();">Buscar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Datos Cliente -->
    <div class="card-body w-100 mx-auto">
        <div class="card shadow mb-6">
            <div class="card-header py-sm-2">
                <h4 class="m-0 font-weight-bold text-primary text-left">Datos del Cliente</h4>
            </div>
            <div class="card-body">
                <div class="row mx-md-n4">
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../../../js/cliente/consultar_cliente_tecnico.js"></script>
<?php
include "../../../header/header2.php";
?>