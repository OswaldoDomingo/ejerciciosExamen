<?php
//archivo index donde se incluyen los archivos necesarios para la ejecución de la aplicación

require_once __DIR__ . '/../app/libs/Config.php';//Archivo donde se encuantran los datos para la conexión a la base de datos
require_once __DIR__ . '/../app/libs/bGeneral.php';//Archivo donde se encuentran las funciones de validación
require_once __DIR__ . '/../app/modelo/classModelo.php';//Archivo donde se encuentra la clase Modelo parta conxión a la base de datos
require_once __DIR__ . '/../app/controlador/Controller.php';//Archivo donde se encuentra la clase Controller

//Se inicia la sesión
session_start();    

//Se indica un nivel de usuario por defecto si no está logueado el uusuario
if(!isset($_SESSION['nivel_usuario'])){
    $_SESSION['nivel_usuario'] = 0; //nivel de usuario por defecto es 0
    echo "Nivel de usuario por defecto: ".$_SESSION['nivel_usuario'];
}

//Enryutamiento
$map = array(
    'home' => array('controller' => 'Controller', 'action' => 'home', 'nivel_usuario'=>0),
    'inicio' => array('controller' => 'Controller', 'action' => 'inicio', 'nivel_usuario'=>0),
    'error' => array('controller' => 'Controller', 'action' => 'error', 'nivel_usuario'=>0),
    'login' => array('controller' => 'Controller', 'action' => 'login', 'nivel_usuario'=>0),
);

if(isset($_GET['ctl'])){
    if(isset($map[$_GET['ctl']])){
        $ruta = $_GET['ctl'];
} else {
    //Si la ruta no está en el mapa se redirige a la página de error
    header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: No existe la ruta <i>' .   
    $_GET['ctl'] . '</p></body></html>';
    exit;
}
} else {
    $ruta = 'home';
} 
$controlador = $map[$ruta];
print_r($controlador);
if(method_exists($controlador['controller'],$controlador['action'])) {
    if($controlador['nivel_usuario'] <= $_SESSION['nivel_usuario']) {
        call_user_func(array(new $controlador['controller'], $controlador['action']));
    } else {
        call_user_func(array(new Controller(), 'inicio'));
    }
}
?>