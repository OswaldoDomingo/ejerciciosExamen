<!DOCTYPE html>
<?php if (! empty($errores)) {
    foreach ($errores as $error)
        echo $error . "<br>";
}
?>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

</head>

<body>

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



</body>

</html>