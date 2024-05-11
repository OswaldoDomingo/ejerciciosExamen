<h1>Login</h1>
<?php
foreach($errores as $i =>$valor){
        echo $valor.'<br>';
    }

?>
<form action="" method="post">
    Usuario
    <input type="text" placeholder="Usuario" name="user">
    <br>
    <br>
    Contraseña
    <input type="password" placeholder="pass" name="pass">
    <br>
    <br>
    <input type="submit" name="enviar" value="Acceder" >


    <br>
    <br>
    <a href="insert_Ejercicio_2.php">Si no tienes una cuenta, puedes registrate aquí</a>
</form>