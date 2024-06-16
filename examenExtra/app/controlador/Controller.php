<?php

class Controller
{
    public function cargaMenu()
    {
        if ($_SESSION['nivel_usuario'] == 0) {
            return 'menu0.php';
        } else if ($_SESSION['nivel_usuario'] == 1) {
            return 'menu1.php';
        } else if ($_SESSION['nivel_usuario'] == 2) {
            return 'menu2.php';
        }
    }

    public function inicio()
    {
        $params['mensaje'] = 'Bienvenido al examen de Servidor de la Convocatoria Extraordinaria';

        try {
        } catch (PDOException $e) {
            // En este caso guardamos los errores en un archivo de errores log
            error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../log.txt");
            // guardamos en ·errores el error que queremos mostrar a los usuarios
            header("location:index.php?ctl=error");
        }


        require __DIR__ . '/../../web/templates/inicio.php';
    }

    public function login()
    {
        try {
            $params = array(
                'nombreUsuario' => '',
                'contrasenya' => ''
            );
            if (isset($_POST['login'])) {
                $nombreUsuario = recoge('usuario');
                $contrasenya = recoge('pass');
                

            }
        } catch (PDOException $e) {
            // En este caso guardamos los errores en un archivo de errores log
            error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../log.txt");
            // guardamos en ·errores el error que queremos mostrar a los usuarios
            header("location:index.php?ctl=error");
        }
        require __DIR__ . '/../../web/templates/login.php';
    }




    public function salir()
    {
        session_destroy();
        header('Location:indes.php?ctl=inicio');
    }
    public function error()
    {


        require __DIR__ . '/../../web/templates/error.php';
    }
}
