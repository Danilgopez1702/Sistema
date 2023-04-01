<?php
include "../../../header/header_admin.php";
require("../../../base_datos/conexion/conexion.php");
?>

<h2>Bitacora</h2>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Consultar Bitacora</h4>
    </div>
    <div class="card-body ">
        <br>
        <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">  
            <thead>
                <tr>
                    
                    <th>ID</th>
                    <th>Accion</th>
                    <th>Responsable</th>
                    <th>Numero de Cliente</th>
                    <th>Fecha</th>

                </tr>
            </thead>
            <tbody>
                    <?php
                        $query = mysqli_query($conexion, "SELECT * FROM `log` ");
                        $result = mysqli_num_rows($query);
                        if ($result > 0) {
                            while ($data = mysqli_fetch_assoc($query)) { ?>
                                <tr>
                                    <td><?php echo $data['id_log'];?></td>
                                    <td><?php echo $data['accion_log'];?></td>
                                    <td><?php echo $data['nombre_usuario'];?></td>
                                    <td>
                                        <?php 
                                             if(!$data['id_cliente']){
                                                echo "n/a";
                                            }else{
                                                $instalador = $data['id_cliente'];
                                                $query_instalador = mysqli_query($conexion, "SELECT * FROM `cliente` WHERE `id_cliente` =  '$instalador'");
                                                $instalador_nombre = mysqli_fetch_assoc($query_instalador);
                                                echo $instalador_nombre['numero_cliente'];
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $data['timestamp'];?></td>
                                </tr>
                                <?php
                            }
                        } 
                    ?>
                </tbody>
        </table>
    </div>
</div>
<script src="../../../js/tablas/buscador_bitacora.js"></script>

<?php
include "../../../header/header2_admin.php";
?>