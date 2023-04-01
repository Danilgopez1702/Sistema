<?php
include "../../../header/header_admin.php";
require("../../../base_datos/conexion/conexion.php");
?>

<h2>Tabla de Clientes por Encuestar/h2>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Consultar Cliente</h4>
        <input  type="hidden" class="form-control" id="acomodo" name="acomodo" value="<?php echo $acomodo ?>" />
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Status</th>
                        <th>Folio</th>
                        <th>Numero de Cliente</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Nombre(s)</th>
                        <th>Fecha de Instalacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        $query = mysqli_query($conexion, "SELECT * FROM `cliente` WHERE `id_cliente` = 2");
                        $result = mysqli_num_rows($query);
                        if ($result > 0) {
                            while ($data = mysqli_fetch_assoc($query)) { ?>
                                <tr>
                                    <td><?php echo $data['id_cliente'];?></td>
                                    <td>Por Encuestar</td>
                                    <td><?php echo $data['folio_cliente'];?></td>
                                    <td><?php echo $data['numero_cliente'];?></td>
                                    <td><?php echo $data['apellido_p_cliente'];?></td>
                                    <td><?php echo $data['apellido_m_cliente'];?></td>
                                    <td><?php echo $data['nombre_cliente'];?></td>
                                    <td><?php echo $data['fecha_instalacion'];?></td>
                                    <td>
                                    <a title="Revisar Contrato" href="caratula_encuesta.php?id=<?php echo $data['id_cliente'] ?>"><i class="fa fa-pen ml-2"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="../../../js/tablas/buscador_mysql.js"></script>
<?php
include "../../../header/header2_admin.php";
?>