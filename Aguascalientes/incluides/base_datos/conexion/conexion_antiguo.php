<?php

$con = new mysqli('mysql1008.mochahost.com', 'digital_admin', 'ZzVACZZKx}mC', 'digital_digitaln_sistema');

if (mysqli_connect_errno()) {
    printf("0ˆ", mysqli_connect_error());
    exit();
}

mysqli_set_charset($con,"utf8");

$servername = "mysql1008.mochahost.com";
$username = "digital_admin";
$password = "ZzVACZZKx}mC";
$dbname = "digital_digitaln_sistema";

?>