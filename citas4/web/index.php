<?php
require_once __DIR__ . '/../app/libs/Config.php';
require_once __DIR__ . '/../app/libs/bGeneral.php';
require_once __DIR__ . '/../app/libs/bSeguridad.php';
require_once __DIR__ . '/../app/modelo/classModelo.php';
require_once __DIR__ . '/../app/modelo/classCitas.php';
require_once __DIR__ . '/../app/controlador/Controller.php';

session_start();
//index.php
if(!isset($_SESSION['nivel_usuario'])){
    $_SESSION['nivel_usuario'] = 0;
}

$map = array(
    'home' => array('controller' => 'Controller', 'action' => 'home', 'nivel_usuario'=>0),
    'inicio' => array('controller' => 'Controller', 'action' => 'inicio', 'nivel_usuario'=>0),
    'iniciarSesion' => array('controller' => 'Controller', 'action' => 'iniciarSesion', 'nivel_usuario'=>0),
    'citasPublicas' => array('controller' => 'Controller', 'action' => 'citasPublicas', 'nivel_usuario'=>0),
    'salir' => array('controller' => 'Controller', 'action' => 'salir', 'nivel_usuario'=>1),
    'registro' => array('controller' => 'Controller', 'action' => 'registro', 'nivel_usuario'=>0),
    'error' => array('controller' => 'Controller', 'action' => 'error', 'nivel_usuario'=>0),
    'citasUsuario' => array('controller' => 'Controller', 'action' => 'citasUsuario', 'nivel_usuario'=>1),
    'cambiarTema' => array('controller' => 'Controller', 'action' => 'cambiarTema', 'nivel_usuario'=>0),
    'listarUsuarios' => array('controller' => 'Controller', 'action' => 'listarUsuarios', 'nivel_usuario'=>1),
    'borrarUsuario' => array('controller' => 'Controller', 'action' => 'borrarUsuario', 'nivel_usuario'=>1),
    'insertarCita' => array('controller' => 'Controller', 'action' => 'insertarCita', 'nivel_usuario' =>2),
    'editarCita' => array('controller' => 'Controller', 'action' => 'editarCita', 'nivel_usuario' => 2),
    'actualizarCita' => array('controller' => 'Controller', 'action' => 'actualizarCita', 'nivel_usuario' => 2),
);

if (isset($_GET['ctl'])) {
    if (isset($map[$_GET['ctl']])) {
        $ruta = $_GET['ctl'];
    } else {

        //Si el valor puesto en ctl en la URL no existe en el array de mapeo envía una cabecera de error
        header('Status: 404 Not Found');
        echo '<html><body><h1>Error 404: No existe la ruta <i>' .
            $_GET['ctl'] . '</p></body></html>';
        exit;
        /*
             * También podríamos poner $ruta=error; y mostraríamos una pantalla de error
             */
    }
} else {
    $ruta = 'home';
}
$controlador = $map[$ruta];
/* 
Comprobamos si el metodo correspondiente a la acción relacionada con el valor de ctl existe, 
si es así ejecutamos el método correspondiente.
En caso de no existir cabecera de error.
En caso de estar utilizando sesiones y permisos en las diferentes acciones comprobariamos tambien 
si el usuario tiene permiso suficiente para ejecutar esa acción
*/

if (method_exists($controlador['controller'], $controlador['action'])) {
    if ($controlador['nivel_usuario'] <= $_SESSION['nivel_usuario']) {
        call_user_func(array(
            new $controlador['controller'],
            $controlador['action']
        ));
        if($controlador['action'] == 'borrarUsuario' && isset($_GET['usuario_id'])){
            $controladorInstancia->borrarUsuario($_GET['usuario_id']); //Expected type 'object'. Found 'string|int'.intelephense(P1006)
            header('Location: index.php?ctl=listarUsuarios');
        }
    }else{
        call_user_func(array(
            new $controlador['controller'],
            'inicio'
        )); 
    }
} else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: El controlador <i>' .
        $controlador['controller'] .
        '->' .
        $controlador['action'] .
        '</i> no existe</h1></body></html>';
    //console_log("entrarErrorInicio");
}