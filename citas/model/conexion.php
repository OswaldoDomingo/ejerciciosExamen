<?php
require_once __DIR__ . '/config.php';

//Clase Conexion para la base de datos PDO
class Conexion extends PDO{

    public function __construct(){
        $conexion = new PDO('mysql:host=' . Config::$dbHost . ';dbname=' . Config::$dbName . ';charset=' . Config::$dbCharset, Config::$dbUser, Config::$dbPass);
    }

    

}

