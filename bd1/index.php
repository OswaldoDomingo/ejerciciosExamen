<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BD 1</title>
</head>
<body>
    <h1>BD</h1>
    <?php
        $mapa=[
            'login'=>'formularioLogin.php',
            'inicio'=>'index.php',
        ];

        if(isset($_GET['ctl']) && isset($mapa[$_GET['ctl']])){
            $ruta = $_GET['ctl'];
        } else {
            $ruta = 'inicio';
        }

    ?>
    
</body>
</html>