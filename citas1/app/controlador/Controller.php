<?php
//archivo Controller.php
class Controller{

    public function inicio(){
        require __DIR__ . '/../../web/templates/inicio.php';
        echo "Hola desde el controlador inicio";
    }

    public function home(){
        require __DIR__ . '/../../web/templates/home.php';
        echo "Hola desde el controlador home";
    }

    public function error(){
        require __DIR__ . '/../../web/templates/error.php';
        echo "Hola desde el controlador error";
    }


}




?>