<?php
// Path: app/modelo/classModelo.php


class Modelo extends PDO {

    protected $conexion;

    public function __construct() {
        $this->conexion = new PDO('mysql:host=' . Config::$hostname . ';dbname=' . Config::$BDnombre . '', Config::$BDusuario, Config::$BDclave);
        // Realiza el enlace con la BD en utf-8
        $this->conexion->exec("set names utf8");
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
?>