<?php
include "../../../header/header_admin.php";
require("../../../base_datos/conexion/conexion.php");
include "../../../modal/editar/editar_ont.php";
?>

<h2>Inventario de ONU'S</h2>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Consulta de ONU'S</h4>
    </div>
    <div class="card-body ">
        <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">  
            <thead>
                <tr>
                    
                    <th>ID</th>
                    <th>MAC</th>
                    <th>Onu</th>
                    <th>Asignado</th>
                    <th>En Fallo</th>
                    <th>Agregado</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                    <?php
                        $query = mysqli_query($conexion, "SELECT * FROM `inventario` WHERE `tipo_inventario` = 2");
                        $result = mysqli_num_rows($query);
                        if ($result > 0) {
                            while ($data = mysqli_fetch_assoc($query)) { ?>
                                <tr>
                                    <td><?php echo $data['id_inventario'];?></td>
                                    <td><?php echo $data['ont_inventario'];?></td>
                                    <td><?php echo $data['mac_ont_inventario'];?></td>
                                    <td>
                                        <?php 
                                            if($data['id_instalador'] == 0){
                                                echo "No Asignado";
                                            }else if($data['id_instalador'] != 0){
                                                $instalador = $data['id_instalador'];
                                                $query_instalador = mysqli_query($conexion, "SELECT * FROM `usuario` WHERE `id_usuario` =  '$instalador'");
                                                $instalador_nombre = mysqli_fetch_assoc($query_instalador);
                                                echo $instalador_nombre['usuario_usuario'];
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            if($data['fallo_inventario'] == 2){
                                                echo "No";
                                            }else if($data['fallo_inventario'] == 1){
                                                echo "Si";
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $data['fecha_inventario'];?></td>
                                    <td>
                                    <a data-toggle="modal" href="#modal_editar_onu" title ='Editar Antena' 
                                    onclick='editar(
                                        "<?php echo $data["id_inventario"];?>", 
                                        "<?php echo $data["ont_inventario"];?>",
                                        "<?php echo $data["mac_ont_inventario"];?>",
                                        "<?php echo $data["id_instalador"];?>",
                                        "<?php echo $data["fallo_inventario"];?>"
                                    )'><i class="fas fa-thin fa-pen ml-2"></i></a>
                                    <a title="Eliminar Ont" onclick="return confirm('Estás seguro que deseas eliminar la onu: <?php echo $data['onu_inventario'];?>');" href="../../../base_datos/eliminar/eliminar_ont.php?id=<?php echo $data['id_inventario'] ?>"><i class="fa fa-trash ml-2"></i></a>
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
<script src="../../../js/tablas/buscador_ont.js"></script>
<script src="../../../js/inventario/ver/ont.js"></script>

<?php
include "../../../header/header2_admin.php";
?>