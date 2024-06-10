<?php ob_start() ?>
<!-- path:web\templates\formulario_registro.php -->
<form action="" method="post">
    <label for="nombre">Nombre</label>
    <br>
    <input type="text" name="nombre" id="nombre" required>
    <br>
    <label for="fecha">Fecha</label>
    <br>
    <input type="date" name="fecha" id="fecha" required>
    <br>
    <label for="email">Email</label>
    <br>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="clave">Clave</label>
    <br>
    <input type="text" name="clave" id="clave" required>
    <br>
    <label for="acceso">Acceso</label>
    <br>
    <input type="submit" value="Enviar" name = "btnRegistro">

</form>
<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>