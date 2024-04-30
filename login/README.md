# Ejercicio Login

[Sitio desplegado](https://oswaldo.dev/ejercicios/login/)

En este ejercicio de hace un login para conmtrolar el acceso de usuarios
- Usuario nivel 1 Invitado
    - Usuario sin registrar, por defecto cuando se llega a la página se entra con ese nivel.
- Usuario nivel 2 Usuario 
    - usuario: usuario, password: 1234
- Usuario nivel 3 Administrador
    - usuario: administrador, password: 1234

Si no hay errores al validar el usuario y la contraseña, se da permiso guardado en la base de datos y entra a la página personal.
Según el nivel de usuario accede con diferente nivel pasado por una variable de sesión.
Cuando se vuelve a la página de inicio se borra el nivel con el que se ha entrado.

## Problemas de redirección
Cuando he intentado redirigir a los usuarios que habían puesto bien o mal el Usuario y la Contraseña, no se redirigía.
Se la solucionado poniendo [ob_start()](https://www.php.net/manual/en/function.ob-start.php)
Es una función de PHP que te permite "capturar" toda la salida que se enviaría al navegador y almacenarla temporalmente en un búfer de salida en lugar de enviarla directamente. Entonces, puedes hacer cosas como enviar encabezados HTTP después de haber enviado alguna salida.
Por ejemplo, si necesitas redirigir a los usuarios a otra página después de haber mostrado algo en tu página actual, pero ya has enviado algo al navegador, ob_start() te ayuda a evitar el error "Cannot modify header information - headers already sent".
En resumen, ob_start() te permite posponer el envío de salida al navegador, lo que te da más flexibilidad para realizar acciones adicionales, como enviar encabezados HTTP, más adelante en tu script.

## Falta por hacer
Un css para que se vea mejor pero la función principal que es mas dirigida a backend está acabada