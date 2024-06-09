<?php
class Controller
{

    private function cargaMenu()
    {
        if ($_SESSION['nivel_usuario'] == 0) {
            return 'menu_invitado.php';
        } else if ($_SESSION['nivel_usuario'] == 1) {
            return 'menu_usuario.php';
        } else if ($_SESSION['nivel_usuario'] == 2) {
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

        $menu = __DIR__ . '/../../web/templates/menu_home.php';
            require_once $menu;
        
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

    public function login()
    {
        try {

            $params = array(
                'nombreUsuario' => '',
                'contrasenya' => ''
            );
            $menu = $this->cargaMenu();

            if ($_SESSION['nivel_usuario'] > 0) {
                header("location:index.php?ctl=inicio");
            }
            if (isset($_POST['btnLogin'])) {
                $nombreUsuario = recoge('nombre');
                $contrasenya = recoge('clave');

                if (cUser($nombreUsuario, 'nombre', $params)) {
                    $m = new Citas();
                    if ($usuario = $m->consultarUsuario($nombreUsuario)) {
                        //comprobar password es OK
                        if (comprobarhash($contrasenya, $usuario['contrasenya'])) {
                            $_SESSION['id_usuario'] = $usuario['id'];
                            $_SESSION['nivel_usuario'] = $usuario['nivel'];
                            $_SESSION['usuario'] = $usuario['nombre'];
                            header("location:index.php?ctl=inicio");
                        } else {
                            $params = array(
                                'nombreUsuario' => $nombreUsuario,
                                'contrasenya' => $contrasenya,
                                'mensaje' => 'Usuario o contraseña incorrectos'
                            );
                        }
                    }
                }
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . '/../../web/templates/formulario_login.php';
    }

    public function citasPublicas(){
        try {
            $m = new Citas();
            $citas = $m->verCitasInvitado();
            $menu = $this->cargaMenu();
            require __DIR__ . '/../../web/templates/citas_publicas.php';
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }
    }
}
