<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>
</head>

<body>
    <?php
    // Ruta al archivo del controlador
    $controladorPath = 'controlador/Controlador.php';

    // Comprobar si el archivo del controlador existe
    if (file_exists($controladorPath)) {
        require_once 'controlador/Controlador.php';
        $controlador = new Controlador();

        if (isset($_GET['vista'])) {
            $vista = $_GET['vista'];
            switch ($vista) {
                case '0':
                    $controlador->mostrarVista0();
                    break;
                case '1':
                    $controlador->mostrarVista1();
                    break;
                case '2':
                    $controlador->mostrarVista2();
                    break;
                case '3':
                    $controlador->mostrarVista3();
                    break;
                default:
                    $controlador->mostrarVista0();
            }
        } else {
            $controlador->mostrarVista0();
        }
    } else {
        echo 'Error: no se encontró el archivo del controlador';
    }
    ?>
</body>

</html>