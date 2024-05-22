<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
</head>
        <?php
        if (!isset($_COOKIE["fondo_color"])) {
            setcookie("fondo_color", "silver");
            $color = "white";
        } else 
        $color = $_COOKIE["fondo_color"];
        ?>

    <body style="background-color: <?= $color ?>;">
        <h1>Cookie</h1>
    <?php
        if (isset($_COOKIE["fondo_color"])) {
            setcookie("fondo_color", "silver", time() - 1);
        }
    ?>
    <a href="borrar.php?borrar=si">Eliminar cookie</a>

    <form action="" method="post">
        <label for="color">Color de fondo</label>
        <select name="color" id="color">
            <option value="white">Blanco</option>
            <option value="red">Rojo</option>
            <option value="green">Verde</option>
            <option value="blue">Azul</option>
        </select>
        <input type="submit" value="Cambiar color">
    </form>
    <?php
    if (isset($_POST["color"])) {
        $color = $_POST["color"];
        setcookie("fondo_color", $color);
    }
    ?>
    <form action="" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <input type="submit" value="Enviar" name="enviar">
    </form>
    <?php
    if (isset($_POST["enviar"])) {
        $nombre = $_POST["nombre"];
        setcookie("nombre", $nombre);
    }
    if(isset($_COOKIE["nombre"])) {
            $nombreCook = $_COOKIE['nombre'];
        }else {
            $nombreCook = "";
        }
            ?>
    <h3>Nombre: <?= $nombreCook; ?></h3>
    </body>
</body>

</html>