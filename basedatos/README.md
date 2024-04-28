# Boletín de Ejercicios Acceso a Bases de Datos PDO 

- Ejercicio1.- Realiza un script que cargue todos los datos de la tabla empleados y los muestre en pantalla incluyendo una línea separadora entre cada uno de ellos. 
    - Crear archivo [conexion.php](conexion.php)
    - Crear la consulta en el archivo [consulta.php](consulta.php)
    - Muestro los usuarios en el archivo [mostrarUsuarios.php](mostrarUsuarios.php) 
    - He creado una tabla.


- Ejercicio 2.- Crea una tabla localidades con dos campos id_localidad y localidad, añade un campo localidad en la tabla empleados de manera que sea clave ajena referenciando a id_localidad.  Añade varios registros a la tabla
Crea una página con un formulario para dar de alta usuarios donde la localidad será un desplegable con las localidades a elegir (debe mostrar el nombre de la localidad y guardar el id_localidad).
   - Sigo desde el ejercicio1 
   - Creo la tabla de localidades y la inserto también en la tabla usuarios [crearLocalidad.php](crearLocalidad.php)
   - [insertar.php](insertar.php) para introducir registros de usuarios, las localidades de los usuarios las he introducido manualmente
   - Creo el [formularioEmpleados.php](formularioEmpleado.php)
        - He creado en [funcionesBD.php](funcionesBD.php) una función **consultaSelect(\$conexion)** con la cual hago la consulta a la base de datos y me devuelve el array de la consulta. Como valor de entrada he puesto la conexion de <a href='conexion.php'> conexion.php</a>
        Este array lo pongo en la función **pintaSelect (array \$valores, string \$name)** de [bComponentes.php](libs/bComponentes.php)
        De esta manera creo el select **pintaSelect(consultaSelect($conexion), 'localidades');** 

- Ejercicio 3.- Procesa los datos del formulario anterior, de manera que si son correctos se dé de alta en la BD el nuevo empleado. Si el alta ha tenido éxito pasaremos a una nueva página de bienvenida.
   - Creo <a href="procesaFormulario.php">procesaFormulario.php</a> para procesar los datos que se envían desde el formulario, si hay errores los paso por session() $_SESSION['errores] a la página de [formularioEmpleado.php](formularioEmpleado.php) que la recoge y la muewstra cin un **foreach()**. 
   Si está bien es añadirlo a la base de datos y envia a [fichaEmpleado.php](fichaEmpleado.php)  todos los datos y que se vean en ese archivo.
    - 28/04/2024 Creada la consulta cuando recoge los datos para insertarlos
    - 28/04/2024 Si se insertan los datos y no hay errores se pasa a la página [fichaEmpleado.php](fichaEmpleado.php) 
        - Si hay errores, se crea un error en el array y se pone en la variable de sesión de los errores.

- Ejercicio 4.- Realiza un script que cargue los datos de la tabla empleados utilizando Singleton.
