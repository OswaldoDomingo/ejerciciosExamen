<?php
//archivo Controller.php
class Controller{

    public function cargarMenu(){
        if(isset($_SESSION['nivel_usuario'])== 0){
            return 'menu.php';
        } else if(isset($_SESSION['nivel_usuario'])== 1){
            return 'menu_usuario.php';
        } else if(isset($_SESSION['nivel_usuario'])== 2){
            return 'menu_admin.php';
        } else {
            return 'menu.php';
        }
    }

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