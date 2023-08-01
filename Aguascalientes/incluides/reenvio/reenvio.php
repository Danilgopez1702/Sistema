<?php
session_start();
if($_SESSION['zona'] == 1){
    
    if($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1){
        header('location: ../admin/dashboard/index/index.php');
    }else if($_SESSION['rol'] == 2){
        header('location: ../atc/dashboard/index/index.php');
    }
    
}
  echo $_SESSION['rol'];
?>
<p>entro</p>