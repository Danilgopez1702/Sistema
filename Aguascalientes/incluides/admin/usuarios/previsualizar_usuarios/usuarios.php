<?php
include "../../../header/header_admin.php";
require("../../../base_datos/conexion/conexion.php");
include "../../../modal/agregar/agregar_usuario.php";
include "../../../modal/editar/editar_usuario.php";
?>

<h2>Nuevo Usuarios</h2>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Consultar Usuarios</h4>
    </div>
    <div class="card-body ">
        <div>
            <a data-toggle="modal" href="#modal_agregar_usuario" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fa fa-plus"></i>
                </span>
                <span class="text">Agregar Usuario</span>
            </a>
        </div>
        <br>
        <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">  
            <thead>
                <tr>
                    
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Nombre</th>
                    <th>Contraseña</th>
                    <th>Status</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                    <?php
                        $query = mysqli_query($conexion, "SELECT * FROM usuario ORDER BY id_usuario ");
                        $result = mysqli_num_rows($query);
                        if ($result > 0) {
                            while ($data = mysqli_fetch_assoc($query)) { ?>
                                <tr>
                                    <td><?php echo $data['id_usuario'];?></td>
                                    <td>
                                        <?php
                                            if($data['tipo_usuario'] == 3132) {
                                                echo "Super Usuario";
                                            }else if($data['tipo_usuario'] == 1) {
                                                echo "Administrador";
                                            }else if($data['tipo_usuario'] == 2) {
                                                echo "Atencion a Clientes";
                                            }else if($data['tipo_usuario'] == 3) {
                                                echo "Cobranza";
                                            }else if($data['tipo_usuario'] == 4) {
                                                echo "Tecnicos";
                                            }   
                                        ?>
                                    </td>
                                    <td><?php echo $data['usuario_usuario'];?></td>
                                    <td><?php echo $data['pass_usuario'];?></td>
                                    <td>
                                        <?php 
                                            if($data['status_usuario'] == 1){
                                                echo "Activo";
                                            }elseif($data['status_usuario'] == 2){
                                                echo "Tecnico Deshabilitado";
                                            }if($data['status_usuario'] == 3){
                                                echo "Inactivo";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                    <a data-toggle="modal" href="#modal_editar_usuario" title ='Editar Usuario' 
                                    onclick='editar(
                                        "<?php echo $data["id_usuario"];?>", 
                                        "<?php echo $data["usuario_usuario"];?>",
                                        "<?php echo $data["pass_usuario"];?>",
                                        "<?php echo $data["tipo_usuario"];?>",
                                        "<?php echo $data["status_usuario"];?>"
                                    )'><i class="fas fa-thin fa-pen ml-2"></i></a>
                                    <a title="Eliminar usuario" onclick="return confirm('Estás seguro que deseas eliminar a <?php echo $data['usuario_usuario'];?>');" href="../../../base_datos/eliminar/eliminar_usuario.php?id=<?php echo $data['id_usuario'] ?>"><i class="fa fa-trash ml-2"></i></a>
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
<script src="../../../js/usuario/usuario.js"></script>

<?php
include "../../../header/header2_admin.php";
?>