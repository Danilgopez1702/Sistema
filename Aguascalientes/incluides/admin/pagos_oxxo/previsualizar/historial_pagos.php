<?php
include "../../../header/header_admin.php";
require("../../../base_datos/conexion/conexion.php");
include "../../../modal/editar/editar_bandera.php";
?>

<h2>Inventario de Banderas</h2>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Consulta de Banderas</h4>
    </div>
    <div class="card-body ">
        <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>

                    <th>ID</th>
                    <th>Bandera</th>
                    <th>Asignado</th>
                    <th>En Fallo</th>
                    <th>Agregado</th>
                    <th>Agregado</th>
                    <th>Agregado</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($conexion, "SELECT * FROM `pagos`");
                $result = mysqli_num_rows($query);
                if ($result > 0) {
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?php echo $data['id_pagos']; ?></td>
                            <td><?php echo $data['metodo_pagos']; ?></td>
                            <td><?php echo $data['lugar_pagos']; ?></td>
                            <td><?php echo $data['fecha_pagos']; ?></td>
                            <td><?php echo $data['hora_pagos']; ?></td>
                            <td><?php echo $data['num_cliente']; ?></td>
                            <td><?php echo $data['monto_pagos']; ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script src="../../../js/tablas/buscador_pagos.js"></script>

<?php
include "../../../header/header2_admin.php";
?>