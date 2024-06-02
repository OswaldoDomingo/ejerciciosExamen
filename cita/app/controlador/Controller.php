<?php

class Controller
{
    //Método que se encarga de cargar el menu que corresponda según el tipo de usuario
    private function cargaMenu()
    {
        if ($_SESSION['nivel_usuario'] == 0) {
            return 'menuInvitado.php';
        } else if ($_SESSION['nivel_usuario'] == 1) {
            return 'menuUser.php';
        } else if ($_SESSION['nivel_usuario'] == 2) {
            return 'menuAdmin.php';
        }
    }


    public function home()
    {

        $params = array(
            'mensaje' => 'Bienvenido la aplicación Citas',
            'mensaje2' => 'Aquí encontrarás una gran variedad de citas',
            'fecha' => date('d-m-Y')
        );
        $menu = 'menuHome.php';

        if ($_SESSION['nivel_usuario'] > 0) {
            header("location:index.php?ctl=inicio");
        }
        require __DIR__ . '/../../web/templates/inicio.php';
    }

    public function inicio()
    {


        $params = array(
            'mensaje' => 'Bienvenido la aplicación Citas',
            'mensaje2' => 'Aquí encontrarás una gran variedad de citas',
            'fecha' => date('d-m-Y')
        );
        $menu = $this->cargaMenu();

        require __DIR__ . '/../../web/templates/inicio.php';
    }

    public function listarCitasPublicas()
    {
        // Crear una instancia de la clase Citas
        $citasModel = new Citas();

        // Llamar al método dameCitasPublicas a través de la instancia creada
        $citas = $citasModel->dameCitasPublicas();

        // Aquí puedes usar $citas según sea necesario, por ejemplo, pasar a la vista
        $params = array(
            'citas' => $citas,
            'mensaje' => 'Listado de citas públicas'
        );

        // Cargar la plantilla correspondiente
        require __DIR__ . '/../../web/templates/mostrarCitasPublicas.php';
    }
    //*************************************************************************************** */
    public function iniciarSesion()
    {
        try {

            $params = array(
                'nombreUsuario' => '',
                'contrasenya' => '',
            );
            //$menu = $this->cargarMenu();

            if ($_SESSION['nivel_usuario'] > 0) {
                header("location:index.php?ctl=inicio");
            }
            if (isset($_POST['bIniciarSesion'])) {
                $nombreUsuario = recoge('nombreUsuario');
                $contrasenya = recoge('contrasenya');

                if (cUser($nombreUsuario, "nombreUsuario", $params)) {
                    $conn = new Citas();
                    if ($usuario = $conn->consultarUsuario($nombreUsuario)) {
                        // if(comprobarHash($contrasenya, $usuario['contrasenya'])){
                        if ($contrasenya == $usuario['usuario_pass']) {
                            $_SESSION['idUsuario'] = $usuario['usuario_id'];
                            $_SESSION['nombreUsuario'] = $usuario['usuario_nombre'];
                            $_SESSION['nivelUsario'] = $usuario['usuario_acceso'];
                            $_SESSION['localidadUsuario'] = $usuario['usuario_localidad'];
                            $_SESSION['imagenUsuario'] = $usuario['usuario_imagen'];
                            $_SESSION['correoUsuario'] = $usuario['usuario_correo'];

                            header("location:index.php?ctl=citasUsuario");
                        } else {
                            $params = array(
                                'nombreUsuario' => $nombreUsuario,
                                'contrasenya' => $contrasenya,
                            );
                            $params['mensaje'] = 'El usuario o la contraseña no son correctos';
                        }
                    } else {
                        $params = array(
                            'nombreUsuario' => $nombreUsuario,
                            'contrasenya' => $contrasenya,
                        );
                        $params['mensaje'] = 'El usuario o la contraseña no son correctos';
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
        require __DIR__ . '/../../web/templates/citasFormularioLogin.php';
    }
    //*************************************************************************************** */

    private function cargarMenu()
    {
        if ($_SESSION['nivel_usuario'] == 0) {
            return 'menuInvitado.php';
        } else if ($_SESSION['nivel_usuario'] == 1) {
            return 'menuUser.php';
        } else if ($_SESSION['nivel_usuario'] == 2) {
            return 'menuAdmin.php';
        }
    }

    public function registro()
    {

        $params = array(
            'nombre' => '',
            'edad' => '',
            'imagen' => '',
            'localidad' => '',
            'correo' => '',
            'pass' => '',
        );
        $errores = array();
        $conn = new Citas();
		$localidades = $conn->pintaLocalidades();
        $direcotorioImagenes = __DIR__ . '/../../web/img/';
        $extensiones = array('jpg', 'jpeg', 'png', 'gif');
        if (isset($_POST['bRegistro'])) {
            // $nombre = $_REQUEST['nombre'];
            $nombre = recoge('nombre', $errores);
            $edad = $_REQUEST['edad'];
            $imagen = $_REQUEST['imagen'];
            $localidad = $_REQUEST['localidad'];
            $correo = $_REQUEST['correo'];
            $pass = $_REQUEST['contrasenya'];
            cUser("nombre", $nombre,  $errores);
            cFile($imagen, $errores, $extensiones, $direcotorioImagenes, 1000000000);

            if (empty($errores)) {
                try {
                    $conn = new Citas();
                    if ($conn->insertarUsuario($nombre, $edad, $imagen, 2, $localidad, $correo, $pass)) {
                        header('Location: index.php?ctl=inicio');
                    } else {
                        $params = array(
                            'nombre' => $nombre,
                            'edad' => $edad,
                            'imagen' => $imagen,
                            'localidad' => $localidad,
                            'correo' => $correo,
                            'pass' => $pass,
                        );
                        $params['mensaje'] = 'No se ha podido registrar el usuario';
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
                    'nombre' => $nombre,
                    'edad' => $edad,
                    'imagen' => $imagen,
                    'localidad' => $localidad,
                    'correo' => $correo,
                    'pass' => $pass,
                );
                $params['mensaje'] = 'Hay datos que no son correctos. Revisa el formulario.';
            }
        }


        require __DIR__ . '/../../web/templates/citasFormularioRegistro.php';
    }

    public function citasUsuario()
    {
        // $params = array(
        //     'mensaje' => 'Bienvenido a tu zona de usuario',
        //     'fecha' => date('d-m-Y')
        // );
        // $menu = $this->cargaMenu();
        require __DIR__ . '/../../web/templates/citasUsuario.php';
    }

    public function paginaPrueba()
    {
        require __DIR__ . '/../../web/templates/paginaPrueba.php';
    }
}
