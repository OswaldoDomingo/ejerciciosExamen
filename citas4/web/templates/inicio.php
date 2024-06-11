<?php ob_start(); ?>
<div class="inicio">
    <h3><?php echo $params['fecha'] ?></h3>
    <h3><?php echo $params['mensaje'] ?></h3>
    <h3><?php echo $params['mensaje2'] ?></h3>
</div>

<?php $contenido = ob_get_clean(); ?>

<?php include 'layout.php'; ?>


