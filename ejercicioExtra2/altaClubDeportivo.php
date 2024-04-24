<!DOCTYPE html>
<html>

<head>
    <title>Formulario de Alta de Usuario</title>
    <style>
        .error {
            color: red
        }
    </style>
</head>

<body>

    <h2>Alta de Usuario - Club Deportivo</h2>

    <form action="procesar_formulario.php" method="post" enctype="multipart/form-data">

        <!-- Campo para el nombre -->
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
        <br>
        <span class="error">
            <?php
            require_once('funciones.php');
            require_once('config.php');
            echo mostrar_errores($errores, 'nombre');
            ?>
        </span>
        <br>
        <!-- Campo para el primer apellido -->
        <label for="apellido1">Primer Apellido:</label>
        <input type="text" id="apellido1" name="apellido1"><br>
        <span class="error">
            <?php
            echo mostrar_errores($errores, 'apellido1');
            ?>
        </span>
        <br>

        <!-- Campo para el segundo apellido -->
        <label for="apellido2">Segundo Apellido:</label>
        <input type="text" id="apellido2" name="apellido2">
        <br>
        <span class="error">
            <?php
            echo mostrar_errores($errores, 'apellido2');
            ?>
        </span>
        <br>
        <!-- Campo para el correo electrónico -->
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email">
        <br>
        <span class="error">
            <?php
            echo mostrar_errores($errores, 'email');
            ?>
        </span>
        <br>
        <!-- Campo para el nombre de usuario -->
        <label for="username">Nombre de Usuario:</label>
        <input type="text" id="username" name="username"><br>
        <span class="error">
            <?php
            echo mostrar_errores($errores, 'username');
            ?>
        </span>
        <br>

        <!-- Campo para la contraseña -->
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password"><br>
        <span class="error">
            <?php
            echo mostrar_errores($errores, 'password');
            ?>
        </span>
        <br>

        <!-- Campo para la fecha de nacimiento -->
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"><br>
        <span class="error">
            <?php
            echo mostrar_errores($errores, 'fecha_nacimiento');
            ?>
        </span>
        <br>

        <!-- Campo para el número de teléfono -->
        <label for="telefono">Número de Teléfono:</label>
        <input type="tel" id="telefono" name="telefono"><br>
        <span class="error">
            <?php
            echo mostrar_errores($errores, 'telefono');
            ?>
        </span>
        <br>

        <!-- Grupo de radio buttons -->
        <!-- <label>Género:</label>
        <input type="radio" id="masculino" name="genero" value="masculino">
        <label for="masculino">Masculino</label>
        <input type="radio" id="femenino" name="genero" value="femenino">
        <label for="femenino">Femenino</label> -->
        <?php
            crear_radio('genero', $valoresGenero, 'Género');
        ?>
        <br>
        <span class="error">
            <?php
            echo mostrar_errores($errores, 'genero');
            ?>
        </span>
        <br>

        <!-- Grupo de checkboxes -->
        <!-- <label>Deportes que practica:</label><br>
        <input type="checkbox" id="futbol" name="deportes[]" value="futbol">
        <label for="futbol">Fútbol</label><br>
        <input type="checkbox" id="baloncesto" name="deportes[]" value="baloncesto">
        <label for="baloncesto">Baloncesto</label><br>
        <input type="checkbox" id="tenis" name="deportes[]" value="tenis">
        <label for="tenis">Tenis</label><br> -->
        <?php
            crear_checkbox('deportes', $valoresDeportes, 'Deportes que practica');
        ?>
        <span class="error">
            <?php
            echo mostrar_errores($errores, 'deportes');
            ?>
        </span>
        <br>

        <!-- Campo para subir un archivo -->
        <label for="foto">Subir foto:</label>
        <input type="file" id="foto" name="foto"><br>
        <span class="error">
            <?php
            echo mostrar_errores($errores, 'foto');
            ?>
        </span>
        <br>

        <!-- Botón de enviar -->
        <input type="submit" name="submit" value="Enviar">
    </form>

</body>

</html>