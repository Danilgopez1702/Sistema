<?php

include "../../../header/header_admin.php";
require_once("../../../base_datos/conexion/conexion.php");

?>

<div class="card-body">
    <form class="user" method="POST" action='../../../base_datos/subir/add_cliente.php'>

        <!-- Referencias Personales -->
        <div class="card shadow col-sm-6 py-sm-2 m-sm-1">
            <div class="card-header py-sm-2">
                <h6 class="m-0 font-weight-bold text-primary">Añadir Bandera</h6>
            </div>
            <div class="py-sm-2 row">
                <div class="container text-left">
                    <!-- Ingresar Numero de bandera -->
                    <div class="row mb-3">
                        <label class="col-sm-6 col-form-label text-justify"> Numero de Bandera </label>
                        <div class="col-sm-6">
                        <!-- aqui en el max length se modifica dependiendo los caracteres necesarios -->
                            <input type="text" class="form-control text-uppercase" id="numbandera" maxlength="9">
                            <div class="texto-nombre-amigo" style="font-size: 10px; color:red">Debes implenetar una letra "A" antes de los 8 numeros de la bandera</div>
                        </div>
                    </div>
                    <div class="row col-mb-3">
                        <label class="col-sm-6 col-form-label">Fallo<span class="require">*</span></label>
                        <div class="col-sm-6">
                            <select class="form-control" name="fallo" id="fallo" style="border-radius: 5px;" required onchange='precio();'>
                                <option value="2" >NO</option>
                                <option value="1">SI</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div>Utilice el lector de código de barras para agregar los 9 caracteres del código de barras de un equipo, éste se agregará automáticamente al inventario.</div>
                    <br>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- aqui se manda llamar el js (script) de add_inv_bandera.js-->
<script src="../../../js/inventario/añadir/add_inv_bandera.js"></script>


<?php
include "../../../header/header2.php";
?>