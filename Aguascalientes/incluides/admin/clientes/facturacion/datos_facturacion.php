<?php
include "../../../header/header_admin.php";
$id_cliente = $_GET['id'];
include "../../../procesos/procesos_facturacion.php";
?>
<h2>Factura del Cliente</h2>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Datos de Facturacion de <?php echo $nombre_completo ?> (Numero de cliente: <?php echo $num_cliente ?>).</h4>
    </div>
    <div class="card-body">
        <form class="forms-sample" method='post' id="formo" action='../../../base_datos/editar/cliente_facturacion.php' enctype="multipart/form-data">
            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id_cliente ?>"/>
            <!-- Informacion del Paquete Contratado -->
            <div class="card shadow mb-4">
                <div class="card-header py-sm-2">
                    <h4 class="m-0 font-weight-bold text-primary">Informacion del Paquete Contratado</h4>
                </div>
                <div class="form-row py-3">
                    <div class="container text-center">
                        <div class="form-row align-items-center">
                            <!-- Precio Mensual -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Monto (Precio Mensual)</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="mensual" name="mensual" value="<?php echo $precio_cliente ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- Fecha de Emicion -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Fecha de Emicion</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="emicion" name="emicion" value="<?php echo $fechaActual ?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Datos del Cliente -->
            <div class="card shadow mb-4">
                <div class="card-header py-sm-2">
                    <h4 class="m-0 font-weight-bold text-primary">Datos del Cliente</h4>
                </div>
                <div class="form-row py-3">
                    <div class="container text-center">
                        <div class="form-row align-items-center">
                            <!-- Nombre -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Nombre(s)</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="nombre" name="nombre" value="<?php echo $nombre_factura ?>" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Apellido Paterno -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Apellido Paterno</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="paterno" name="paterno" value="<?php echo $paterno_factura ?>" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Apellido Materno -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Apellido Materno</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="materno" name="materno" value="<?php echo $materno_factura ?>" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Fecha de Nacimiento -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Fecha de Nacimiento</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control col-sm-12" id="nacimiento" name="nacimiento" value="<?php echo $nacimiento_factura ?>" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Codigo Postal -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Codigo Postal</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="postal" name="postal" value="<?php echo $cp_factura ?>" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Estado -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Estado</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="estado" name="estado" value="<?php echo $estado_factura ?>" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Municipio -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Municipio</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="municipio" name="municipio" value="<?php echo $municipio_factura ?>" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Colonia -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Colonia</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="colonia" name="colonia" value="<?php echo $colonia_factura ?>" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Calle -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Calle</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="calle" name="calle" value="<?php echo $calle_factura ?>" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Numero Exterior -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Numero Exterior</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="n_ext" name="n_ext" value="<?Php echo $ext_factura ?>" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Numero Interior -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Numero Interior</label>
                                    <div class="col-sm-8">
                                        <?php
                                        if ($int_factura != NULL || $int_factura != "") {
                                        ?>
                                            <input type="text" class="form-control col-sm-12" id="n_int" name="n_int" value="<?php echo $int_factura ?>" require>
                                        <?php
                                        } else {
                                        ?>
                                            <input type="text" class="form-control col-sm-12" id="n_int" name="n_int" require>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control col-sm-12" id="email" name="email" value="<?php echo $email_factura ?>" require>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Informacion de Facturacion -->
            <div class="card shadow mb-4">
                <div class="card-header py-sm-2">
                    <h4 class="m-0 font-weight-bold text-primary">Informacion de Facturacion</h4>
                </div>
                <div class="form-row py-3">
                    <div class="container text-center">
                        <div class="form-row align-items-center">
                            <!-- RFC -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">RFC</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="rfc" name="rfc" value="<?php echo $rfc_factura ?>" maxlength="13" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Regimen Fiscal -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Regimen Fiscal</label>
                                    <div class="col-sm-8">
                                        <select class="form-control col-sm-12" name="regimen" id="regimen" style="border-radius: 5px;">
                                            <?php
                                            if (!$regimen_factura) { ?>
                                                <option>Selecciona un Regimen Fiscal....</option>
                                            <?php
                                            } else { ?>
                                                <option value="<?php echo $regimen_factura ?>" selected="true"><?php echo $regimen_factura  ?> | <?php echo  $regimen_facturas ?></option>
                                                <?php
                                            }
                                            $fiscales = mysqli_query($conexion, "SELECT * FROM `regimen_fiscal` ORDER BY id_rf ASC");
                                            $regimen_fiscales = mysqli_num_rows($fiscales);
                                            if ($regimen_fiscales > 0) {
                                                while ($regimenes = mysqli_fetch_assoc($fiscales)) {
                                                ?>
                                                    <option value="<?php echo $regimenes['id_rf'] ?>"> <?php echo $regimenes['clave']  ?> | <?php echo  $regimenes['regimen'] ?> </option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Botones -->
            <div class="panel-body text-right">
                <button type="submit" class="btn btn-info">Actualizar</button>
                <a type="button" class="btn btn-primary" onclick="formSubmit();">Realizar Factura</a>
            </div>
        </form>
    </div>
</div>
<script src="../../../js/cliente/facturacion.js"></script>
<!-- estos 3 renglones son para los poop ups con el tostring-->
<link href="../../../js/toastr/toastr.min.css" rel="stylesheet">
<script src="https:ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../../../js/toastr/toastr.min.js"></script>