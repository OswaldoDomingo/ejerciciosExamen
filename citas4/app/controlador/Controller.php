<?php
class Controller
{

    private function cargaMenu()
    {
        if ($_SESSION['nivel_usuario'] == 0) {
            return 'menuInvitado.php';
        } else if ($_SESSION['nivel_usuario'] == 1) {
            return 'menuUsuario.php';
        } else if ($_SESSION['nivel_usuario'] == 2) {
            return 'menuAdministrador.php';
        }
    }

    public function home()
    {
        $params = array(
            'mensaje' => 'Bienvenido a la página de inicio de citas',
            'mensaje2' => 'Aquí podrás ver las citas públicas y las tuyas propias',
            'fecha' => date('d-m-Y'),
        );
        $menu = 'menuHome.php';

        if ($_SESSION['nivel_usuario'] > 0) {
            header("Location: index.php?ctl=inicio");
        }
        require __DIR__ . '/../../web/templates/inicio.php';
    }

    public function inicio()
    {
        $params = array(
            'mensaje' => 'Bienvenido a la página de inicio de citas',
            'mensaje2' => 'Aquí podrás ver las citas públicas y las tuyas propias',
            'fecha' => date('d-m-Y'),
        );
        $menu = $this->cargaMenu();

        require __DIR__ . '/../../web/templates/inicio.php';
    }

    public function salir()
    {
        session_destroy();
        header("Location: index.php?ctl=home");
    }

    public function error()
    {
        $manu = $this->cargaMenu();
        require __DIR__ . '/../../web/templates/error.php';
    }

    public function citasPublicas()
    {
        try {
            $m = new Citas();
            $citas = $m->verCitasInvitado();
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }

        $menu = $this->cargaMenu();

        require __DIR__ . '/../../web/templates/citasPublicas.php';
    }

    public function iniciarSesion()
    {
        try {
            $params = array(
                'nombreUsuario' => '',
                'contrasenya' => ''
            );
            $menu = $this->cargaMenu();

            if ($_SESSION['nivel_usuario'] > 0) {
                header("Location: index.php?ctl=inicio");
            }
            if (isset($_POST['bIniciarSesion'])) {
                $nombreUsuario = recoge('nombreUsuario');
                $contrasenya = recoge('contrasenya');

                if (cUser($nombreUsuario, "nombreUsuario", $params)) {

                    $m = new Citas();
                    if ($usuario = $m->consultarUsuario($nombreUsuario)) {
                        if (comprobarhash($contrasenya, $usuario['usuario_pass'])) {
                            $_SESSION['idUser'] = $usuario['usuario_id'];
                            $_SESSION['nivel_usuario'] = $usuario['usuario_acceso'];
                            $_SESSION['usuario'] = $usuario['usuario_nombre'];
                            header("Location: index.php?ctl=inicio");
                        } else {
                            $params = array(
                                'nombreUsuario' => $nombreUsuario,
                                'contrasenya' => $contrasenya
                            );
                            $params['mensaje'] = "Revisa el formulario, el usuario o la contraseña no son correctos.";
                        }
                    } else {
                        $params = array(
                            'nombreUsuario' => $nombreUsuario,
                            'contrasenya' => $contrasenya
                        );
                        $params['mensaje'] = "Revisa el formulario, el usuario o la contraseña no son correctos";
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
        require __DIR__ . '/../../web/templates/formInicioSesion.php';
    }


    public function registro()
    {
        $menu = $this->cargaMenu();
        if ($_SESSION['nivel_usuario'] > 0) {
            header("Location: index.php?ctl=inicio");
        }

        $params = array(
            'nombre' => '',
            'email' => '',
            'edad' => '',
            'contrasenya' => ''
        );
        $errores = array();

        if (isset($_POST['bRegistro'])) {
            $nombre = recoge('nombre');
            $email = recoge('email');
            $edad = recoge('edad');
            $contrasenya = recoge('contrasenya');

            cTexto($nombre, 'nombre', $errores);
            cUser($contrasenya, 'contrasenya', $errores);
            comprobarEmail($email,  $errores);
            unixFechaAAAAMMDD($edad, 'edad', $errores);

            if (empty($errores)) {
                try {
                    $m = new Citas();
                    if ($usuario = $m->consultarCorreo($email)) {
                        $errores[] = "El usuario ya existe con ese correo electrónico";
                    } else {
                        $m->insertarUsuario($nombre, $email, $edad, encriptar($contrasenya));
                        $params = array(
                            'nombre' => '',
                            'email' => '',
                            'edad' => '',
                            'contrasenya' => ''
                        );
                        $params['mensaje'] = "Usuario registrado correctamente";
                    }
                } catch (Exception $e) {
                    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
                    header('Location: index.php?ctl=error');
                } catch (Error $e) {
                    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
                    header('Location: index.php?ctl=error');
                }
            } else {
                $params = array(
                    'nombre' => '',
                    'email' => '',
                    'edad' => '',
                    'contrasenya' => ''
                );
                $params['mensaje'] = 'Hay datos que no son correctos. Revisa el formulario.';
            }
        }
        require __DIR__ . '/../../web/templates/formRegistro.php';
    }
}
