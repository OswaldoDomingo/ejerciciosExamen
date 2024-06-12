<?php ob_start(); ?>
<div class="cabeceraLogin">
    <h1>REGISTRO CITAS VIRTUALES</h1>
</div>
<?php
if (isset($params['mensaje'])) {
    echo "<h3>" . $params['mensaje'] . "</h3>";
}
?>
<?php
foreach ($errores as $error) {
    echo "<h3>" . $error . "</h3>";
}
?>

<form action="index.php?ctl=registro" method="post" name="formRegistro">
    <label for="">Nombre</label>
    <p>
        * <input type="text" name="nombre" value="<?php echo $params['nombre'] ?>"><br>
    </p>
    <label for="">Correo</label>
    <p>
        * <input type="text" name="email" value="<?php    ?>"><br>
    </p>
    <label for="">Edad</label>
    <p>
        * <input type="date" name="edad" value="<?php    ?>"><br>
    </p>
    <label for="">Contraseña</label>
    <p>
        * <input type="password" name="contrasenya" value="<?php   echo $params['contrasenya'] ?>"><br>
    </p>

    <button type="submit" class="btn btn-primary" name="bRegistro">Registrarse</button>
</form>

<?php
$contenido = ob_get_clean();
include 'layout.php'
?>
