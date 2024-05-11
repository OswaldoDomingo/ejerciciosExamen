<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC 1</title>
</head>
<body>    <?php
    session_start();

    require_once __DIR__ . "/../mvc1/libs/config.php";
    require_once __DIR__ . "/../mvc1/libs/utils.php";
    
    require_once __DIR__ . "/../mvc1/modelos/classModelo.php";
    require_once __DIR__ . "/../mvc1/modelos/classAlimento.php";

    require_once __DIR__ . "/../mvc1/controlador/controller.php";
    
    $_SESSION['nivel_usuario = 0'];    
    
    $mapa = array(
        'inicio'=>array('controller'=>'controller', 'action'=>'inicio'),
        'listar'=>array('controller'=>'controller', 'action'=>'listar'),
        'insertar'=>array('controller'=>'controller', 'action'=>'insertar'),
        'buscar'=>array('controller'=>'controller', 'action'=>'buscarPorNombre'),
        'ver'=>array('controller'=>'controller', 'action'=>'ver'),
        'error'=>array('controller'=>'controller', 'action'=>'error'),

    );

    if(isset($_GET['ctl'])){
        if(isset($mapa[$_GET['ctl']])){
            $ruta = $_GET['ctl'];        } 
            else {
        header('Status: 404 Not Found');
        echo '<html><body><h1>Error 404: No existe la ruta <i>' . $_GET['ctl'] .'</p></body></html>'; exit; 
    }
        } else { 
        $ruta = 'inicio';         
    } 

    $controlador = $map[$ruta];

    ?>
</body>
</html>