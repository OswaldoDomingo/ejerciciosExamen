<?php ob_start(); ?>
<div class="cabeceraLogin">
    <h1>CITAS VIRTUALES</h1>
</div>
<?php
    if(isset($params['mensaje'])){
        echo "<h3>".$params['mensaje']."</h3>";
    }
?>
<form action="index.php?ctl=iniciarSesion" method="post">
    <div class="form-group">
        <label for="usuario">Usuario:</label>
        <input type="text" class="form-control" id="usuario" name="usuario">
    </div>
    <div class="form-group">
        <label for="password">Contraseña:</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary" name = "bIniciarSesion" >Entrar</button>

</form>

<?php 
$contenido = ob_get_clean(); 
include 'layout.php' 
?>
