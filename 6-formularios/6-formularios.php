<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Contenido del array $_REQUEST:</h3>
    <!-- $_REQUEST: array que contiene todas las variables que recibimos -->
    <!-- Para obtener una varaible get también dispones de $_GET['nombre'] 
    y para post $_POST['nombre'], pero $_REQUEST['nombre'] simplifica 
    al unificar cualquier elemento que recibamos.
    -->
    <?php var_dump($_REQUEST); ?>

    <h3>Formulario de ejm</h3>
    <!-- Formularios
    Son elementos que permiten que el usuario nos transmita
    informacion (textos, numeros, archivos, checks).

    La estructura se compone de la etiqueta form y dentro 
    los input
    -->
    <!-- Funcion isset() indica si existe cualquier tipo de variable: local, global 
     dentro de un array -->
    <?php if (isset($_REQUEST['nombre'])): ?>
    <p>¿De verdad te llamas <b><?php echo $_REQUEST['nombre']; ?></b>?</p>
    <?php endif; ?>
    <form>
        <!--Nos permite saber que variables llegan de un formulario-->
        <input type="text" name="nombre">
        <input type="submit">
    </form>

    <!-- Metodos de peticion HTTP
    Metodos que indican la accion a realizar con un recurso determinado.
    * GET: Solicitar datos al servidor, pero los datos se envian como parametros en la url. $_GET['parametro']
    * POST: Enviar datos al servidor para procesar info o actualizar recursos. Los datos se envian en el body de la solicitud, util para info sensible. $_POST['parametro']  
    * PUT: Enviar datos al servidor para actualizar un recurso.
    * DELETE: Solicitar la eliminacion de un recurso en el servidor.
    * HEAD: Similar a GET pero solo solicita los encabezados de respuesta. Util para info de metadatos (Tamaño del archivo, tipo de contenido o si esta disponible). Se puede manejar con $_SERVER['REQUEST_METHOD']
    Otros metodos: CONNECT, OPTIONS, TRACE, PATCH: Se pueden manejar con $_SERVER['REQUEST_METHOD']
    -->

    <!-- Metodo GET 
    Nos permite ver los parametros concatenados al final de la url.
    Ejm: http://localhost/?nombre=Can&edad=10
    -->
    <h3>Formulario metodo get</h3>
    <form method="get">
        <input type="text" name="nombre">
        <input type="number" name="edad">
        <input type="submit">
    </form>

    <!-- Para capturar los datos en variables se usa isset() con $_REQUEST. -->
    <?php 
    $nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : '';
    $edad = isset($_REQUEST['edad']) ? $_REQUEST['edad'] : '';
    ?>

    <!-- Metodo POST
        Este metodo sera invisible al ojo del usuario. Es recomendable
        cuando modificamos variables o una DB.
    -->
    <h3>Formulario Metodo post</h3>
    <form method="post">
        <input type="text" name="apellido">
        <input type="number" name="celular">
        <input type="submit">
    </form>
    <?php 
    $apellido = isset($_REQUEST['apellido']) ? $_REQUEST['apellido'] : '';
    $celular = isset($_REQUEST['celular']) ? $_REQUEST['celular'] : '';
    ?>

    <h3>Atributo action</h3>
    <!-- Action: 
    Es un atributo que especifica el destino de los datos que se envian en el form
    -->
    <form method="post" action="login.php">
        <input type="text" name="nombre">
        <input type="number" name="edad">
        <input type="submit">
    </form>

    <!-- Cada que se pulsa en el submit, se realiza una peticion
    y a pagina se refresca, luego el formulario limpia los campos.
    Tip: Comprobar si existe el dato y de ser asi, rellenar su value.-->
    <form>
        <input type="text" placeholder="Nombre" name="nombre" <?php 
                if (isset($_REQUEST['nombre']) && $_REQUEST['nombre'] != ''): ?>
            value="<?php echo $_REQUEST['nombre']; ?>" <?php endif; ?>>
        <input type="number" placeholder="Edad" name="edad"
            <?php if (isset($_REQUEST['edad']) && $_REQUEST['edad'] != ''): ?> value="<?php echo $_REQUEST['edad']; ?>"
            <?php endif; ?>>
        <input type="submit">
    </form>

    <!-- CAMPOS OCULTOS 
    Campos en el form que no queremos que sean visibles para el usuario.
    Ejm: token, id, historico, etc.
    Esto se logra con los input tipo hidden
    -->
    <h3>Input tipo hidden</h3>
    <form method="post">
        <input type="hidden" name="campo_oculto" value="123">
        <input type="submit" value="Enviar">
    </form>

    <?php $codigoSecreto = isset($_REQUEST['campo_oculto']) ? $_REQUEST['campo_oculto'] : '';
    echo $codigoSecreto; ?>

    <!-- Los campos ocultos pueden ser utilizados para enviar arrays
     Se necesita repetir el name y que contenga el nombre del array con corchetes, ejm: filtros[]
    -->
    <h3>Array desde input</h3>
    <form>
        <input type="hidden" name="filtros[]" value="precio">
        <input type="hidden" name="filtros[]" value="valoracion">
        <input type="hidden" name="filtros[]" value="fecha">

        <input type="submit">
        <?php
        $misFiltros = isset($_REQUEST['filtros']) ? $_REQUEST['filtros'] : [];
        var_dump($misFiltros); 
        ?>
    </form>

    <h3>Serialize</h3>
    <?php
    echo serialize(['manana', 'tarde', 'noche', 'felicidad']);
    ?>
    <h3>Unserialize</h3>
    <?php 
    var_dump(unserialize('a:3:{i:0;s:7:"mañana";i:1;s:5:"tarde";i:2;s:5:"noche";}')); 
    ?>

    <!-- Json  (JavaScript Object Notation) 
     Es una estructura de datos organizados mediante pares clave-valor.
     * json_encode: convierte un objeto php en una cadena json
     * json_decode: convierte una cadena codificada json en el tipo de datos php adecuados.
    -->
    <h3>json encode</h3>
    <?php echo json_encode(['id' => 234, 'nombre' => 'Sauron']); ?>

    <h3>json decode</h3>
    <?php var_dump(json_decode('{"id":234,"nombre":"Sauron"}')); ?>

    <form>
        <input type="hidden" name="filtros" value='<?= json_encode($filtros); ?>'>
        <input type="submit">
    </form>

    <?php
    $filtroEnJSON = isset($_REQUEST['filtros']) ? $_REQUEST['filtros'] : '';
    //$filtro = json_decode($filtroEnJSON);
    //var_dump($filtro);
    ?>
</body>

</html>