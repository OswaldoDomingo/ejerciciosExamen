<?php
//archivo Controller.php
class Controller{

    public function cargarMenu(){
        if(isset($_SESSION['nivel_usuario']) == 0){
            return 'menu.php';
        } else if(isset($_SESSION['nivel_usuario']) == 1){
            return 'menu_usuario.php';
        } else if(isset($_SESSION['nivel_usuario']) == 2){
            return 'menu_admin.php';
        } else {
            return 'menu.php';
        }
    }

    public function login(){
        require __DIR__ . '/../../web/templates/login.php';
        echo "Hola desde el controlador login";
    }

    public function inicio(){
        $menu = $this->cargarMenu();
        $params = array('fecha' => date('d-m-Y'));
        require __DIR__ . '/../../web/templates/inicio.php';
        echo "Hola desde el controlador inicio";
    }

    public function home(){
        $menu = $this->cargarMenu();
        $params = array('fecha' => date('d-m-Y'));
        require __DIR__ . '/../../web/templates/home.php';
        echo "Hola desde el controlador home";
    }

    public function error(){
        require __DIR__ . '/../../web/templates/error.php';
        echo "Hola desde el controlador error";
    }

    public function cerrarSesion(){
        session_unset();
        session_destroy();
        header('Location: index.php?ctl=home');
    }

}




?>