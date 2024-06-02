<!-- Archivo home.php -->
<?php ob_start(); ?>

<h1>Este es el <span style="color:red"> HOME </span> de la aplicación Citas</h1>


<?php 
$content = ob_get_clean(); 
include 'layout.php';

echo "<br>";
echo $params['mensaje'];
echo "<br>";
echo $params['mensaje2'];
echo "<br>";
echo $params['fecha'];
echo "<br>";
?>