<?php

class Conexion
{
    public static function Conectar()
    {
        define('servidor', 'mysql1005.mochahost.com');
        define('nombre_bd', 'carlosfe_sistemadn');
        define('usuario', 'carlosfe_sistemadn');
        define('password', 'sistemadn');

        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        try {
            $conexion = new PDO("mysql:host=" . servidor . "; dbname=" . nombre_bd, usuario, password, $opciones);
            return $conexion;
        } catch (Exception $e) {
            die("El error de Conexión es: " . $e->getMessage());
        }
    }
}
