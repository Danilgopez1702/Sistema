<?php

include "../../../header/header_admin.php";
require_once("../../../base_datos/conexion/conexion.php");

?>

<div class="card-body">
    <form class="user" method="GET" action='../../../barcode/index_planilla.php' target="_blank">

        <!-- Referencias Personales -->
        <div class="card shadow col-sm-6 py-sm-2 m-sm-1">
            <div class="card-header py-sm-2">
                <h6 class="m-0 font-weight-bold text-primary">Plantilla de Tarjetas con Codigo de Barras</h6>
            </div>
            <div class="py-sm-2 row">
                <div class="container text-left">
                    <div class="row col-mb-3">
                        <label class="col-sm-6 col-form-label">numero de tarjetas a realizar<span class="require">*</span></label>
                        <div class="col-sm-6">
                            <select class="form-control" name="rango" id="rango" style="border-radius: 5px;" required onchange='precio();'>
                                <option value="0">Selecciona el numero de tarjeta a imprimir...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <!-- Ingresar Numero de cliente -->
                    <div class="row mb-3">
                        <label class="col-sm-6 col-form-label text-justify"> Número de cliente (después del 4004, 6 caracteres): </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="start" name="start" maxlength="6">
                            <div>Se crearán tarjetas desde este número hasta el rango seleccionado más arriba.</div>
                        </div>
                    </div>
                    <!-- Ingresar importe -->
                    <div class="row mb-3 ">
                        <label class="col-sm-6 col-form-label text-justify">Importe (5 caracteres): </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="importe" name="importe" maxlength="5">
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