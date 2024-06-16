<?php
require_once __DIR__ . '/../app/libs/Config.php';
require_once __DIR__ . '/../app/modelo/Model.php';
require_once __DIR__ . '/../app/controlador/Controller.php';
require_once __DIR__ . '/../app/libs/bGeneral.php';
require_once __DIR__ . '/../app/modelo/Pelicula.php';

$map = array(
    'inicio' => array('controller' => 'Controller','action' => 'inicio','nivel_usuario' => 0
    )
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