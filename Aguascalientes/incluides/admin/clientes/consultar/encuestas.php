<?php
include "../../../header/header_admin.php";
require("../../../base_datos/conexion/conexion.php");
?>

<h2>Contratos por Encuestar</h2>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Consultar Contratos por Encuestar</h4>
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
                        <th>Revisar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($conexion, "SELECT * FROM `encuesta` AS encuesta INNER JOIN  cliente AS cliente ON 
                    encuesta.id_cliente = cliente.id_cliente");
                    $result = mysqli_num_rows($query);
                    if ($result > 0) {
                        while ($data = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <td><?php echo $data['id_cliente']; ?></td>
                                <td>
                                    <?php
                                    if ($data['status_encuesta'] == 1) { ?>
                                        <p class="text-center" style="background-color: GREEN; color: white;"> Activo </p>
                                    <?php
                                    } else if ($data['status_encuesta'] == 2) { ?>
                                        <p style="background-color: yellow; color: white;"> Moroso </p>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td><?php echo $data['folio_cliente']; ?></td>
                                <td><?php echo $data['numero_cliente']; ?></td>
                                <td><?php echo $data['apellido_p_cliente']; ?></td>
                                <td><?php echo $data['apellido_m_cliente']; ?></td>
                                <td><?php echo $data['nombre_cliente']; ?></td>
                                <td><?php echo $data['fecha_instalacion']; ?></td>
                                <td class="text-center">
                                    <a type="button" class="btn btn-secondary btn-sm col-md-12" style="color: black;" href="caratula_encuesta.php?id=<?php echo $data['id_cliente'] ?>">Encuestar</a>
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
<script src="../../../js/tablas/buscador_encuestas.js"></script>
<?php
include "../../../header/header2_admin.php";
?>