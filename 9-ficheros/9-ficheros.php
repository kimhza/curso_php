<?php include 'header.php'; ?>

<h2>Ficheros</h2>
<!--
Elemento en binario que no es un nro ni un texto (imagen, video, musica, doc, iso, etc).
Para subir un fichero por medio de un form necesitamos:
    * method="POST"
    * enctype=”multipart/form-data”
    * input type="file"

Se puede importar el codigo desde otro archivo PHP,
lo cual se realiza para dividir las pags dinamicamente
en fragmentos mas pequeños y faciles de gestionar, y asi 
evitar tener un archivo con miles de lineas de codigo (codigo spaguetti)

Dado lo anterior, existen 4 herramientas diferentes:
* include 'archivo.php': Incluye el fichero en cada ocasion. En caso de error, da advertencia pero continua la ejecucion.
* include_once 'archivo.php': Incluye el fichero en 1 sola ocasion. En caso de error, da advertencia pero continua la ejecucion.
* require 'archivo.php': Incluye el fichero en cada ocasion. Genera error fatal y detiene la ejecucion.
* require_once 'archivo.php': Incluye el fichero en 1 sola ocasion. Genera error fatal y detiene la ejecucion. 

**Recomendacion: 
- include_once es util cuando el archivo es opcional y la falta de su inclusión no debe detener la ejecución del script.
- require_once es adecuado cuando el archivo que estás incluyendo es crítico para el funcionamiento de la aplicación. 
Si el archivo no se incluye, el programa no podrá continuar sin él, por lo que es importante detener la ejecución en ese caso.
-->


<!-- Cuando enviemos el form, el archivo se almacenará
en $_FILES -> Array con toda la informacion del fichero.
$_FILES[‘texto_campo_name_input’][‘atributo’]

Ejm:
$_FILES['fichero_usuario']['name'] -> nombre archivo: 'foto.png'
$_FILES['fichero_usuario']['type'] -> MIME (Formato del archivo): 'image/png'
$_FILES['fichero_usuario']['size'] -> tamaño archivo en bytes: 3232424
$_FILES['fichero_usuario']['error'] -> codigo de error. 0 indica OK, 1: superó el tamaño maximo, etc: 0 
$_FILES['fichero_usuario']['tmp_name'] -> nombre temporal archivo: 231
-->

<!--
Posteriormente se tiene que mover el fichero de la carpeta 
temporal a la definitiva usando el metodo move_uploaded_file().
-->
<?php 
//move_uploaded_file(isset($_FILES['fichero_usuario']['tmp_name']), $fichero_subido);
?>


<?php
//======================================================================
// PROCESAR IMAGEN 
//======================================================================

// Comprobamos si nos llega los datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Definir directorio donde se guardará
    $dir_subida = './subidos/';
    // Definir la ruta final del archivo
    $fichero_subido = $dir_subida . basename($_FILES['fichero_usuario']['name']);
    // Mueve el archivo de la carpeta temporal a la ruta definida
    if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)) {
        // Mensaje de confirmación donde todo ha ido bien
        echo '<p>Se subió perfectamente.</p>';
        // Muestra la imagen que acaba de ser subida
        echo '<p><img width="500" src="' . $fichero_subido . '"></p>';
    } else {
        // Mensaje de error: ¿Límite de tamaño? ¿Ataque?
        echo '<p>¡Ups! Algo ha pasado.</p>';
    }
}
?>
<!-- Formulario -->
<form method="post" enctype="multipart/form-data">
    <p>
        <!-- Campo imagen -->
        <input type="file" name="fichero_usuario">
    </p>
    <p>
        <!-- Botón submit -->
        <input type="submit" value="Enviar">
    </p>
</form>

<h3>Multiarchivos</h3>
<!--Se pueden subir varios arcivos bajo el mismo nombre,
solo hay que añadir corchetes desps del name como si fuera un array-->

<!-- Formulario -->
<form method="post" enctype="multipart/form-data">
    <p>
        <input type="file" name="imagen[]">
        <input type="file" name="imagen[]">
        <input type="file" name="imagen[]">
    </p>
    <p>
        <input type="submit" value="Enviar">
    </p>
</form>

