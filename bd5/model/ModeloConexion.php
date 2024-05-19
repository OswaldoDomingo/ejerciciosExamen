<?php
require_once 'conexion.php';
// Modelo de conexión a la base de datos
class ModeloConexion extends PDO {
    public function __construct() {
        try {
            // Concatenación correcta de los parámetros DSN
            $dsn = 'mysql:host=' . Conexion::$servername . ';dbname=' . Conexion::$dbname . ';charset=utf8';
            parent::__construct($dsn, Conexion::$username, Conexion::$password);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
