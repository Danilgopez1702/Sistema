<?php
session_start();
if($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1){
                                        require ("../conexion/conexion.php");
                                        $id = $_GET['id'];
                                        
                                        $sql = mysqli_query($conexion, "DELETE FROM `usuario` WHERE `id_usuario` = '$id'");
                                        
                                        var_dump($sql);
                                        mysqli_close($conexion);
                                        
                                        header("location: ../../admin/usuarios/previsualizar_usuarios/usuarios.php");
                                        }             

?>