<!-- menu_usuario.php -->
<h3>Bienvenido <?php echo $_SESSION['nombreUsuario'] ?></h3>
<div class="nav">
<a href="index.php?ctl=home">Inicio</a>
<a href="index.php?ctl=citasPublicas">Listar citas públicas</a>
<a href="index.php?ctl=citasMias">Listar citas privadas</a>
<a href="index.php?ctl=citasInsertar">Insertar cita</a>
<a href="index.php?ctl=salir">Salir</a>
</div>