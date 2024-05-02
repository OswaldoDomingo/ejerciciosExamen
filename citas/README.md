# PROYECTO CITAS

1. **Diseño de la Base de Datos:**
   - Crear las tablas: `usuarios`, `niveles`, `vision_citas`, y `citas`.
    - [sql](sql)
   - Definir las relaciones entre las tablas utilizando las claves primarias y foráneas correctamente.

2. **Implementación del Login:**
   - Diseñar y desarrollar el formulario de inicio de sesión (`login.php`) donde los usuarios puedan ingresar su correo electrónico y contraseña.
   - Valida las credenciales ingresadas comparándolas con los registros de la tabla `usuarios`.
   - Utilizar sesiones para mantener la sesión del usuario activa mientras navega por el sitio.

3. **Formulario para Introducir Citas:**
   - Crea un formulario (`add_cita.php`) donde los usuarios puedan ingresar nuevas citas.
   - Este formulario debería permitir al usuario seleccionar el tipo de visión de la cita (pública o privada) y escribir el contenido de la cita.
   - Al enviar el formulario, guarda la cita en la tabla `citas` de la base de datos.

4. **Visualización de Citas:**
   - Crea una página (`mis_citas.php`) donde los usuarios puedan ver todas sus citas, tanto públicas como privadas.
   - Implementa la lógica para mostrar las citas correspondientes dependiendo del usuario que ha iniciado sesión.
   - Si el usuario no está autenticado, muestra solo las citas públicas.

5. **Página para Visitantes no Logueados:**
   - Diseñar una página principal (`index.php`) donde los visitantes no autenticados puedan ver las citas públicas.
   - Esta página debería mostrar las citas públicas almacenadas en la base de datos.

6. **Seguridad:**
   - Implementar medidas de seguridad, como el hash de contraseñas antes de almacenarlas en la base de datos, para proteger la información de los usuarios.
   - Utiliza consultas preparadas o PDO para evitar inyecciones SQL.

7. **Estilo y Diseño:**
   - Aplica estilos CSS para hacer que se vea atractiva y fácil de usar.
   - Utilizar un diseño receptivo para que la aplicación sea accesible desde dispositivos móviles.

## Añadir
8. **Imagen de usuario:**
   - Crear un campo para añadir la imagen del usuario.
   - Crear un input file para subir archivo imagen de usuario
   