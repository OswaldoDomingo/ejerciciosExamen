<?php
class Controller{

    private function cargaMenu(){
        if($_SESSION['nivel_usuario'] == 0){
            return 'menu_invitado.php';
        } else if($_SESSION['nivel_usuario'] == 1){
            return 'menu_usuario.php';
        } else if($_SESSION['nivel_usuario'] == 2) {
            return 'menu_administrador.php';
        }
    }

    public function home()
    {

        $params = array(
            'mensaje' => 'Bienvenido a la web de citas',
            'mensaje2' => 'Aquí encontrarás una gran variedad de citas para recordar ',
            'fecha' => date('d-m-Y')
        );
        $menu = 'menu_home.php';

        if ($_SESSION['nivel_usuario'] > 0) {
            header("location:index.php?ctl=inicio");
        }
        require __DIR__ . '/../../web/templates/inicio.php';
    }

    public function inicio()
    {


        $params = array(
            'mensaje' => 'Bienvenido a la web de citas',
            'mensaje2' => 'Aquí encontrarás una gran variedad de citas para recordar',
            'fecha' => date('d-m-Y')
        );
        $menu = $this->cargaMenu();

        require __DIR__ . '/../../web/templates/inicio.php';
    }

    // public function login(){
    //     echo 'Página de login';
    //     $menu = $this->cargaMenu();
    //     include __DIR__ . '/../../web/templates/formulario_login.php';
    // }

}