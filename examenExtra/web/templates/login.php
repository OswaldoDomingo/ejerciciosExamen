<?php 
ob_start();
if (!empty($errores)) {
    foreach ($errores as $error)
        echo $error . "<br>";
}
?>
<h1>Login</h1>
	<div>
		<form method="POST" action="" enctype="multipart/form-data">

			<label for="usuario">Usuario</label> <input name="usuario"
				type="text" placeholder="usuario"> <br> 
				<label for="pass">contraseña</label>
			<input name="pass" type="password" placeholder="contraseña"> <br> 
			<input
				type="submit" name="login" value="Login"> <br>
		</form>
	</div>

	<?php
	$contenido = ob_get_clean();
	include 'layout.php';
	?>