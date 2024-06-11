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

    public function iniciarSesion()
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
            if (isset($_POST['btnLogin'])) { // Nombre del boton del formulario
                $nombreUsuario = recoge('nombreUsuario');
                $contrasenya = recoge('contrasenya');

                // Comprobar campos formulario. Aqui va la validación con las funciones de bGeneral   
                if (cUser($nombreUsuario, "nombreUsuario", $params)) {
                    // Si no ha habido problema creo modelo y hago consulta                    
                    $m = new Citas();
                    if ($usuario = $m->consultarUsuario($nombreUsuario)) {
                        // Compruebo si el password es correcto
                        if (comprobarhash($contrasenya, $usuario['contrasenya'])) {
                            // Obtenemos el resto de datos

                            $_SESSION['idUser'] = $usuario['usuario_id'];
                            $_SESSION['nombreUsuario'] = $usuario['usuario_nombre'];
                            $_SESSION['nivel_usuario'] = $usuario['usuario_acceso'];

                            header('Location: index.php?ctl=inicio');
                        }
                    } else {
                        $params = array(
                            'nombreUsuario' => $nombreUsuario,
                            'contrasenya' => $contrasenya
                        );
                        $params['mensaje'] = 'No se ha podido iniciar sesión. Revisa el formulario.';
                    }
                } else {
                    $params = array(
                        'nombreUsuario' => $nombreUsuario,
                        'contrasenya' => $contrasenya
                    );
                    $params['mensaje'] = 'Hay datos que no son correctos. Revisa el formulario.';
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


    public function registro(){
    $menu = $this->cargaMenu();
    if($_SESSION['nivel_usuario'] > 0){
        header("location:index.php?ctl=inicio");
    }

    $params = array(
        'nombre' => '',
        'edad' => '',
        'acceso' => '',
        'clave' => '',
        'email' => ''
    );

    $errores = array();
    if(isset($_POST['btnRegistro'])){
        $nombre = recoge('nombre');
        $edad =  unixFechaAAAAMMDD('edad', 'fecha', $errores);
        $acceso = recoge('acceso');
        $clave = recoge('clave');
        $email = recoge('email');

        cTexto($nombre, 'nombre', $errores);
        cUser($clave, 'clave', $errores);

        if(empty($errores)){
            try{
                $m = new Citas();
                if($m->insertarUsuario($nombre, $edad,  2,  $clave, $email)){
                    header('location:index.php?ctl=login');
                } else {
                    $params = array(
                        'nombre' => $nombre,
                        'edad' => $edad,
                        'acceso' => $acceso,
                        'clave' => $clave,
                        'email' => $email,
                        'mensaje' => 'No se ha podido registrar el usuario'
                    );
                    $params['mensaje'] = 'No se ha podido registrar el usuario. Inténtelo de nuevo.';
                }
            } catch (Exception $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logException.txt");
                header('Location: index.php?ctl=error');
            } catch (Error $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
                header('Location: index.php?ctl=error');
            }
        } else {
            $params = array(
                'nombre' => $nombre,
                'edad' => $edad,
                'acceso' => $acceso,
                'clave' => $clave,
                'email' => $email,
                'mensaje' => 'Hay datos que no son correctos. Revisa el formulario.'
            );
        }
    }
    require __DIR__ . '/../../web/templates/formulario_registro.php';
}

}
