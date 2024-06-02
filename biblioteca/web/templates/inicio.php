<?php ob_start() ?>


<h3 class="text-center"><b><?php echo $params['fecha'] ?></b></h3><br>  

<h3 class="text-center"><b><?php echo $params['mensaje'] ?></b></h3><br>

<h4 class="text-center"><?php echo $params['mensaje2'] ?></h4><br>

<h1>Estamos aquí</h1>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>