<?php 
// Comprobamos si nos llega los datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Iteramos todos los archivos
    foreach ($_FILES["imagen"]["error"] as $posicion => $error) {
        // Comprobamos si se ha subido correctamente
        if ($error == UPLOAD_ERR_OK) {
            // Definir directorio donde se guardará
            $dir_subida = './subidos/';
            // Definir la ruta final del archivo
            $fichero_subido = $dir_subida . basename($_FILES['imagen']['name'][$posicion]);
            // Mueve el archivo de la carpeta temporal a la ruta definida
            if (move_uploaded_file($_FILES['imagen']['tmp_name'][$posicion], $fichero_subido)) {
                // Mensaje de confirmación donde todo ha ido bien
                echo '<p>Se subió perfectamente' . $_FILES['imagen']['name'][$posicion] . '.</p>';
                // Muestra la imagen que acaba de ser subida
                echo '<p><img width="500" src="' . $fichero_subido . '"></p>';
            } else {
                // Mensaje de error: ¿Límite de tamaño? ¿Ataque?
                echo '<p>¡Ups! Algo ha pasado.</p>';
            }
        }
    }
}
?>

<!-- 
Al recibir los datos tendremos que iterar la variable, igual que 
un array. Es recomendable comprobar en cada caso que el archivo se ha subido correctamente.
-->
<?php 
    // Comprobamos si nos llega los datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Iteramos todos los archivos
    foreach ($_FILES["imagen"]["error"] as $posicion => $error) {
        // Comprobamos si se ha subido correctamente
        if ($error == UPLOAD_ERR_OK) {
            // Definir directorio donde se guardará
            $dir_subida = './subidos/';
            // Definir la ruta final del archivo
            $fichero_subido = $dir_subida . basename($_FILES['imagen']['name'][$posicion]);
            // Mueve el archivo de la carpeta temporal a la ruta definida
            if (move_uploaded_file($_FILES['imagen']['tmp_name'][$posicion], $fichero_subido)) {
                // Mensaje de confirmación donde todo ha ido bien
                echo '<p>Se subió perfectamente' . $_FILES['imagen']['name'][$posicion] . '.</p>';
                // Muestra la imagen que acaba de ser subida
                echo '<p><img width="500" src="' . $fichero_subido . '"></p>';
            } else {
                // Mensaje de error: ¿Límite de tamaño? ¿Ataque?
                echo '<p>¡Ups! Algo ha pasado.</p>';
            }
        }
    }
}
?>

<!-- 
Borrar archivo
Para borrar el archivo se usa el metodo unlink, asi:
unlink('archivo');
Ejm: unlink('subidos/coche_rojo.jpg');

Sobre-escribir archivos:
Si guardamos un archivo con el mismo nombre y lo guardamos
en el mismo lugar, este ultimo se reemplazaria.

Un truco para solucionar esto es generando un hash o una
secuencia alfanumerica unica por cada archivo que sustituye 
el nombre. Un algoritmo popular es SHA-1.

Ejm: echo sha1('texto');
-->

<!--Para archivos disponemos de una fx: sha1_file()
echo sha1_file($_FILES['fichero_usuario']['tmp_name']);
-->
<?php  
$fichero_subido = $dir_subida . sha1_file($_FILES['fichero_usuario']['tmp_name']) . basename($_FILES['fichero_usuario']['name']);
echo $fichero_subido; //Los archivos nunca se sobre-escribiran, a menos que a nivel binario sean iguales.
?>

<!--Tamaño maximo:
Para limitar el tamaño de todos los inputs se puede hacer
añadiendo un input especial que tiene name="MAX_FILE_SIZE" 
y el tamaño maximo(bytes) en el value.
<input type="hidden" name="MAX_FILE_SIZE" value="20000" />

* Si un archivo supera el tamaño dara error y no se sube.

Otra forma de cambiar el tamaño maximo de forma permanente 
es modificando las variables de PHP en el archivo de configuracion:
    - upload_max_filesize=100Mb
    - post_max_size=100Mb

Desde la terminal: sudo vim /etc/php/{versión}/cli/php.ini
-->

<!-- Procesamiento de imagenes:
PHP tambien puede procesar imgs (redimensionar, recortar, 
aplicar filtros de color, crear imgs, añadir marcas de agua,
cambiar de formato).

Para crear una minuatura se la libreria nativa Imagick,
instalando la libreria en el sistema:
sudo apt install php-imagick

Ejm redimensionar:
$imagen = new Imagick('imagen.jpg');

// Si se proporciona 0 como parámetro de ancho o alto,
// se mantiene la proporción de aspecto
$imagen->thumbnailImage(100, 0);

// La guarda
file_put_contents('miniatura.jpg', $imagen);

-->

<?php include 'footer.php'; ?>