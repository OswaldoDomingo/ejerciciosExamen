<?php ob_start(); ?>

<!-- Archivo inicio.php -->


<?php 

$content = ob_get_clean(); 
include 'layout.php';
?>
<h1>Este es el inicio de la aplicación citas</h1>
<?php
echo $params['fecha'];
?>
<br>