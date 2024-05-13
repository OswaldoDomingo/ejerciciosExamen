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

    }

}
