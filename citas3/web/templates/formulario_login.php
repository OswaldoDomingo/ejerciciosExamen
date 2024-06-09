<?php ob_start() ?>
<!-- path:web\templates\formulario_login.php -->
<h2>Login de Citas</h2>
<?php
    if(isset($params['mensaje'])){
        echo "<h2>".$params['mensaje']."</h2>";
    }
?>
<form action="index.php?ctl=login" method="post">
    <label for="nombre">Nombre</label>
    <br>
    <input type="text" name="nombre" id="nombre" required>
    <br>
    <label for="clave">Clave</label>
    <br>
    <input type="password" name="clave" id="clave" required>
    <br>
    <br>
    <input type="submit" value="Enviar" name = 'btnLogin'>
</form>

<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>