<?php
session_start();
if($_SESSION['zona'] == 1){
    
    if($_SESSION['rol'] == 3132 || $_SESSION['rol'] == 1){
        header('location: ../admin/dashboard/index/index.php');
    }
    
}
  
?>
<p>entro</p>