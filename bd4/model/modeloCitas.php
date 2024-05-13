<?php
require_once('modeloConexion.php');

class ModeloCitas{
    private $conexion;
    public function __construct()
    {
        $this->conexion = new modeloConexion();
    }

    function verTodasLasCitas()
    {
        $consulta = "SELECT * FROM citas";
        $arrayCitas = [];
        if ($resultado = $this->conexion->query($consulta)) {
            $arrayCitas = $resultado->fetchAll(PDO::FETCH_ASSOC);
            $resultado->closeCursor();
            $resultado = null;
        }
        return $arrayCitas;
    }

    function verCitasPorPublicas()
    {

        $consulta = "SELECT * FROM citas WHERE cita_visible=2";
        $arrayCitas = [];
        if ($resultado = $this->conexion->query($consulta)) {
            $arrayCitas = $resultado->fetchAll(PDO::FETCH_ASSOC);
            $resultado->closeCursor();
            $resultado = null;
        }
        return $arrayCitas;
    }
    function verCitasPorUsuario($usuario)
    {

        $consulta = "SELECT * FROM citas WHERE cita_visible=2 OR cita_usuario=$usuario";
        $arrayCitas = [];
        if ($resultado = $this->conexion->query($consulta)) {
            $arrayCitas = $resultado->fetchAll(PDO::FETCH_ASSOC);
            $resultado->closeCursor();
            $resultado = null;
        }
        return $arrayCitas;
    }
}