<?php
include "../../../header/header_admin.php";
require("../../../base_datos/conexion/conexion.php");
include "../../../modal/agregar/agregar_torre.php";
?>

<h2>Nuevo Clientes de Torres</h2>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Consultar Clientes de Torres</h4>
    </div>
    <div class="card-body ">
        <div>
            <a data-toggle="modal" href="#modal_agregar_torre" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fa fa-plus"></i>
                </span>
                <span class="text">Agregar Cliente de Torre</span>
            </a>
        </div>
        <br>
        <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>

                    <th>ID</th>
                    <th>Torre de</th>
                    <th>Nombre Cliente</th>
                    <th>Direccion</th>
                    <th>Numero de servicio cfe</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($conexion, "SELECT `id_torre`, `lugar_torre`, `cliente_torre`, `cfe_torre` FROM `torres`");
                $result = mysqli_num_rows($query);
                if ($result > 0) {
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?php echo $data['id_torre']; ?></td>
                            <td><?php echo $data['lugar_torre']; ?></td>
                            <td><?php echo $data['cliente_torre']; ?></td>
                            <td><?php echo $data['cfe_torre']; ?></td>
                            <td>
                                <a title="Eliminar usuario" onclick="return confirm('Estás seguro que deseas eliminar a <?php echo $data['lugar_torre']; ?>');" href="../../../base_datos/eliminar/eliminar_usuario.php?id=<?php echo $data['id_usuario'] ?>"><i class="fa fa-trash ml-2"></i></a>
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
<script src="../../../js/tablas/buscador_usuario.js"></script>

<?php
include "../../../header/header2_admin.php";
?>