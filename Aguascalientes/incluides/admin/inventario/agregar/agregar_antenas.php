<?php

include "../../../header/header_admin.php";

?>

<div class="card-body">
    <form class="user" method="POST" >

        <!-- Referencias Personales -->
        <div class="card shadow col-sm-6 py-sm-2 m-sm-1">
            <div class="card-header py-sm-2">
                <h6 class="m-0 font-weight-bold text-primary">Añadir Antenas</h6>
            </div>
            <div class="py-sm-2 row">
                <div class="container text-left">
                    <!-- Ingresar Numero de radio -->
                    <div class="row mb-3">
                        <label class="col-sm-6 col-form-label text-justify"> Numero de Radio </label>
                        <div class="col-sm-6">
                            <!-- aqui en el max length se modifica dependiendo los caracteres necesarios -->
                            <input type="text" class="form-control" id="numradio" maxlength="12">
                        </div>
                    </div>
                    <br>
                    <div class="row col-mb-3">
                        <label class="col-sm-6 col-form-label">Fallo<span class="require">*</span></label>
                        <div class="col-sm-6">
                            <select class="form-control" name="fallo" id="fallo" style="border-radius: 5px;" required >
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

<!-- aqui se manda llamar el js (script) de add_inv_radio.js-->
<script src="../../../js/inventario/añadir/add_inv_radio.js"></script>


<?php
include "../../../header/header2_admin.php";
?>