<?php  
/* CRUD
Operaciones minimas para gestionar una base de datos.
Estas operaciones son:
* Create -- Crear
* Read -- Leer
* Update -- Actualizar
* Delete -- Eliminar

Explica .htaccess:
******************
RewriteEngine On     -- Habilita las reglas de reescritura permitiendo modificar las url antes de que sean procesadas por el servidor
RewriteCond %{REQUEST_FILENAME} !-f     -- Si la url solicitada no es un archivo del servidor, pasa a la sig regla
RewriteCond %{REQUEST_FILENAME} !-d     -- Si la url solicitada no es un directorio del servidor, se aplica la regla de reescritura
RewriteRule ^(.*)$ index.php [QSA,L]  Redirige todas las solicitudes a index.php, y pasa la URL solicitada como parte de la solicitud.

*/


?>