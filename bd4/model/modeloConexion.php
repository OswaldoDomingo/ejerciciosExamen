<?php
include_once('DatosConexion.php');

class ModeloConexion extends PDO
{


    // El constructor se encarga de crear la conexión
    public function __construct()
    {

        /* Los datos de la conexión los tomamos de config */
        parent::__construct('mysql:host=' . DatosConexion::$hostname . ';dbname=' .  DatosConexion::$nombre_bd . ';charset=utf8', DatosConexion::$nombre, DatosConexion::$clave);

        parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //parent::exec("set names utf8");
    }

    function verTodasLasCitas($vista)
    {

        $consulta = "SELECT * FROM citas";
        $arrayCitas = [];
        if ($resultado = $this->query($consulta)) {
            $arrayCitas = $resultado->fetchAll(PDO::FETCH_ASSOC);
            $resultado->closeCursor();
            $resultado = null;
        }
        return $arrayCitas;
    }

    function verCitasPorVista($vista)
    {

        $consulta = "SELECT * FROM citas WHERE cita_visible=$vista";
        $arrayCitas = [];
        if ($resultado = $this->query($consulta)) {
            $arrayCitas = $resultado->fetchAll(PDO::FETCH_ASSOC);
            $resultado->closeCursor();
            $resultado = null;
        }
        return $arrayCitas;
    }
}
