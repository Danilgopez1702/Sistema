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
        <form class="forms-sample" method='post' id="formo" action='../../../base_datos/subir/add_cliente.php' enctype="multipart/form-data">
            <!-- Datos del Contrato -->
            <div class="card shadow mb-4">
                <div class="card-header py-sm-2">
                    <h4 class="m-0 font-weight-bold text-primary">Datos del Contrato</h4>
                </div>
                <div class="form-row py-3">
                    <div class="container text-center">
                        <div class="form-row align-items-center">
                            <!-- Folio -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Folio</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="folio" name="folio" maxlength="6" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Numero de Cliente -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Numero de Cliente</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="n_cliente" name="n_cliente" maxlength="10" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Paquete -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Paquete</label>
                                    <div class="col-sm-8">
                                        <select class="form-control col-sm-12" name="paquete" id="paquete" style="border-radius: 5px;" required onchange='precio();'>
                                            <option value="0">Selecciona un paquete...</option>
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
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Velocidad -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Velocidad</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="velocidad" name="velocidad" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- Precio Mensual -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Precio Mensual</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="precio_m" name="precio_m" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- Vendedor -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Vendedor</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="vendedor" id="vendedor" style="border-radius: 5px;" require>
                                            <!--el valor 999999999999 es el tecnico default-->
                                            <option value="999999999999">Selecciona un tecnico....</option>
                                            <?php
                                            //aqui se seleccion el tipo de usuario tecnico
                                            $tecnico = mysqli_query($conexion, "SELECT * FROM usuario WHERE tipo_usuario = 4 or tipo_usuario = 5");
                                            $result_tecnico = mysqli_num_rows($tecnico);
                                            if ($result_tecnico > 0) {
                                                while ($data_tecnico = mysqli_fetch_assoc($tecnico)) {
                                            ?>
                                                    <option value="<?php echo $data_tecnico['id_usuario'] ?>">
                                                        <?php echo $data_tecnico['usuario_usuario'] ?>
                                                    </option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Fecha de Instalacion -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Fecha de Instalacion</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control col-sm-12" id="fecha_instalacion" name="fecha_instalacion" required>
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
                                            <option value="999999999999">Selecciona un tecnico....</option>
                                            <?php
                                            $tecnico = mysqli_query($conexion, "SELECT * FROM usuario WHERE tipo_usuario = 4");
                                            $result_tecnico = mysqli_num_rows($tecnico);
                                            if ($result_tecnico > 0) {
                                                while ($data_tecnico = mysqli_fetch_assoc($tecnico)) {
                                            ?>
                                                    <option value="<?php echo $data_tecnico['id_usuario'] ?>">
                                                        <?php echo $data_tecnico['usuario_usuario'] ?>
                                                    </option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Tipo de Instalacion -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label" style="visibility:hidden" id="instalacion_div">Tipo de Instalacion</label>
                                    <div class="col-sm-8">
                                        <select style="visibility:hidden" class="form-control col-sm-12" name="instalacion_nueva" id="instalacion_nueva" required onchange='form_instalacion();'>
                                            <option value="0">Selecciona un tipo</option>
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
                                        <select class="form-control col-sm-12" name="antena" id="antena" style="border-radius: 5px;" require>
                                            <option>Selecciona un Radio...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- IP -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-2 col-form-label">IP</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control col-sm-2" id="ip1" name="ip1" value="10." disabled>
                                        <input type="text" class="form-control col-sm-2" id="ip2" name="ip2" require>
                                        <input type="text" class="form-control col-sm-2" id="ip3" name="ip3" require>
                                        <input type="text" class="form-control col-sm-2" id="ip4" name="ip4" require>
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
                                        <select class="form-control col-sm-12" name="zona_onu" id="zona_onu" style="border-radius: 5px;" require onchange="seleccion_onu()">
                                            <option value="0">Selecciona una Zona....</option>
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
                            <!-- Seleccioanr Bote -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Seleccionar Bote</label>
                                    <div class="col-sm-8">
                                        <select class="form-control col-sm-12" name="bote_onu" id="bote_onu" style="border-radius: 5px;"> require
                                            <option value="0">Selecciona un bote....</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Seleccionar Puerto -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Seleccionar Puerto</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="puerto_onu" name="puerto_onu" maxlength="4" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Seleccioanr Onu -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Seleccionar ONU</label>
                                    <div class="col-sm-8">
                                        <select class="form-control col-sm-12" name="onu" id="onu" style="border-radius: 5px;" require>
                                            <option value="0">Selecciona una ONU....</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Router -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Router</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="router" name="router" maxlength="12" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Seleccioanr Bandera -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Seleccioanr Bandera</label>
                                    <div class="col-sm-8">
                                        <select class="form-control col-sm-12" name="bandera_onu" id="bandera_onu" style="border-radius: 5px;" require>
                                            <option value="0">Selecciona una Bandera....</option>
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
                                        <select class="form-control col-sm-12" name="zona_ont" id="zona_ont" style="border-radius: 5px;" require onchange="seleccion_ont()">
                                            <option value="0">Selecciona una Zona....</option>
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
                            <!-- Seleccioanr Bote -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Seleccionar Bote</label>
                                    <div class="col-sm-8">
                                        <select class="form-control col-sm-12" name="bote_ont" id="bote_ont" style="border-radius: 5px;" require>
                                            <option value="0">Selecciona un bote....</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Seleccionar Puerto -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Seleccionar Puerto</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="puerto_ont" name="puerto_ont" maxlength="4" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Seleccioanr Ont -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Seleccionar ONT</label>
                                    <div class="col-sm-8">
                                        <select class="form-control col-sm-12" name="ont" id="ont" style="border-radius: 5px;" require>
                                            <option value="0">Selecciona una ONT....</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Seleccioanr Bandera -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Seleccioanr Bandera</label>
                                    <div class="col-sm-8">
                                        <select class="form-control col-sm-12" name="bandera_ont" id="bandera_ont" style="border-radius: 5px;" require>
                                            <option value="0">Selecciona una Bandera....</option>
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
                            <!-- Ingresar Fecha de Nacimiento -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Fecha de Nacimiento</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control col-sm-12" id="nacimiento" name="nacimiento" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Codigo Postal -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Codigo Postal</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="postal" name="postal" maxlength="5" require>
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
                            <!-- Ingresar Telefono 3 -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Telefono 3</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="tel3" name="tel3" maxlength="10">
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Email -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control col-sm-12" id="email" name="email" require>
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
                                        <input type="text" class="form-control col-sm-12" id="ref1" name="ref1" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Telefono Referencia 1 -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Telefono Referencia 1</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="ref_tel" maxlength="10" name="ref_tel" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Nombre Referencia 2 -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Nombre Referencia 2</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="ref2" name="ref2" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Telefono Referencia 2 -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Telefono Referencia 2</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="ref_tel2" maxlength="10" name="ref_tel2" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="panel-body text-right">
                <button type="button" id="btn_submit" class="btn btn-primary btn-icon-split btn-lg col-sm-2" onclick="formSubmit();">Agregar Cliente</button>
            </div>
        </form>
    </div>
</div>
<script src="../../../js/cliente/nuevo_cliente.js"></script>
<!-- estos 3 renglones son para los poop ups con el tostring-->
<link href = "../../../js/toastr/toastr.min.css" rel="stylesheet" >
<script src="https:ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../../../js/toastr/toastr.min.js"></script>
<?php
include "../../../header/header2.php";
?>