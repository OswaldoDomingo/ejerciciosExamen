<?php

require_once __DIR__ . '/../app/libs/Config.php';
require_once __DIR__ . '/../app/modelo/Model.php';
require_once __DIR__ . '/../app/controlador/Controller.php';
require_once __DIR__ . '/../app/libs/bGeneral.php';
require_once __DIR__ . '/../app/modelo/Pelicula.php';

session_start();
if(!isset($_SESSION['nivel_usuario'])){
    $_SESSION['nivel_usuario'] = 0;
}

$map = array(
    'inicio' => array('controller' => 'Controller','action' => 'inicio','nivel_usuario' => 0),
    'login' => array('controller' => 'Controller','action' => 'login','nivel_usuario' => 0),
    'insertarPelicula' => array('controller' => 'Controller','action' => 'insertarPelicula','nivel_usuario' => 2),
    'salir' => array('controller' => 'Controller', 'action' => 'salir', 'nivel_usuario' => 1),
    'listar' => array('controller' => 'Controller', 'action' => 'listar', 'nivel_usuario' => 1),

);

if (isset($_GET['ctl'])) {
    if (isset($map[$_GET['ctl']])) {
        $ruta = $_GET['ctl'];
    } else {
        header('Status:404 Not Found');
        echo '<html><body><h1>Error 404: No existe la ruta <i>' . $_GET['ctl'] . '</i></body></html>';
        exit();
    }
} else {
    $ruta = 'inicio';
}
$controlador = $map[$ruta];

if (method_exists($controlador['controller'], $controlador['action'])) {
    call_user_func(array(new $controlador['controller'](),$controlador['action']));
} else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: El controlador <i>' . $controlador['controller'] . '->' . $controlador['action'] . '</i> no existe</h1></body></html>';
}

?>