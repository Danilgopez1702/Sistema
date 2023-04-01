<?php

include "../../../header/header_admin.php";
require_once("../../../base_datos/conexion/conexion.php");

?>

<div class="card-body">
    <form class="user" method="POST" action='../../../base_datos/subir/add_cliente.php'>

        <!-- Referencias Personales -->
        <div class="card shadow col-sm-6 py-sm-2 m-sm-1">
            <div class="card-header py-sm-2">
                <h6 class="m-0 font-weight-bold text-primary">Añadir ONTS</h6>
            </div>
            <div class="py-sm-2 row">
                <div class="container text-left">
                    <!-- Ingresar Numero de ont -->
                    <div class="row mb-3">
                        <label class="col-sm-6 col-form-label text-justify"> Numero de ONT </label>
                        <div class="col-sm-6">
                            <!-- aqui en el max length se modifica dependiendo los caracteres necesarios en la ont-->
                            <input type="text" class="form-control" id="numont" maxlength="12">
                        </div>
                    </div>
                    <br>
                    <!-- Ingresar Numero de mac -->
                    <div class="row mb-3">
                        <label class="col-sm-6 col-form-label text-justify"> Numero de MAC </label>
                        <div class="col-sm-6">
                            <!-- aqui en el max length se modifica dependiendo los caracteres necesarios en la mac-->
                            <input type="text" class="form-control" id="nummacont" maxlength="12">
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

<!-- estos 3 renglones son para los poop ups con el tostring-->
<link href = "../../../js/toastr/toastr.min.css" rel="stylesheet" >
<script src="https:ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../../../js/toastr/toastr.min.js"></script>

<!-- aqui se manda llamar el js (script) de add_inv_ont.js-->
<script src="../../../js/inventario/añadir/add_inv_ont.js"></script>


<?php
include "../../../header/header2_admin.php";
?>