<?php
$usuario = "oswaldo";
$pass = "kali";
$baseDatos = "oswaldo";
$servidor = "localhost";

$dsn = "mysql:host=$servidor;dbname=$baseDatos;charset=utf8";

try {
    $conexion = new PDO($dsn, $usuario, $pass);
    // Establecer el modo de error de PDO a excepción
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Establecer el juego de caracteres UTF-8
    $conexion->exec("SET CHARACTER SET utf8");
    echo "Conexión exitosa";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>

