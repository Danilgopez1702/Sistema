<?php
include "../../../header/header_admin.php";
require("../../../base_datos/conexion/conexion.php");

?>

<h2>Ver Cambios de Domicilo</h2>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Consultar Cambios de Domicilio</h4>
    </div>
    <div class="card-body ">

        <br>
        <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>

                    <th>ID</th>
                    <th>Activo</th>
                    <th># Reporte</th>
                    <th>Numero del Cliente</th>
                    <th>Nombre del Cliente</th>
                    <th>Agente</th>
                    <th>Tecnico Asignado</th>
                    <th>Fecha del Reporte</th>
                    <th>Comentario</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($conexion, "SELECT * FROM `reportes` WHERE `tipo_reportes` = 4");
                $result = mysqli_num_rows($query);
                if ($result > 0) {
                    while ($data = mysqli_fetch_assoc($query)) {
                        $cliente = $data['id_cliente'];
                        $instaladors = $data['id_reparador'];
                        $agentes = $data['id_usuario'];                        
                        $comentario = $data['mensaje_reportes'];
                        $limite = 20;
                        $sufijo = "...";

                        $query_usuario = mysqli_query($conexion, "SELECT * FROM `cliente` WHERE `id_cliente` =  '$cliente'");
                        $usuario_nombre = mysqli_fetch_assoc($query_usuario);

                        $query_instalador = mysqli_query($conexion, "SELECT * FROM `usuario` WHERE `id_usuario` =  '$instaladors'");
                        $instalador_nombre = mysqli_fetch_assoc($query_instalador);

                        $query_agente = mysqli_query($conexion, "SELECT * FROM `usuario` WHERE `id_usuario` =  '$agentes'");
                        $agente_nombre = mysqli_fetch_assoc($query_agente);

                        $nombrec_reporte = $usuario_nombre['nombre_cliente'];
                        $num_cliente = $usuario_nombre['numero_cliente'];
                        $instalador = $instalador_nombre['usuario_usuario'];
                        $agente = $agente_nombre['usuario_usuario'];

                        function limitar_cadena($comentario, $limite, $sufijo){
                            // Si la longitud es mayor que el límite...
                            if(strlen($comentario) > $limite){
                                // Entonces corta la cadena y ponle el sufijo
                                return substr($comentario, 0, $limite) . $sufijo;
                            }
                            
                            // Si no, entonces devuelve la cadena normal
                            return $comentario;
                        }
                ?>
                        <tr>
                            <td><?php echo $data['id_reportes']; ?></td>
                            <td>
                                <?php
                                if ($data['status_reportes'] == 1) {
                                    ?>
                                    <a class="btn btn-primary btn-sm">Activo</a>
                                <?php
                                } else if ($data['status_reportes'] == 2) {
                                    ?>
                                    <a class="btn btn-danger btn-sm">Cerrado</a>
                                <?php
                                }
                                ?>
                            </td>
                            <td><?php echo $data['no_reporte_reportes']; ?></td>
                            <td><?php echo $num_cliente; ?></td>
                            <td><?php echo $nombrec_reporte; ?></td>
                            <td><?php echo $agente; ?></td>
                            <td><?php echo $instalador; ?></td>
                            <td><?php echo $fecha_reporte = date("d-m-Y", strtotime( $data['fecha_reportes'])); ?></td>
                            <td><?php echo limitar_cadena($comentario, 26, "..."); ?></td>
                            <td>
                                <a href="../caratula/domicilio.php?id=<?php echo $data['id_reportes'] ?>" title='Ver reporte'><i class="fas fa-light fa-eye"></i></a>
                                <a title="Eliminar usuario" onclick="return confirm('Estás seguro que deseas eliminar el reporte: <?php echo $data['no_reporte_reportes']; ?>');" href="../../../base_datos/eliminar/eliminar_domicilio.php?id=<?php echo $data['id_reportes'] ?>"><i class="fa fa-trash ml-2"></i></a>
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