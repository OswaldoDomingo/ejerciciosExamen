# Boletín de Ejercicios Acceso a Bases de Datos PDO 

- Ejercicio1.- Realiza un script que cargue todos los datos de la tabla empleados y los muestre en pantalla incluyendo una línea separadora entre cada uno de ellos. 
    - Crear archivo conexion.php
    - Crear la consulta en el archivo consulta.php
    - Muestro los usuarios en el archivo mostrarUsuarios.php


- Ejercicio 2.- Crea una tabla localidades con dos campos id_localidad y localidad, añade un campo localidad en la tabla empleados de manera que sea clave ajena referenciando a id_localidad.  Añade varios registros a la tabla
Crea una página con un formulario para dar de alta usuarios donde la localidad será un desplegable con las localidades a elegir (debe mostrar el nombre de la localidad y guardar el id_localidad).
   - Sigo desde el ejercicio1 
   - crearLocalidad.php
   - insertar.php para introducir registros de usuarios, las localidades de los usuarios las he introducido manualmente
   - Creo el formularioEmpleados.php 

- Ejercicio 3.- Procesa los datos del formulario anterior, de manera que si son correctos se dé de alta en la BD el nuevo empleado. Si el alta ha tenido éxito pasaremos a una nueva página de bienvenida.
   - Creo procesaFormulario.php para procesar los datos que se envían desde el formulario, si hay errores los paso por session() a la página de formularioEmpleado.php y si está bien es añadirlo a la base de datos y enviar a fichaEmpleado.php  todos los datos y que se vean en ese archivo.
    - Falta dar de alta en la base de datos

- Ejercicio 4.- Realiza un script que cargue los datos de la tabla empleados utilizando Singleton.
