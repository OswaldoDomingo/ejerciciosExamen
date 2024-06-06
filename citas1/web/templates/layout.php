<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
</head>
<body>
    <?php
        if(isset($menu)){
            $menu = "menu_invitado.php";
        }
        include $menu;
    ?>

    <div class="container">
        <?php echo $content; ?>
    </div>
</body>
</html>