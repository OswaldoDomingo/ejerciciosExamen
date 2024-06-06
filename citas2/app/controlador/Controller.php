<?php
class Controller{

    private function cargarMenu(){
        if($_SESSION['nivel_usuario'] == 0){
            return 'menuInvitado.php';
        } else if($_SESSION['nivel_usuario'] == 1){
            return 'menuUsuario.php';
        } else if($_SESSION['nivel_usuario'] == 2) {
            return 'menuAdmin.php';
        }
    }

    public function home(){
        echo 'Bienvenido a la página de citas <br>';
        $params = array(
            'mensaje' => 'Bienvenido a la cicloteca virtual',
            'mensaje2' => 'Aquí encontrarás una gran variedad de citas',
            'fecha' => date('d-m-Y')
        );
        $menu = $this->cargarMenu();
        // echo $_SESSION['nivel_usuario'];
        include __DIR__ . '/../../web/templates/home.php';
    }

    public function inicio(){
        $params = array(
            'fecha' => date('d-m-Y'),
            'mensaje' => 'Bienvenido a la página de citas',
            'mensaje2' => 'Aquí podrás encontrar a tu media naranja'
        );
        echo 'No tienes permisos para acceder a esta página';
        // include Config::$vista;
    }

    public function verCitasInvitado(){
        try{
            $conexion = new Modelo();
            $consulta = "SELECT * FROM citas WHERE citas_tipo = 2";
            $conexion->query($consulta);
            $conexion->prepare($consulta);


        } catch (PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }
    }

}