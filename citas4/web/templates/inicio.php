<?php ob_start(); ?>
<div class="inicio">
    <h3><?php echo $params['fecha'] ?></h3>
    <h3><?php echo $params['mensaje'] ?></h3>
    <h3><?php echo $params['mensaje2'] ?></h3>

    <form action="index.php?ctl=cambiarTema" method="post">
        <label for="tema">Elige tema</label>
        <select name="tema" id="tema">
            <option value="claro">Claro</option>
            <option value="oscuro">Oscuro</option>
        </select>
        <input type="submit" value="Cambiar tema" name="colorTema">

    </form> 
</div>


<?php $contenido = ob_get_clean(); ?>

<?php include 'layout.php'; ?>


