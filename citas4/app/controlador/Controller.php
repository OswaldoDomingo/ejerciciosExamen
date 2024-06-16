<?php
class Controller
{

    private function cargaMenu()
    {
        if ($_SESSION['nivel_usuario'] == 0) {
            return 'menuInvitado.php';
        } else if ($_SESSION['nivel_usuario'] == 2) {
            return 'menuUsuario.php';
        } else if ($_SESSION['nivel_usuario'] == 1) {
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
        global $pageData;
        $tema = $this->cargarTema();

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
    private function cargarTema()
    {
        return isset($_COOKIE['tema']) ? $_COOKIE['tema'] : 'claro';
    }

    public function citasUsuario()
    {
        try {
            $m = new Citas();
            $citas = $m->verCitaUsuario($_SESSION['idUser']);
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }
        $menu = $this->cargaMenu();
        require __DIR__ . '/../../web/templates/citasUsuario.php';
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

    //Cambio de tema 
    private $tema = 'claro';

    public function cambiarTema()
    {
        $this->tema = isset($_POST['tema']) ? $_POST['tema'] : 'claro';
        setcookie('tema', $this->tema, time() + (86400 * 30), "/"); // 30 días
        header('Location: index.php?ctl=inicio');
    }

    public function getTema()
    {
        return isset($_COOKIE['tema']) ? $_COOKIE['tema'] : 'claro';
    }

    public function toggleTema()
    {
        $this->tema = $this->tema == 'claro' ? 'oscuro' : 'claro';
        $this->cambiarTema($this->tema);
    }


    public function listarUsuarios()
    {
        try {
            $m = new Citas();
            $usuarios = $m->listarUsuarios();
            $menu = $this->cargaMenu();
            require __DIR__ . '/../../web/templates/listaUsuarios.php';
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }
    }

    public function borrarUsuario()
    {
        try {
            $usuarioId = filter_input(INPUT_GET, 'usuario_id', FILTER_SANITIZE_NUMBER_INT);
            if ($usuarioId) {
                $m = new Citas();
                $m->borrarUsuario($usuarioId);
                header('Location: index.php?ctl=listarUsuarios');
                exit;
            } else {
                throw new Exception('ID de usuario no válido');
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }
        $menu = $this->cargaMenu();
        require __DIR__ . '/../../web/templates/borrarUsuario.php';
    }

    public function insertarCita()
{
    try {
        // Comprobamos el nivel de usuario
        if ($_SESSION['nivel_usuario'] < 2) {
            header('Location: index.php?ctl=inicio');
            exit;
        }

        // Inicializamos las variables
        $usuario_id = '';
        $cita_texto = '';
        $cita_fuente = '';
        $cita_tipo = '';
        $errores = array();

        if (isset($_POST['btnEnviarCita'])) {
            // Recogemos los datos del formulario
            $usuario_id = recoge('usuario');
            $cita_texto = recoge('cita_texto');
            $cita_fuente = recoge('cita_fuente');
            $cita_tipo = recoge('cita_tipo');

            if (empty($errores)) {
                // Insertamos la cita en la base de datos
                $m = new Citas();
                $m->insertarCita($usuario_id, $cita_texto, $cita_fuente, $cita_tipo);
                header('Location: index.php?ctl=citasUsuario');
                exit;
            } else {
                $params['mensaje'] = 'Hay datos que no son correctos. Revisa el formulario.';
            }
        }

        $params = array(
            'usuario_id' => $usuario_id,
            'cita_texto' => $cita_texto,
            'cita_fuente' => $cita_fuente,
            'cita_tipo' => $cita_tipo,
        );

        $menu = $this->cargaMenu();
        require __DIR__ . '/../../web/templates/insertarCita.php';

    } catch (Exception $e) {
        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logException.txt");
        header('Location: index.php?ctl=error');
    } catch (Error $e) {
        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
        header('Location: index.php?ctl=error');
    }
}

public function editarCita() {
    try {
        $id_cita = recoge($_GET['id']);
        $cita = new Citas();
        $cita_nueva = $cita->leeCita($id_cita);

        $params = array(
            'cita_nueva' => $cita_nueva
        );

        require __DIR__ . '/../../web/templates/editarCita.php';
        
    } catch (Exception $e) {
        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logException.txt");
        header('Location: index.php?ctl=error');
    } catch (Error $e) {
        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
        header('Location: index.php?ctl=error');
    }
}

public function actualizarCita(){
    try{
        // Inicializar variables
        $id = '';
        $usuario = '';
        $texto = '';
        $fuente = '';
        $tipo = '';
        $errores = array();

        if (isset($_POST['btnActualizar'])) {
            $id = recoge('id');
            $usuario = recoge('usuario');
            $texto = recoge('texto');
            $fuente = recoge('fuente');
            $tipo = recoge('tipo');

            if (empty($errores)) {
                $m = new Citas();
                $m->editaCita($id, $usuario, $texto, $fuente, $tipo);
                header('Location: index.php?ctl=citasUsuario');
                exit;
            } else {
                $params['mensaje'] = "Hay datos incorrectos";
            }
        }
        $menu = $this->cargaMenu();
        require __DIR__ . '/../../web/templates/editarCita.php';
        
    } catch (Exception $e) {
        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logException.txt");
        header('Location: index.php?ctl=error');
    } catch (Error $e) {
        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
        header('Location: index.php?ctl=error');
    }
}

}
