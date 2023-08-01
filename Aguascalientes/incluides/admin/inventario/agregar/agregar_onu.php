<?php

include "../../../header/header_admin.php";
require_once("../../../base_datos/conexion/conexion.php");

?>

<div class="card-body">
    <form class="user" method="POST" action='../../../base_datos/subir/add_cliente.php'>

        <!-- Referencias Personales -->
        <div class="card shadow col-sm-6 py-sm-2 m-sm-1">
            <div class="card-header py-sm-2">
                <h6 class="m-0 font-weight-bold text-primary">Añadir ONUS</h6>
            </div>
            <div class="py-sm-2 row">
                <div class="container text-left">
                    <!-- Ingresar Numero de onu -->
                    <div class="row mb-3">
                        <label class="col-sm-6 col-form-label text-justify"> Numero de ONU </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="numonu" maxlength="12">
                        </div>
                    </div>
                    <br>
                    <!-- Ingresar Numero de mac -->
                    <div class="row mb-3">
                        <label class="col-sm-6 col-form-label text-justify"> Numero de MAC </label>
                        <div class="col-sm-6">
                            <!-- aqui en el maxlength se modifica dependiendo los caracteres necesarios -->
                            <input type="text" class="form-control" id="nummac" maxlength="12">
                        </div>
                    </div>
                    <br>
                    <div class="row col-mb-3">
                        <label class="col-sm-6 col-form-label">Fallo<span class="require">*</span></label>
                        <div class="col-sm-6">
                            <select class="form-control" name="paquete_seleccionado" id="paquete_seleccionado" style="border-radius: 5px;" required onchange='precio();'>
                                <option value="2">NO</option>
                                <option value="1">SI</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div>Utilice el lector de código de barras para agregar los 12 caracteres del código de barras de un equipo, éste se agregará automáticamente al inventario.</div>
                    <br>
                </div>
            </div>
        </div>


    </form>
</div>

<!-- aqui se manda llamar el js (script) de add_inv_onu.js-->
<script src="../../../js/inventario/añadir/add_inventario_onu.js"></script>


<?php
include "../../../header/header2.php";
?>