<?php

include "../../../header/header_admin.php";
require_once("../../../base_datos/conexion/conexion.php");

?>

<h2>Nuevo Cliente</h2>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Datos del Cliente</h4>
    </div>
    <div class="card-body">
        <form class="forms-sample" method='post' id="formo" action='../../../base_datos/subir/add_prospecto.php' enctype="multipart/form-data">
            <!-- Datos del Contrato -->

            <!-- Datos del Contrato -->
            <div class="card shadow mb-4">
                <div class="card-header py-sm-2">
                    <h4 class="m-0 font-weight-bold text-primary">Datos del Contrato</h4>
                </div>
                <div class="form-row py-3">
                    <div class="container text-center">
                        <div class="form-row align-items-center">
                            <!-- Ingresar Nombre -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Nombre(s)</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="nombre" name="nombre" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Apellido Paterno -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Apellido Paterno</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="paterno" name="paterno" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Apellido Materno -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Apellido Materno</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="materno" name="materno" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Codigo Postal -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Codigo Postal</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="postal" name="postal" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Estado -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Estado</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="estado" name="estado" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Municipio -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Municipio</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="municipio" name="municipio" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Colonia -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Colonia</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="colonia" name="colonia" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Calle -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Calle</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="calle" name="calle" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Numero Exterior -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Numero Exterior</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="n_ext" name="n_ext" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Numero Interior -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Numero Interior</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="n_int" name="n_int">
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Entre Calle 1 -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Entre Calle 1</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="calle1" name="calle1" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Entre Calle 2 -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Entre Calle 2</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="calle2" name="calle2" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Referencia Domiciliaria -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Referencia Domiciliaria</label>
                                    <div class="col-sm-8">
                                        <textarea type="text" class="form-control col-sm-12" id="ref" name="ref" require></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Telefono 1 -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Telefono 1</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="tel1" name="tel1" maxlength="10" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Telefono 2 -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Telefono 2</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="tel2" name="tel2" maxlength="10" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Referencia Domiciliaria -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Comentarios</label>
                                    <div class="col-sm-8">
                                        <textarea type="text" class="form-control col-sm-12" id="comentario" name="comentario" require></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body text-right">
                    <button type="submit" class="btn btn-primary btn-icon-split btn-lg col-sm-2">Agregar Prospecto</button>
                </div>
        </form>
    </div>
</div>
<?php
include "../../../header/header2.php";
?>