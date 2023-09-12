<?php

include "../../../header/header_admin.php";
require_once("../../../base_datos/conexion/conexion.php");

?>

<div class="card-body">
    <form class="user" method="POST" action='../../../base_datos/subir/add_cliente.php'>

        <!-- Referencias Personales -->
        <div class="card shadow col-sm-6 py-sm-2 m-sm-1">
            <div class="card-header py-sm-2">
                <h6 class="m-0 font-weight-bold text-primary">Asignar ONTS a Tecnico</h6>
            </div>
            <div class="py-sm-2 row">
                <div class="container text-left">
                    <ul>
                        <div>* Seleccione un instalador de la lista</div>
                    </ul>
                    <!-- Funciom para ingresar ont a instalador -->
                    <div class="row col-mb-3">
                        <label class="col-sm-6 col-form-label">Instalador<span class="require">*</span></label>
                        <div class="col-sm-6">
                            <select class="form-control" name="instalador_ont" id="instalador_ont" style="border-radius: 5px;">
                                <!--el valor 999999999999 es el tecnico default-->
                                <option value="999999999999">Selecciona un tecnico....</option>
                                <?php
                                //aqui se seleccion el tipo de usuario tecnico
                                $tecnico = mysqli_query($conexion, "SELECT * FROM usuario WHERE tipo_usuario = 4 ORDER BY id_usuario ASC");
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
                    <br>
                    <!-- Ingresar Numero de mac -->
                    <div class="row mb-3">
                        <label class="col-sm-6 col-form-label text-justify"> Numero de MAC </label>
                        <div class="col-sm-6">
                            <!-- aqui en el max length se modifica dependiendo los caracteres necesarios -->
                            <input type="text" class="form-control" id="nummacont" maxlength="12">
                        </div>
                    </div>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- aqui se manda llamar el js (script) de asignar_tecnico_ont.js-->
<script src="../../../js/inventario/asignar/asignar_tecnico_ont.js"></script>


<?php
include "../../../header/header2.php";
?>