<?php

include "../../../header/header_admin.php";
require_once("../../../base_datos/conexion/conexion.php");
$id_prosp = $_GET['id'];
include "../../../procesos/prospectos.php";
?>

<h2>Prospecto</h2>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Datos del Cliente</h4>
    </div>
    <div class="card-body">
        <form class="forms-sample" method='post' id="formo" action='../../../base_datos/subir/prospecto_a_cliente.php' enctype="multipart/form-data">
            <!-- Datos del Contrato -->
            <div class="card shadow mb-4">
                <div class="card-header py-sm-2">
                    <h4 class="m-0 font-weight-bold text-primary">Datos del Contrato</h4>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id_prosp ?>" required="" />
                </div>
                <div class="form-row py-3">
                    <div class="container text-center">
                        <div class="form-row align-items-center">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id_cliente ?>" required="" />
                            <!-- Ingresar Nombre -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Nombre(s)</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="nombre" name="nombre" value="<?php echo $nombre ?>" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Apellido Paterno -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Apellido Paterno</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="paterno" name="paterno" value="<?php echo $paterno ?>" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Apellido Materno -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Apellido Materno</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="materno" name="materno" value="<?php echo $materno ?>" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Codigo Postal -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Codigo Postal</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="postal" name="postal" value="<?php echo $postal ?>" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Estado -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Estado</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="estado" name="estado" value="<?php echo $estado ?>" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Municipio -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Municipio</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="municipio" name="municipio" value="<?php echo $municipio ?>" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Colonia -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Colonia</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="colonia" name="colonia" value="<?php echo $colonia ?>" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Calle -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Calle</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="calle" name="calle" value="<?php echo $calle ?>" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Numero Exterior -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Numero Exterior</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="n_ext" name="n_ext" value="<?php echo $n_ext ?>" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Numero Interior -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Numero Interior</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="n_int" name="n_int" value="<?php echo $n_int ?>">
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Entre Calle 1 -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Entre Calle 1</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="calle1" name="calle1" value="<?php echo $calle1 ?>" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Entre Calle 2 -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Entre Calle 2</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="calle2" name="calle2" value="<?php echo $calle2 ?>" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Referencia Domiciliaria -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Referencia Domiciliaria</label>
                                    <div class="col-sm-8">
                                        <textarea type="text" class="form-control col-sm-12" id="ref" name="ref" require><?php echo $ref ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Telefono 1 -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Telefono 1</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="tel1" name="tel1" maxlength="10" value="<?php echo $tel1 ?>" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Telefono 2 -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Telefono 2</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="tel2" name="tel2" maxlength="10" value="<?php echo $tel2 ?>" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Referencia Domiciliaria -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Comentarios</label>
                                    <div class="col-sm-8">
                                        <textarea type="text" class="form-control col-sm-12" id="comentarios" name="comentarios" require><?php echo $comentarios ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-body text-right">
                <button type="submit" class="btn btn-primary btn-icon-split btn-lg col-sm-2">Agregar Cliente</button>
            </div>
        </form>
    </div>
</div>
<?php
include "../../../header/header2_admin.php";
?>