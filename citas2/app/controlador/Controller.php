<?php
class Controller{

    private function cargarMenu(){
        if($_SESSION['nivel_usuario'] == 0){
            return 'menu_invitado.php';
        } else if($_SESSION['nivel_usuario'] == 1){
            return 'menu_usuario.php';
        } else if($_SESSION['nivel_usuario'] == 2) {
            return 'menu_administrador.php';
        }
    }

    public function home(){
        // echo 'Bienvenido a la página de citas<br>';
        $params = array(
            'mensaje' => 'Bienvenido a la página de citas virtual',
            'mensaje2' => 'Aquí encontrarás una gran variedad de citas',
            'fecha' => date('d-m-Y')
        );
        // $menu = $this->cargarMenu();
        $menu = 'menu_home.php';

        if($_SESSION['nivel_usuario'] > 0){
            header('Location: index.php?ctl=inicio');
        }

        include __DIR__ . '/../../web/templates/menu_home.php';
    }

    public function inicio(){
        
        $params = array(
            'fecha' => date('d-m-Y'),
            'mensaje' => 'Bienvenido a la página de citas',
            'mensaje2' => 'Aquí podrás encontrar a tu media naranja'
        );
        $menu = $this->cargarMenu();
        include __DIR__ . '/../../web/templates/inicio.php';
    }

    public function registro(){
        echo 'Página de registro';
        $menu = $this->cargarMenu();
        include __DIR__ . '/../../web/templates/formulario_registro.php';

    }

    public function login(){
        echo 'Página de login';
        $menu = $this->cargarMenu();
        include __DIR__ . '/../../web/templates/formulario_login.php';
    }

}