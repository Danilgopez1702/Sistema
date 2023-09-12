<!-- Modal -->
<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cambio de Equipo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="formo" method='post' action='../../../base_datos/editar/tecnico/edit_equipo.php' enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="guardar_numero" name="guardar_numero"/>
                    <div class="card shadow mb-4">
                        <div class="card-header py-sm-2">
                            <h4 class="m-0 font-weight-bold text-primary">Datos del Equipo</h4>
                        </div>
                        <!-- Seleccion de Instalacion -->
                        <div class="form-row py-3">
                            <div class="container text-center">
                                <div class="form-row align-items-center">
                                    <input type="hidden" class="form-control" id="instalador" name="instalador"
                                        value="<?php echo $id_tecnico ?>" required="" />
                                    <!-- Tipo de Instalacion -->
                                    <div class="col-md-6 mb-3">
                                        <div class="form-inline">
                                            <label class="col-sm-4 col-form-label" id="instalacion_div">Tipo de
                                                Instalacion</label>
                                            <div class="col-sm-8">
                                                <select class="form-control col-sm-12" name="instalacion_nueva"
                                                    id="instalacion_nueva" required onchange='form_instalacion();'>
                                                    <option value="0" selected="true">Selecciona un tipo</option>
                                                    <option value="1">Antena</option>
                                                    <option value="2">Fibra ONU</option>
                                                    <option value="3">Fibra ONT</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Opcion radio -->
                        <div class="form-row" style="display:none;" id="antena_div">
                            <div class="container text-center">
                                <div class="form-row align-items-center">
                                    <!-- Seleccionar Equipo -->
                                    <div class="col-md-6 mb-3">
                                        <div class="form-inline">
                                            <label class="col-sm-4 col-form-label">Seleccionar Equipo</label>
                                            <div class="col-sm-8">
                                                <select class="form-control col-sm-12" name="antena" id="antena"
                                                    style="border-radius: 5px;">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- IP -->
                                    <div class="col-md-6 mb-3">
                                        <div class="form-inline">
                                            <label class="col-sm-2 col-form-label">IP</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control col-sm-12" id="ip" name="ip">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Opcion Onu -->
                        <div class="form-row" style="display:none;" id="onu_div">
                            <div class="container text-center">
                                <div class="form-row align-items-center">
                                    <!-- Selecciona Zona -->
                                    <div class="col-md-6 mb-3">
                                        <div class="form-inline">
                                            <label class="col-sm-4 col-form-label">Seleccionar Zona</label>
                                            <div class="col-sm-8">
                                                <select class="form-control col-sm-12" name="zona_onu" id="zona_onu"
                                                    style="border-radius: 5px;" onchange="seleccion_onu()">
                                                    <option value="0">Selecciona una Zona....</option>
                                                    <?php
                                                    $tecnico = mysqli_query($conexion, "SELECT * FROM zonafibra ORDER BY id_zonafibra ASC");
                                                    $result_tecnico = mysqli_num_rows($tecnico);
                                                    if ($result_tecnico > 0) {
                                                        while ($data_tecnico = mysqli_fetch_assoc($tecnico)) {
                                                            ?>
                                                            <option value="<?php echo $data_tecnico['id_zonafibra'] ?>">
                                                                <?php echo $data_tecnico['nombre_zonafibra'] ?>
                                                            </option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Seleccionar Bote -->
                                    <div class="col-md-6 mb-3">
                                        <div class="form-inline">
                                            <label class="col-sm-4 col-form-label">Seleccionar Bote</label>
                                            <div class="col-sm-8">
                                                <select class="form-control col-sm-12" name="bote_onu" id="bote_onu"
                                                    style="border-radius: 5px;">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Seleccionar Puerto -->
                                    <div class="col-md-6 mb-3">
                                        <div class="form-inline">
                                            <label class="col-sm-4 col-form-label">Seleccionar Puerto</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control col-sm-12" id="puerto_onu"
                                                    name="puerto_onu" maxlength="2">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Seleccionar Onu -->
                                    <div class="col-md-6 mb-3">
                                        <div class="form-inline">
                                            <label class="col-sm-4 col-form-label">Seleccionar ONU</label>
                                            <div class="col-sm-8">
                                                <select class="form-control col-sm-12" name="onu" id="onu"
                                                    style="border-radius: 5px;">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Ingresar Router -->
                                    <div class="col-md-6 mb-3">
                                        <div class="form-inline">
                                            <label class="col-sm-4 col-form-label">Router</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control col-sm-12" id="router"
                                                    name="router" maxlength="12">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Seleccionar Bandera -->
                                    <div class="col-md-6 mb-3">
                                        <div class="form-inline">
                                            <label class="col-sm-4 col-form-label">Seleccionar Bandera</label>
                                            <div class="col-sm-8">
                                                <select class="form-control col-sm-12" name="bandera_onu"
                                                    id="bandera_onu" style="border-radius: 5px;">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Opcion Ont -->
                        <div class="form-row" style="display:none;" id="ont_div">
                            <div class="container text-center">
                                <div class="form-row align-items-center">
                                    <!-- Selecciona Zona -->
                                    <div class="col-md-6 mb-3">
                                        <div class="form-inline">
                                            <label class="col-sm-4 col-form-label">Seleccionar Zona</label>
                                            <div class="col-sm-8">
                                                <select class="form-control col-sm-12" name="zona_ont" id="zona_ont"
                                                    style="border-radius: 5px;" onchange="seleccion_ont()">
                                                    <option value="0">Selecciona una Zona....</option>
                                                    <?php
                                                    $tecnico = mysqli_query($conexion, "SELECT * FROM zonafibra ORDER BY id_zonafibra ASC");
                                                    $result_tecnico = mysqli_num_rows($tecnico);
                                                    if ($result_tecnico > 0) {
                                                        while ($data_tecnico = mysqli_fetch_assoc($tecnico)) {
                                                            ?>
                                                            <option value="<?php echo $data_tecnico['id_zonafibra'] ?>">
                                                                <?php echo $data_tecnico['nombre_zonafibra'] ?>
                                                            </option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Seleccionar Bote -->
                                    <div class="col-md-6 mb-3">
                                        <div class="form-inline">
                                            <label class="col-sm-4 col-form-label">Seleccionar Bote</label>
                                            <div class="col-sm-8">
                                                <select class="form-control col-sm-12" name="bote_ont" id="bote_ont"
                                                    style="border-radius: 5px;">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Seleccionar Puerto -->
                                    <div class="col-md-6 mb-3">
                                        <div class="form-inline">
                                            <label class="col-sm-4 col-form-label">Seleccionar Puerto</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control col-sm-12" id="puerto_ont"
                                                    name="puerto_ont" maxlength="2">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Seleccionar Ont -->
                                    <div class="col-md-6 mb-3">
                                        <div class="form-inline">
                                            <label class="col-sm-4 col-form-label">Seleccionar ONT</label>
                                            <div class="col-sm-8">
                                                <select class="form-control col-sm-12" name="ont" id="ont"
                                                    style="border-radius: 5px;">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Seleccionar Bandera -->
                                    <div class="col-md-6 mb-3">
                                        <div class="form-inline">
                                            <label class="col-sm-4 col-form-label">Seleccionar Bandera</label>
                                            <div class="col-sm-8">
                                                <select class="form-control col-sm-12" name="bandera_ont"
                                                    id="bandera_ont" style="border-radius: 5px;">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="guardar" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary submitBtn" onclick="formSubmit();">Guardar</button>
            </div>
        </div>
    </div>
</div>