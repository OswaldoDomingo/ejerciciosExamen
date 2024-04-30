<?php 
session_start(); 
$permisos = $_SESSION['permisos_id'];
?>
<!-- pagina_personal.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Página personal</h1>
    <p>Hola, eres un usuario con permisos de nivel <?= $permisos ?></p>
</body>
</html>