<?php
include "../../../header/header_admin.php";
$id_cliente = $_GET['id'];
include "../../../mikrotik/get_info.php";
include "../../../procesos/procesos_caratula.php";
include "../../../modal/pago/pago_manual.php";
?>
<h2>Consulta de Cliente</h2>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Datos de <?php echo $nombre_completo ?> (Numero de cliente: <?php echo $num_cliente ?>).</h4>
    </div>
    <div class="card-body">
        <form class="forms-sample" id="formo" name="formo" method='POST' action='../../../base_datos/editar/editar_cliente.php' enctype="multipart/form-data">
            <!-- Botones -->
            <div class="panel-body text-right">
                <a data-toggle="modal" href="#modal_agregar_pago" type="button" class="btn btn-info">Pago manual</a>
                <button type="button" class="btn btn-primary" id="btn_arreglar" name= "btn_arreglar" onclick="arreglar();">Arreglar</button>
                <?php
                if ($radio_cliente != NULL) {
                ?>
                    <a href="https://<?php echo $ip_cliente ?>/login.cgi?uri=/" type="button" class="btn btn-secondary" target="_blank">Revisar Instalacion</a>
                <?php
                } else {
                ?>
                    <a href="https://<?php echo $ip_olt ?>/action/login.html" type="button" class="btn btn-secondary" target="_blank">Revisar Instalacion</a>
                <?php
                }
                ?>
                <a type="button" class="btn btn-success" id="btn_submit" onclick="formSubmit();">Actualizar</a>
                <button type="button" class="btn btn-warning" id="btn_refresh" name="btn_refresh" onclick="refresh();">Refresh</button>
            </div>
            <br>
            <input type="hidden" id="ids" name="ids" value="<?php echo $id_cliente ?>" />
            <!-- Datos del Contrato -->
            <div class="card shadow mb-4">
                <div class="card-header py-sm-2">
                    <h4 class="m-0 font-weight-bold text-primary">Datos del Contrato</h4>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id_cliente ?>" required="" />
                </div>
                <div class="form-row py-3">
                    <div class="container text-center">
                        <div class="form-row align-items-center">
                            <!-- Folio -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Folio</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="folio" name="folio" maxlength="6" value="<?php echo $folio ?>" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Numero de Cliente -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Numero de Cliente</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="n_cliente" name="n_cliente" value="<?php echo $num_cliente ?>" maxlength="10" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Status de Cliente -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Status de Cliente</label>
                                    <div class="col-sm-8">
                                        <select class="form-control col-sm-12" name="status" id="status" style="border-radius: 5px;" required onchange='precio();'>
                                            <option selected="true"><?php echo $status . " (Actual)" ?></option>
                                            <?php
                                            if ($status_cliente == 0) {
                                            } else {
                                            ?>
                                                <option value="0">Activo</option>
                                            <?php
                                            }
                                            if ($status_cliente == 1) {
                                            } else {
                                            ?>
                                                <option value="1">Por Vencer</option>
                                            <?php }
                                            if ($status_cliente == 2) {
                                            } else {
                                            ?>
                                                <option value="2">Moroso</option>
                                            <?php }
                                            if ($status_cliente == 3) {
                                            } else {
                                            ?>
                                                <option value="3">Moroso Inactivo</option>
                                            <?php }
                                            if ($status_cliente == 4) {
                                            } else {
                                            ?>
                                                <option value="4">Eq Recuperado</option>
                                            <?php }
                                            if ($status_cliente == 5) {
                                            } else {
                                            ?>
                                                <option value="5">Eq por Recuperar</option>
                                            <?php }
                                            if ($status_cliente == 6) {
                                            } else {
                                            ?>
                                                <option value="6">Cancelado</option>
                                            <?php }
                                            if ($status_cliente == 7) {
                                            } else {
                                            ?>
                                                <option value="7">Prospecto</option>
                                            <?php }
                                            if ($status_cliente == 8) {
                                            } else {
                                            ?>
                                                <option value="8">Dificil Recuperacion</option>
                                            <?php }
                                            if ($status_cliente == 9) {
                                            } else {
                                            ?>
                                                <option value="9">Por Revisar</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Velocidad -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Paquete</label>
                                    <div class="col-sm-8">
                                        <select class="form-control col-sm-12" name="paquete" id="paquete" style="border-radius: 5px;" required onchange='precio();'>
                                            <option selected="true"><?php echo $user_profile ?> (Actual)</option>
                                            <option value="2Megas">2 Megas</option>
                                            <option value="4Megas">4 Megas</option>
                                            <option value="6Megas">6 Megas</option>
                                            <option value="8Megas">8 Megas</option>
                                            <option value="10Megas">10 Megas</option>
                                            <option value="15Megas">15 Megas</option>
                                            <option value="5MegasFibra">5 Megas Fibra</option>
                                            <option value="10MegasFibra">10 Megas Fibra</option>
                                            <option value="20Megas">20 Megas</option>
                                            <option value="30Megas">30 Megas</option>
                                            <option value="50Megas">50 Megas</option>
                                            <option value="100Megas">100 Megas</option>
                                            <option value="999999999999">Selecciona un Paquete.....</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Paquete -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Velocidad</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="velocidad" name="velocidad" value="<?php echo $velocidad_cliente ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- Precio Mensual -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Precio Mensual</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="precio_m" name="precio_m" value="<?php echo $precio_m ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- Vendedor -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Vendedor</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="vendedor" id="vendedor" style="border-radius: 5px;">
                                            <option value="<?php echo $vendedor_cliente ?>" selected="true"><?php echo $vendedor ?></option>
                                            <?php
                                            //aqui se seleccion el tipo de usuario tecnico
                                            $tecnico = mysqli_query($conexion, "SELECT * FROM usuario WHERE tipo_usuario = 4 or tipo_usuario = 5");
                                            $result_tecnico = mysqli_num_rows($tecnico);
                                            if ($result_tecnico > 0) {
                                                while ($data_tecnico = mysqli_fetch_assoc($tecnico)) {
                                            ?>
                                                    <option value="<?php echo $data_tecnico['usuario_usuario'] ?>">
                                                        <?php echo $data_tecnico['usuario_usuario'] ?>
                                                    </option>
                                            <?php
                                                }
                                            }
                                            ?>
                                            <option value="999999999999">Selecciona un tecnico.........</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Fecha de Instalacion -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Fecha de Instalacion</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control col-sm-12" id="fecha_instalacion" name="fecha_instalacion" value="<?php echo date('Y-m-d', strtotime($instalacion_cliente)) ?>" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Proxima fecha de Corte -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Proxima fecha de Corte</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control col-sm-12" id="fecha_corte" name="fecha_corte" value="<?php echo date('Y-m-d', strtotime($fecha_corte)) ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Datos del Equipo -->
            <div class="card shadow mb-4">
                <div class="card-header py-sm-2">
                    <h4 class="m-0 font-weight-bold text-primary">Datos del Equipo</h4>
                </div>
                <!-- Seleccion de Instalacion -->
                <div class="form-row py-3">
                    <div class="container text-center">
                        <div class="form-row align-items-center">
                            <!-- Instalador -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Instalador</label>
                                    <div class="col-sm-8">
                                        <select class="form-control col-sm-12" name="instalador" id="instalador" style="border-radius: 5px;" onchange='form_instalacion();'>
                                            <option value="<?php echo $instalador_cliente ?>" selected="true"><?php echo $instalador . " (Actual)" ?></option>
                                            <?php
                                            $tecnico = mysqli_query($conexion, "SELECT * FROM usuario WHERE tipo_usuario = 4");
                                            $result_tecnico = mysqli_num_rows($tecnico);
                                            if ($result_tecnico > 0) {
                                                while ($data_tecnico = mysqli_fetch_assoc($tecnico)) {
                                                    if ($data_tecnico == $instalador_cliente) {
                                                    } else {
                                            ?>

                                                        <option value="<?php echo $data_tecnico['id_usuario'] ?>">
                                                            <?php echo $data_tecnico['usuario_usuario'] ?>
                                                        </option>
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
                                            <option value="999999999999">Selecciona un Instalador....</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Tipo de Instalacion -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label" id="instalacion_div">Tipo de Instalacion</label>
                                    <div class="col-sm-8">
                                        <select class="form-control col-sm-12" name="instalacion_nueva" id="instalacion_nueva" required onchange='form_instalacion();'>
                                            <?php
                                            if ($instalacion == 1) {
                                            ?>
                                                <option value="1" selected="true">Antena</option>
                                                <option value="2">Fibra ONU</option>
                                                <option value="3">Fibra ONT</option>
                                                <option value="0">Selecciona un tipo</option>
                                            <?php
                                            } else if ($instalacion == 2) {
                                            ?>
                                                <option value="1">Antena</option>
                                                <option value="2" selected="true">Fibra ONU</option>
                                                <option value="3">Fibra ONT</option>
                                                <option value="0">Selecciona un tipo</option>
                                            <?php
                                            } else if ($instalacion == 3) {
                                            ?>
                                                <option value="1">Antena</option>
                                                <option value="2">Fibra ONU</option>
                                                <option value="3" selected="true">Fibra ONT</option>
                                                <option value="0">Selecciona un tipo</option>
                                            <?php
                                            }
                                            ?>
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
                                        <select class="form-control col-sm-12" name="antena" id="antena" style="border-radius: 5px;">
                                            <option value="<?php echo $radio_cliente ?>" selected="true"><?php echo $radio_cliente . " (Actual)" ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- IP -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-2 col-form-label">IP</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control col-sm-12" id="ip" name="ip" value="<?php echo $ip_cliente  . " (Actual)" ?>">
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
                                        <select class="form-control col-sm-12" name="zona_onu" id="zona_onu" style="border-radius: 5px;" onchange="seleccion_onu()">
                                            <option value="<?php echo $id_zona ?>"><?php echo $nombre_zona . " (Actual)" ?></option>
                                            <?php
                                            $tecnico = mysqli_query($conexion, "SELECT * FROM zonafibra");
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
                                            <option value="0">Selecciona una Zona....</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Seleccionar Bote -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Seleccionar Bote</label>
                                    <div class="col-sm-8">
                                        <select class="form-control col-sm-12" name="bote_onu" id="bote_onu" style="border-radius: 5px;">
                                            <option value="<?php echo $bote_cliente ?>"><?php echo $bote_cliente . " (Actual)" ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Seleccionar Puerto -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Seleccionar Puerto</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="puerto_onu" name="puerto_onu" value="<?php echo $puerto_cliente ?>" maxlength="2">
                                    </div>
                                </div>
                            </div>
                            <!-- Seleccionar Onu -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Seleccionar ONU</label>
                                    <div class="col-sm-8">
                                        <select class="form-control col-sm-12" name="onu" id="onu" style="border-radius: 5px;">
                                            <option value="<?php echo $onu_cliente ?>"><?php echo $onu_cliente . " (Actual)" ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Router -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Router</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="router" name="router" value="<?php echo $router_cliente ?>" maxlength="12">
                                    </div>
                                </div>
                            </div>
                            <!-- Seleccionar Bandera -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Seleccionar Bandera</label>
                                    <div class="col-sm-8">
                                        <select class="form-control col-sm-12" name="bandera_onu" id="bandera_onu" style="border-radius: 5px;">
                                            <option value="<?php echo $bandera_cliente ?>"><?php echo $bandera_cliente . " (Actual)" ?></option>
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
                                        <select class="form-control col-sm-12" name="zona_ont" id="zona_ont" style="border-radius: 5px;" onchange="seleccion_ont()">
                                            <<option value="<?php echo $id_zona ?>"><?php echo $nombre_zona ?></option>
                                                <?php
                                                $tecnico = mysqli_query($conexion, "SELECT * FROM zonafibra");
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
                                        <select class="form-control col-sm-12" name="bote_ont" id="bote_ont" style="border-radius: 5px;">
                                            <option value="<?php echo $bote_cliente ?>"><?php echo $bote_cliente ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Seleccionar Puerto -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Seleccionar Puerto</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="puerto_ont" name="puerto_ont" value="<?php echo $puerto_cliente ?>" maxlength="2">
                                    </div>
                                </div>
                            </div>
                            <!-- Seleccionar Ont -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Seleccionar ONT</label>
                                    <div class="col-sm-8">
                                        <select class="form-control col-sm-12" name="ont" id="ont" style="border-radius: 5px;">
                                            <option value="<?php echo $ont_cliente ?>"><?php echo $ont_cliente ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Seleccionar Bandera -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Seleccionar Bandera</label>
                                    <div class="col-sm-8">
                                        <select class="form-control col-sm-12" name="bandera_ont" id="bandera_ont" style="border-radius: 5px;">
                                            <option value="<?php echo $bandera_cliente ?>"><?php echo $bandera_cliente ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                        <input type="text" class="form-control col-sm-12" id="nombre" name="nombre" value="<?php echo $nombre ?>" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Apellido Paterno -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Apellido Paterno</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="paterno" name="paterno" value="<?php echo $p_cliente ?>" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Apellido Materno -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Apellido Materno</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="materno" name="materno" value="<?php echo $m_cliente ?>" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Fecha de Nacimiento -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Fecha de Nacimiento</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control col-sm-12" id="nacimiento" name="nacimiento" value="<?php echo $fecha_nacimiento ?>" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Codigo Postal -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Codigo Postal</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="postal" name="postal" value="<?php echo $postal ?>" maxlength="5" require>
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
                                        <input type="text" class="form-control col-sm-12" id="n_ext" name="n_ext" value="<?Php echo $exterior ?>" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Numero Interior -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Numero Interior</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="n_int" name="n_int" value="<?php echo $interior ?>" require>
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
                            <!-- Ingresar Telefono 3 -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Telefono 3</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="tel3" name="tel3" maxlength="10" value="<?php echo $tel3 ?>" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Email -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control col-sm-12" id="email" name="email" value="<?php echo $email ?>" require>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Datos de Referencias -->
            <div class="card shadow mb-4">
                <div class="card-header py-sm-2">
                    <h4 class="m-0 font-weight-bold text-primary">Referencias Personales</h4>
                </div>
                <div class="form-row py-3">
                    <div class="container text-center">
                        <div class="form-row align-items-center">
                            <!-- Ingresar Nombre Referencia 1 -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Nombre Referencia 1</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="ref1" name="ref1" value="<?php echo $ref1 ?>" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Telefono Referencia 1 -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Telefono Referencia 1</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="ref_tel" name="ref_tel" maxlength="10" value="<?php echo $ref_tel ?>" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Nombre Referencia 2 -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Nombre Referencia 2</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="ref2" name="ref2" maxlength="10" value="<?php echo $ref2 ?>" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Telefono Referencia 2 -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Telefono Referencia 2</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="ref_tel2" name="ref_tel2" value="<?php echo $ref_tel2 ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="panel-body text-right">
                <button type="button" class="btn btn-primary btn-icon-split btn-lg col-sm-2" id="btn_submit" onclick="formSubmit();">Actualizar</button>
            </div>
        </form>
    </div>
    <div class="panel-body text-left">
        <?php
        if ($factura == 1) {
        ?>
            <a href="../../../base_datos/editar/cambiar_facturacion.php?id=<?php echo $id_cliente ?>&&estado=1" type="button" class="btn btn-info">Activar Facturacion</a>
        <?php
        } else if ($factura == 2) {
        ?>
            <a href="../../../base_datos/editar/cambiar_facturacion.php?id=<?php echo $id_cliente ?>&&estado=2" type="button" class="btn btn-info">Desactivar Facturacion</a>
            <a href="../facturacion/datos_facturacion.php?id=<?php echo $id_cliente ?>" type="button" class="btn btn-primary" target="_blank">Ver Datos de Facturacion</a>
        <?php
        }
        ?>
        <a href="../../../edoDeCuenta/pdf_estado_cuenta.php?id=<?php echo $id_cliente ?>" type="button" class="btn btn-secondary" target="_blank">Ver estado de cuenta</a>
        <a href="../../pagos_oxxo/agregar/pago_tarjeta.php?id=<?php echo $id_cliente ?>" type="button" class="btn btn-secondary" target="_blank">Realizar Pago con Tarjeta</a>
    </div>
</div>
<script src="../../../js/cliente/editar_cliente.js"></script>
<?php
include "../../../header/header2_admin.php";
?>