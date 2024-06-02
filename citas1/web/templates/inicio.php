<?php 
ob_start();
?>

<!-- Archivo inicio.php -->
<h1>Este es el inicio de la aplicación citas</h1>

<h3><?php echo $params['fecha']; ?></h3>

<?php 
ob_clean();
?>