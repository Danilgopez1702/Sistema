<?php
session_start();
if ($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1) {
    if (empty($_POST['usuario']) || empty($_POST['pass']) || empty($_POST['pass'])) {
    } else {
        require("../conexion/conexion.php");


        $nombre = $_POST['usuario'];
        $pass = $_POST['pass'];
        $cadena_cifrada =  md5($pass);
        $rol = $_POST['tipo'];

        echo ($nombre);
        echo ($pass);
        echo ($cadena_cifrada);
        echo ($rol);


        $sql = mysqli_query($conexion, "INSERT INTO `usuario`(`usuario_usuario`, `md5`, `pass_usuario`,`tipo_usuario`, `status_usuario`, `zona_usuario`) 
        VALUES ('$nombre','$cadena_cifrada','$pass','$rol', 1, 1)");

        var_dump($sql);
        mysqli_close($conexion);

        header("location: ../../admin/usuarios/previsualizar_usuarios/usuarios.php");
    }
}
