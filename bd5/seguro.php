<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio seguro</title>
</head>
<body>
    <?php
    session_start();
    if(isset($_SESSION['usuario'])){
        echo "<h1>Bienvenido {$_SESSION['usuario']}</h1>";
        echo "<p>Correo: {$_SESSION['correo']}</p>";
        echo "<img src='imagen/{$_SESSION['imagen']}' alt='Imagen de perfil'>";
        echo "<p>Nivel: {$_SESSION['nivel']}</p>";
        echo "<a href='cerrar.php'>Cerrar sesión</a>";

    }
    ?>
</body>
</html>