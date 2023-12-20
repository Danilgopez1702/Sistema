<?php
include "../../../header/header_admin.php";
require("../../../base_datos/conexion/conexion.php");
?>
<h2>Bajar Reportes</h2>
<div class="card shadow mb-5">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Reporte de Excel</h4>
    </div>
    <div class="card-body ">
        <br>
        <!-- Datos del Contrato -->
        <div class="card shadow mb-2">
            <div class="card-header py-sm-2">
                <h4 class="m-0 font-weight-bold text-primary">Personaliza el Reporte</h4>
            </div>
            <div class="form py-5">
                <div class="container">
                    <form method='POST' id="form" name="form" action='../../../reportes/csv/reporte_tecnicos.php'
                        enctype="multipart/form-data">
                        <div class="form-row align-items-center">
                            <div class="form-inline col-sm-12">
                                <label class="col col-form-label">Tipo de Reporte:</label>
                                <div class="col">
                                    <select class="form-control col-sm-12" name="tipo" id="tipo"
                                        style="border-radius: 5px;" required>
                                        <option value="4">Todos los Reprtes</option>
                                        <option value="1">Reparaciones</option>
                                        <option value="2">Migraciones</option>
                                        <option value="3">Ventas</option>
                                        <option value="4">Cambio de Domicilio</option>
                                    </select>
                                </div>
                                <label class="col col-form-label">Selecciona Tecnico:</label>
                                <div class="col">
                                    <select class="form-control col-sm-12" name="tecnico" id="tecnico"
                                        style="border-radius: 5px;" required>       
                                        <option value="9999">Todos los tecnicos</option>
                                        <?php
                                        $consulta_tecnicos = mysqli_query($conexion, "SELECT `id_usuario`,`usuario_usuario` FROM `usuario` WHERE `tipo_usuario` = 4 and `status_usuario` = 1 and `zona_usuario` = 1");
                                        while ($tecnicos = mysqli_fetch_assoc($consulta_tecnicos)) {
                                            ?>
                                            <option value="<?php echo $tecnicos['id_usuario'] ?>">
                                                <?php echo $tecnicos['usuario_usuario'] ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <button id="eliminar" name="eliminar" class="btn btn-success"
                                        onclick="eliminar();">Descargar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../js/reportes/eliminar.js"></script>
    <?php
    include "../../../header/header2.php";
    ?>