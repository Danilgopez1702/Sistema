<?php
include "../../../header/header_tecnicos.php";
require_once("../../../base_datos/conexion/conexion.php");
$id_tecnico = $_SESSION['id_usuario'];
include "../../../modal/tecnicos/modal_equipo.php";
?>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Panel Principal</h4>
    </div>
    <!-- Busqueda -->
    <div class="card-body w-100 mx-auto">
        <div class="card shadow mb-6">
            <div class="card-header py-sm-2">
                <h4 class="m-0 font-weight-bold text-primary text-left">Buscar Cliente (ingresa el Numero de Cliente o el Nombre del Cliente).</h4>
            </div>
            <div class="card-body">
                <div class="row mx-md-n4">
                    <div class="card-body">
                        <div class="form-row busqueda">
                            <div class="col">
                                <div class="form-group">
                                    <center><label for="exampleInputPassword1">Nombre de Cliente</label></center>
                                    <input type="text" class="form-control" id="num_clienteB">
                                </div>
                            </div>
                            <div class="col text-center">
                                <h3 class="text-dark">ó</h3>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <center><label for="exampleInputPassword1">Nombre de Cliente</label></center>
                                    <input type="text" class="form-control" id="NombreB">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <center><label for="exampleInputPassword1">Apellido Paterno</label></center>
                                    <input type="text" class="form-control" id="ApellidoP">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <center><label for="exampleInputPassword1">Apellido Materno</label></center>
                                    <input type="text" class="form-control" id="ApellidoM">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Datos Cliente -->
    <div class="card-body w-100 mx-auto">
        <div class="card shadow mb-6 mostrar">
            <div class="card-header py-sm-2">
                <h4 class="m-0 font-weight-bold text-primary text-left">Datos del Cliente</h4>
            </div>
            <div class="card-body">
                <div class="row mx-md-n4">
                    <div class="card-body">
                        <h3>
                            <center>Realiza la busqueda del Cliente.</center>
                        </h3>
                        <h3>
                            <center>(ingresa el Numero de Cliente o el Nombre del Cliente).</center>
                        </h3>
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