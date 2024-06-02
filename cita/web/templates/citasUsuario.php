<?php ob_start() ?>
<div class="container text-center p-4">
		<div class="col-md-12" id="cabecera">
			<h1 class="h1Inicio">Página Usuario</h1>
            <h2>Bienvenido <?php $_SESSION['nombreUsuario']; ?></h2>
		</div>
</div>

<?php
$usuario_numero = $_SESSION['idUsuario'];
$usuario_nombre = $_SESSION['nombreUsuario'];
$usuario_acceso = $_SESSION['nivelUsuario'];
$usuario_localidad = $_SESSION['localidadUsuario'];
$usuario_imagen = $_SESSION['imagenUsuario'];

echo "<br>";
echo "Número ";
echo $usuario_numero;
echo "<br>";
echo "Nombre ";
echo $usuario_nombre;
echo "<br>";
echo "Acceso ";
echo $usuario_acceso;
echo "<br>";
echo "Localidad ";
echo $usuario_localidad;
echo "<br>";
echo "Imagen ";
echo "<img src = img/" . $usuario_imagen . "</img>";


?>
