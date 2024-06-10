<?php
ob_start();
?>
<!-- path:inicio.php -->
 <h2>Menu inicio</h2>
<h3><b><?php echo $params['fecha'] ?></b></h3><br>  

<h3><b><?php echo $params['mensaje'] ?></b></h3><br>

<h4><?php echo $params['mensaje2'] ?></h4><br>


<?php 

echo $_SESSION['nombreUsuario'] ? $_SESSION['nombreUsuario']:'';  $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>
