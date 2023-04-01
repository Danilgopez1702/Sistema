<?php
session_start();
    if($_SESSION['zona'] == 1){
        var_dump($_SESSION['zona']);
        header('location: Aguascalientes/incluides/reenvio/reenvio.php');
    }
?>