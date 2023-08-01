<?php
include "../../../header/header_admin.php";
$id_cliente = $_GET['id'];
include "../../../procesos/pago_tarjeta.php";
?>

<script src='https://pagofacil.net/ws/public/jscripts/pagofacil-3dsecure.js' type='text/javascript'></script>

<h2>Pago con Tarjeta</h2>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Cuenta de <?php echo $nombre_completo ?> (Numero de cliente: <?php echo $num_cliente ?>).</h4>
    </div>
    <div class="card-body">
    <form role="form" method="POST" id="3ds-form" name="3ds-form" class="form-horizontal form-separated">
            <input name="idSucursal" type="hidden" value="8e768d1d1e30cf8e59a4387e22b06f0665d75970" />
            <input name="idUsuario" type="hidden" value="cb68d88a9db47c25e3da731d18ecf99487e45d3b" />
            <input name="idPedido" type="hidden" value="X" />
            <input name="idServicio" type="hidden" value="3" />
            <input id="plan" name="plan" type="hidden" value="NOR" />
            <input id="mensualidades" name="mensualidades" type="hidden" value="00" />
            <!-- Datos del Paquete -->
            <div class="card shadow mb-4">
                <div class="card-header py-sm-2">
                    <h4 class="m-0 font-weight-bold text-primary">Datos del Paquete</h4>
                </div>
                <div class="form-row py-3">
                    <div class="container text-center">
                        <div class="form-row align-items-center">
                            <!-- Ingresar Nombre -->
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id_cliente ?>" required="" />
                            <!-- Ingresar Numero de cliente -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Paquete Contratado:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="nombre" name="nombre" value="<?php echo $velocidad_cliente ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- Monto a Pagar -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Monto a Pagar:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="monto" name="monto" value="<?php echo $precio ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Datos Personales -->
            <div class="card shadow mb-4">
                <div class="card-header py-sm-2">
                    <h4 class="m-0 font-weight-bold text-primary">Datos Personales</h4>
                </div>
                <div class="form-row py-3">
                    <div class="container text-center">
                        <div class="form-row align-items-center">
                            <!-- Ingresar Nombres -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Nombre(s)</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="nombre" name="nombre" value="<?php echo $nombre ?>">
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Apellidos -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Apellidos</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="apellidos" name="apellidos" value="<?php echo $apellido ?>" required>
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
                            <!-- Ingresar Pais -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Pais</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="pais" name="pais" value="<?php echo $pais ?>" require>
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
                                    <label class="col-sm-4 col-form-label">Calle y Numero</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="calleyNumero" name="calleyNumero" value="<?php echo $calle ?>" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Numero Interior -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Numero Interior</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="n_int" name="n_int" value="<?php echo $interior ?>">
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Telefono 1 -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Telefono 1</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="celular" name="celular" maxlength="10" value="<?php echo $tel1 ?>" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Telefono 2 -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Telefono 2</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="telefono" name="telefono" maxlength="10" value="<?php echo $tel2 ?>" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Codigo Postal -->
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
            <!-- Datos de la Tarjeta -->
            <div class="card shadow mb-4">
                <div class="card-header py-sm-2">
                    <h4 class="m-0 font-weight-bold text-primary">Datos de la Tarjeta</h4>
                </div>
                <div class="form-row py-3">
                    <div class="container text-center">
                        <div class="form-row align-items-center">
                            <!-- Ingresar Numero de Tarjeta -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Numero de Tarjeta:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="numeroTarjeta" name="numeroTarjeta" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Mes Expiracion -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Mes Expiracion:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="mesExpiracion" name="mesExpiracion" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Año Expiracion -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Año Expiracion:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="anyoExpiracion" name="anyoExpiracion" required>
                                    </div>
                                </div>
                            </div>
                            <!-- CCV -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">CCV:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="cvt" name="cvt" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-body text-right">
                <button type="submit" class="btn btn-primary btn-icon-split btn-lg col-sm-2">Realizar Pago</button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
        $("#3ds-form").enviarPagoFacil3dSecure("produccion");//Metodo contenido en el archivo -pagofacil3ds.js-
</script>
<?php
include "../../../header/header2.php";
?>