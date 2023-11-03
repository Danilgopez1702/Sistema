<?php
include "../../../header/header_admin.php";
$id_cliente = $_GET['id'];
include "../../../procesos/pago_tarjeta.php";
?>

<h2>Pago con Tarjeta</h2>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Cuenta de
            <?php echo $nombre_completo ?> (Numero de cliente:
            <?php echo $num_cliente ?>).
        </h4>
    </div>
    <div class="card-body">
        <form role="form" method="POST" id="3ds-form" name="3ds-form" class="form-horizontal form-separated">
            <!-- Datos del Paquete -->
            <div class="card shadow mb-4">
                <div class="card-header py-sm-2">
                    <h4 class="m-0 font-weight-bold text-primary">Datos del Paquete</h4>
                </div>
                <div class="form-row py-3">
                    <div class="container text-center">
                        <div class="form-row align-items-center">
                            <!-- Ingresar Nombre -->
                            <input type="hidden" class="form-control" id="id" name="id"
                                value="<?php echo $id_cliente ?>" required="" />
                            <!-- Ingresar Numero de cliente -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Paquete Contratado:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="nombre" name="nombre"
                                            value="<?php echo $velocidad_cliente ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- Monto a Pagar -->
                            <div class="col-md-6 mb-3">
                                <div class="form-inline">
                                    <label class="col-sm-4 col-form-label">Monto a Pagar:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-sm-12" id="monto" name="monto"
                                            value="<?php echo $precio ?>">
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
                            <div id="pago">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include "../../../header/header2.php";
?>