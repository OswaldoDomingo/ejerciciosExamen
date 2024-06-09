<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
</head>
<body>
    <!-- layout.php -->
    <h1>CITAS PARA RECORDAR</h1>
    <?php 
        if(!isset($menu)){
            $manu = 'menu_invitado.php';
        }
        include $menu;

    ?>
    <div class="contenido">
        <?php echo $contenido; ?>
    </div>

    <div class="pie">
        <p>Ten tus citas a mano</p>
    </div>
</body>
</html>