<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
</head>
<body>
    <h1>Citas</h1>
    <?php 
    session_start();
    if(isset($_SESSION['usuario'])){
        $_SESSION['usuario']=0;
    } 
    ?>
    <a href="view/loginFormulario.php">Inicia sesión.</a>
    <br>
    <a href="view/verCitas.php">Ver Citas</a>
</body>
</html>