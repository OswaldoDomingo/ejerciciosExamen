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
        try {
            $params['mensaje'] = 'Bienvenido al examen de Servidor de la Convocatoria Extraordinaria';

            $menu = $this->cargaMenu();
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
            // Inicializa parámetros
            $params = array(
                'nombreUsuario' => '',
                'contrasenya' => ''
            );

            $menu = $this->cargaMenu();

            if (isset($_SESSION['nivel_usuario']) && $_SESSION['nivel_usuario'] > 0) {
                header('Location:index.php?ctl=inicio');
                exit; // Detiene la ejecución del script después de la redirección
            }

            // Procesa el formulario de login
            if (isset($_POST['login'])) {
                // Recoge los datos del formulario (asegúrate de que recoge() esté definido)
                $nombreUsuario = recoge('usuario');
                $contrasenya = recoge('pass');

                if (cUser($nombreUsuario, 'user', $params)) {
                    $m = new Pelicula();

                    // Consulta al usuario (asegúrate de que consultarUsuario() esté definido y funcione correctamente)
                    if ($usuario = $m->consultarUsuario($nombreUsuario)) {
                        // Verifica las credenciales (mejor usar password_verify)
                        if ($nombreUsuario == $usuario['user'] && $contrasenya == $usuario['pass']) {
                            // Establece variables de sesión
                            $_SESSION['id_usuario'] = $usuario['id'];
                            $_SESSION['nombre_usuario'] = $usuario['user'];
                            $_SESSION['nivel_usuario'] = $usuario['nivel'];

                            // Redirige a la página de inicio después de iniciar sesión
                            header("Location:index.php?ctl=inicio");
                            exit; // Detiene la ejecución del script después de la redirección
                        } else {
                            // Credenciales incorrectas
                            $params = array(
                                'nombreUsuario' => $nombreUsuario,
                                'contrasenya' => $contrasenya
                            );
                            $params['mensaje'] = "Error en los datos introducidos";
                        }
                    } else {
                        $params['mensaje'] = "Usuario no encontrado.";
                    }
                } else {
                    $params['mensaje'] = "Error en la verificación del usuario.";
                }
            }
        } catch (PDOException $e) {
            // Manejo de excepciones, guarda errores en log
            error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../log.txt");
            // Redirige a la página de error
            header("location:index.php?ctl=error");
            exit; // Detiene la ejecución del script después de la redirección
        }

        // Incluye la plantilla de login
        require __DIR__ . '/../../web/templates/login.php';
    }





    public function salir()
    {
        session_destroy();
        header('Location:index.php?ctl=inicio');
    }

    public function error()
    {


        require __DIR__ . '/../../web/templates/error.php';
    }

    public function insertarPelicula()
    {

        // Comprobamos el nivel de usuario
        if ($_SESSION['nivel_usuario'] < 2) {
            header('Location: index.php?ctl=inicio');
            exit;
        }

        $fecha = '';
        $resumen = '';
        $titulo = '';
        $duracion = '';
        $errores = array();

        $m = new Pelicula();

        if (isset($_POST['bAceptar'])) {
            $fecha = recoge('fecha');
            $resumen = recoge('resumen');
            $titulo = recoge('titulo');
            $duracion = recoge('duracion');

            cTexto($resumen, 'resumen', $errores);
            cTexto($titulo, 'titulo', $errores);
            cNum($duracion, 'duracion', $errores);

            if (empty($errores)) {
                $m = new Pelicula();
                $m->insertarPelicula($fecha, $resumen, $titulo, $duracion);
                header('Location:index.php?ctl=insertarPelicula');
                exit;
            } else {
                
                    echo "Algo mal";
               
            }
        }
    }

    public function listar()
    {

        try {
            $m = new Pelicula();
            $peliculas = $m->listarPeliculas();
            $menu = $this->cargaMenu();
            require __DIR__ . '/../../web/templates/listarPeliculas.php';
        } catch (PDOException $e) {
            // En este caso guardamos los errores en un archivo de errores log
            error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../log.txt");
            // guardamos en ·errores el error que queremos mostrar a los usuarios
            header("location:index.php?ctl=error");
        }
    }
}
