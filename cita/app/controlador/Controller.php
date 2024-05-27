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
            $menu = $this->cargarMenu();
            
            if($_SESSION['nivel_usuario'] > 0){
                header("location:index.php?ctl=inicio");
        }
        if(isset($_POST['bIniciarSesion'])){
            $nombreUsuario = recoge('nombreUsuario');
            $contrasenya = recoge('contrasenya');
            
            if(cUser($nombreUsuario, "nombreUsuario", $params)){
                $conn = new Citas();
                if($usuario = $conn->consultarUsuario($nombreUsuario)){
                    // if(comprobarHash($contrasenya, $usuario['contrasenya'])){
                        if($contrasenya == $usuario['usuario_pass']){
                        $_SESSION['idUsuario'] = $usuario['usuario_id'];
                        $_SESSION['nombreUsuario'] = $usuario['usuario_nombre'];
                        $_SESSION['nivelUuario'] = $usuario['usuario_acceso'];
                        
                        header("location:index.php?ctl=inicio");
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
}
