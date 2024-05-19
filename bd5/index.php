<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
</head>
<body>
    <h1>Citas fabulosas</h1>
    <h2>Escribe las citas que más te gusten.</h2>
    <p>Podrás ver las citas de otros usuarios para poderte ... lo que sea.</p>
    👉<a href="view/formularioLogin.php">Entra</a>👈
    <br>
    👉<a href="view/formularioAlta.php">Date de alta</a>👈
    <?php
    session_start();
    echo isset($_SESSION['usuario']) ? $_SESSION['usuario'] : '';
    echo isset($_SESSION['clave']) ? $_SESSION['clave'] : '';
    // Limpiar mensajes de sesión
    unset($_SESSION['usuario']);
    unset($_SESSION['clave']);


?>
</body>
</html>