<?php ob_start(); ?>

<!-- Archivo inicio.php -->

<h3 class="text-center"><b><?php echo $params['fecha'] ?></b></h3><br>  

<h3 class="text-center"><b><?php echo $params['mensaje'] ?></b></h3><br>

<h4 class="text-center"><?php echo $params['mensaje2'] ?></h4><br>

<?php 
$content = ob_get_clean(); 
?>
<h1>Este es el inicio de la aplicación citas</h1>
<?php
include 'layout.php';
// echo $params['fecha'];
?>
<br>