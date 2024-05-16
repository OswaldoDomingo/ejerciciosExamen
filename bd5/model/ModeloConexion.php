<?php
require_once 'conexion.php';

class ModeloConexion extends PDO {

    public function __construct() {
        try {
            // Corrección: Eliminar el espacio después de '.'
            parent::__construct('mysql:host='. Conexion::$servername .';charset=utf8;dbname='. Conexion::$dbname, Conexion::$username, Conexion::$password);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        }
    }
}