<?php
//classModelo.php modelo para la conexión a la base de datos 
class Modelo extends PDO{
    protected $conexion;

    public function __construct(){
            $hostname = Config::$hostname; 
            $BDnombre = Config::$BDnombre;
            $usuario = Config::$usuario;
            $contrasena = Config::$contrasena;
    
            $dsn = "mysql:host=$hostname;dbname=$BDnombre";
            $this->conexion = new PDO($dsn, $usuario, $contrasena);
    
            $this->conexion->exec("set names utf8");
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }
}