<?php
session_start();
// $lista_errores=$_REQUEST['errores'];
$errores = isset($_SESSION['errores']) ? $_SESSION['errores'] : [];
unset($_SESSION['errores']); // Limpiar los errores de la sesión después de usarlos

// foreach(unserialize($lista_errores) as $error){
    foreach($errores as $error){
    echo $error;
    echo "<br>";
}
?>
<form action="procesar.php" method="post">
    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre" id="nombre">
    <label for="apellido">Apellido</label>
    <input type="text" name="apellido" id="apellido">
    <label for="dni">DNI: </label>
    <input type="text" name="dni" id="dni">

    <input type="submit" value="Insertar" name="enviar">
</form>