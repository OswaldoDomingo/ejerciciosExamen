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
    // 'registro' => array('controller' => 'Controller', 'action' => 'registro', 'nivel_usuario'=>0),
    // 'login' => array('controller' => 'Controller', 'action' => 'login', 'nivel_usuario'=>0),
);

if(isset($_GET['ctl'])){
    if(isset($map[$_GET['ctl']])){
        $ruta = $_GET['ctl'];
    } else {
        header('Status: 404 Not Found');
        echo '<html><body><h1>Error 404: No existe la ruta <i>' .
        $_GET['ctl'] .
        '</p></body></html>';
        exit;
    }
} else {
    $ruta = 'home';
}

$controlador = $map[$ruta];

if(method_exists($controlador['controller'], $controlador['action'])){
    if($controlador['nivel_usuario'] <= $_SESSION['nivel_usuario']){
        call_user_func(array(new $controlador['controller'], $controlador['action']));
    } else {
        call_user_func(array(new $controlador['controller'], 'inicio'));
    }
   
} else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: El controlador <i>' .
        $controlador['controller'] .
        '->' .
        $controlador['action'] .
        '</i> no existe</h1></body></html>';
        error_log('Error 404: El controlador ' . $controlador['controller'] . '->' . $controlador['action'] . ' no existe');
}