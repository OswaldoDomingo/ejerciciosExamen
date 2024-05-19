<?php
// controlador/Controlador.php

class Controlador {
    private $modelo;

    public function __construct(){
        // Ruta al archivo del modelo
        $modeloPath = 'modelo/Modelo.php';

        // Comprobar si el archivo del modelo existe
        if (file_exists($modeloPath)) {
            require_once $modeloPath;
            $this->modelo = new Modelo();
        } else {
            echo "El archivo del modelo no existe.";
            exit;
        }
    }

    public function mostrarVista0(){
        $mensaje = $this->modelo->getMensaje(0);
        require 'vista/vista0.php';
    }

    public function mostrarVista1(){
        $mensaje = $this->modelo->getMensaje(1);
        require 'vista/vista1.php';
    }

    public function mostrarVista2(){
        $mensaje = $this->modelo->getMensaje(2);
        require 'vista/vista2.php';
    }

    public function mostrarVista3(){
        $mensaje = $this->modelo->getMensaje(3);
        require 'vista/vista3.php';
    }
}
