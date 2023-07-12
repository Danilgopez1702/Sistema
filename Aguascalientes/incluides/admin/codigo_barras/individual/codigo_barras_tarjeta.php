<?php

include "../../../header/header_admin.php";
require_once("../../../base_datos/conexion/conexion.php");

?>

<div class="card-body" >
    <form class="user" method="POST" action='../../../base_datos/subir/add_cliente.php'>

        <!-- Referencias Personales -->
        <div class="card shadow col-sm-6 py-sm-2 m-sm-1 ">
            <div class="card-header py-sm-2">
                <h6 class="m-0 font-weight-bold text-primary">Pago con Tarjeta</h6>
            </div>
            <div class="py-sm-2 row">
                <div class="container text-left">
                    <!-- Ingresar Numero de cliente -->
                    <div class="row mb-3">
                        <label class="col-sm-6 col-form-label text-justify"> Número de cliente (después del 4004, 6 caracteres): </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="numcliente">
                        </div>
                    </div>
                    <br>
                    <!-- Ingresar importe -->
                    <div class="row mb-3 ">
                        <label class="col-sm-6 col-form-label text-justify">Importe (5 caracteres): </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="importe">
                        </div>
                    </div>
                    <br>
                    <!-- tipo de tarjeta -->
                    <div class="row mb-3">
                        <label class="col-sm-6 col-form-label text-justify">Tipo de Tarjeta</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="tipotarjeta" id="tipotarjeta" style="border-radius: 5px;">
                                <option>Lado A (pago oportuno)</option>
                                <option>Lado B (precio de lista)</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row mb-3">
                        <label class="col-sm-6 col-form-label text-justify"></label>
                        <div class="col-sm-6">
                            <select class="form-control" name="tipotarjeta" id="tipotarjeta" style="border-radius: 5px;">
                                <option>Lado A (Blanco y Negro) (pago oportuno)</option>
                                <option>Lado B (Blanco y Negro) (precio de lista) </option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="panel-body text-right">
                        <button type="submit" class="btn btn-primary btn-icon-split btn-lg col-sm-2">Enviar</button>
                    </div>

                </div>
            </div>
        </div>


    </form>
</div>


<?php
include "../../../header/header2_admin.php";
?>