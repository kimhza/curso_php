<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Actividad 5.1 -->
    <h3>Formulario contacto</h3>
    <form method="GET">
        <div>
            <label for="">Nombre</label>
            <input name="nombre" type="text" required>
        </div>
        <div>
            <label for="">Telefono</label>
            <input name="telefono" type="text" required>
        </div>
        <div>
            <label for="">Email</label>
            <input name="email" type="email" required>
        </div>
        <div>
            <label for="">Mensaje</label>
            <input name="mensaje" type="text" required>
        </div>
        <input type="submit" value="Enviar">
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_REQUEST['nombre'], $_REQUEST['telefono'], $_REQUEST['email'], $_REQUEST['mensaje'])): 
        $nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : '';
        $telefono = isset($_REQUEST['telefono']) ? $_REQUEST['telefono'] : '';
        $email = isset($_REQUEST['email']) ? $_REQUEST['email']: '';
        $mensaje = isset($_REQUEST['mensaje']) ? $_REQUEST['mensaje'] : '';?>

    <p>Hola <?= $nombre ?>!</p>
    <p>Te voy a enviar spam a <?= $email ?> y te llamaré por la madrugada a <?= $telefono ?>.</p>
    <p>Mensaje enviado en el formulario: '<?= $mensaje ?>'</p>
    <p>Chauu!! </p>
    <?php endif; ?>

    <!-- 
    En el ejm anterior, la info del formulario se envia como parametro en la url, asi
    http://localhost:8000/6.1-actividades.php?nombre=nino&telefono=232424&email=wqw%40gmail.com&mensaje=hellooooo
    -->

    <!-- Actividad 5.2 -->
    <h3>Formulario Nombres Aleatorios</h3>
    <form method="post" style="display: flex; justify-content:start; align-items:center;">
        <label for="lista_nombres">Escribe nombres separados por coma</label>
        <textarea id="lista_nombres" name="lista_nombres" rows="2" cols="50"></textarea>
        <input type="submit" value="Enviar">
    </form>

    <?php
    $lista_nombres = isset($_REQUEST['lista_nombres']) ? $_REQUEST['lista_nombres'] : '';
    $arr_nombres = explode(",", $lista_nombres);
    shuffle($arr_nombres);

    if (isset($_REQUEST['lista_nombres'])) {
        echo "<b>$arr_nombres[0]</b> saca perro.";
    }
    ?>

    <!-- Actividad 5.3 -->
    <h3>Actividad: Buscar palabra en texto</h3>
    <?php 
    $texto = "Esta cosa se devora a todas las cosas; Pájaros, bestias, árboles, flores; Carcome el hierro, muerde el acero; Muele duras piedras y las reduce a harina; Mata al rey, arruina la ciudad, Y derriba a la montaña.";
    echo "<b>Texto</b>: $texto";
    ?>
    <h3>Bsuca una palabra en el texto:</h3>
    <form method="post">
        <label for="palabra"></label>
        <input type="text" name="palabra" id="palabra">
        <input type="submit" value="Buscar">
    </form>
    <?php 
    $palabra = isset($_REQUEST['palabra']) ? $_REQUEST['palabra'] : '';
    if (isset($_REQUEST['palabra'])) {
    if (str_starts_with($texto, $palabra)) {
        echo "La palabra <b>$palabra</b> si esta en el texto";
    } else {
        echo "La palabra <b>$palabra</b> no esta en el texto";
    } }
    ?>

    <!-- Actividad 5.4 -->
    <h3>Calculadora de IVA</h3>
    <form method="post">
        <label for="iva">Indica el valor total</label>
        <input type="number" name="valor" <?php if (isset($_REQUEST['valor']) && $_REQUEST['valor'] != ''): ?>
            value="<?= $_REQUEST['valor'] ?>" <?php endif; ?>>
        <input type="submit" value="Calcular">
    </form>
    <?php 
    $iva = 0.19;
    $valor = isset($_REQUEST['valor']) ? $_REQUEST['valor'] : 0;
    $total = $iva * $valor;
    ?>

    <?php if(isset($_REQUEST['valor'])): ?>
    <p>El iva del 19% de $<?= $valor ?> es $<?= $total ?></p>
    <?php endif; ?>

    <!-- Actividad 5.5: listado de peliculas -->
    <h3>Listado de peliculas</h3>
    <form method="post">
        <label for="pelicula">Escribe el nombre de una pelicula:</label>
        <input type="text" name="pelicula" id="pelicula">
        <input type="submit" value="Enviar">
    </form>

    <?php
    $pelicula = isset($_REQUEST['pelicula']) ? $_REQUEST['pelicula'] : '';
    $arr_peliculas = [];
    if (isset($_REQUEST['pelicula']) && $_REQUEST['pelicula'] != '') {
        $arr_peliculas = explode(" ", $pelicula);
    }
    ?>

    <p>Array de peliculas:
        <?php var_dump($arr_peliculas); ?>
    </p>

    <table>
        <tr>
            <th>Indice</th>
            <th>Pelicula</th>
        </tr>
        <?php foreach ($arr_peliculas as $idx => $elem):?>
        <tr>
            <td><?= $idx ?></td>
            <td><?= $elem ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- Actividad 5.6 -->
    <h3>Actividad: Notas de los alumnos</h3>

    <form method="post">
        <div>
            <label for="alumno">Nombre Alumno</label>
            <input type="text" name="alumno" id="alumno">
        </div>
        <div>
            <label for="nota">Nota</label>
            <input type="number" name="nota" id="nota">
        </div>
        <input type="submit" value="Agregar">
    </form>

    <?php 
    $dict_alumnos = [
        "Marta" => 7.5,
        "Luis" => 5,
        "Lorena" => 6.9
    ];

    $alumno = isset($_REQUEST['alumno']) ? $_REQUEST['alumno'] : ''; 
    $nota = isset($_REQUEST['nota']) ? $_REQUEST['nota'] : 0; 
    $dict_alumnos[$alumno] = $nota;

    $suma_notas = array_sum($dict_alumnos);
    $cantidad_alumnos = count($dict_alumnos);
    $media_notas = $suma_notas / $cantidad_alumnos;
    ?>

    <table>
        <tr>
            <th>Alumno</th>
            <th>Nota</th>
        </tr>
        <?php foreach($dict_alumnos as $clave => $valor): ?>
        <tr>
            <td><?= $clave ?></td>
            <td><?= $valor ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <p>La media de las notas es: <?= $media_notas ?> </p>

    <!-- Actividad 5.7 -->
    <h3>Actividad: Montaña Rusa</h3>
    <form method="post">
        <div>
            <label for="nombre_part">Escriba su nombre:</label>
            <input type="text" name="nombre_part" id="nombre_part" required>
        </div>
        <div>
            <label for="altura_juego">Escriba su altura en cm:</label>
            <input type="number" name="altura_juego" id="edad_juego" required>
        </div>
        <div>
            <label for="edad_juego">Escriba su edad:</label>
            <input type="number" name="edad_juego" id="edad_juego" required>
        </div>
        <div>
            <label for="">¿Esta de acuerdo con el uso de la atracción?</label>
            <input type="radio" name="aceptar" value="si"> Si
            <!-- <input type="hidden" name="aceptar" value="no"> -->
        </div>
        <input type="submit" value="Validar">
    </form>

    <?php 
    $nombre_part = isset($_REQUEST['nombre_part']) ? $_REQUEST['nombre_part'] : '';
    $altura = isset($_REQUEST['altura_juego']) ? $_REQUEST['altura_juego'] : '';
    $edad = isset($_REQUEST['edad_juego']) ? $_REQUEST['edad_juego'] : '';
    $aceptar = isset($_REQUEST['aceptar']) ? $_REQUEST['aceptar'] : '';
    $ticket = str_pad(rand(0, 99999), 5, "0", STR_PAD_LEFT);

    if (!empty($_REQUEST['altura_juego']) && !empty($_REQUEST['edad_juego']) && !empty($_REQUEST['aceptar'])) {
        if ($altura > 120 && $edad > 16 && strtolower($aceptar) == 'si') {
            echo "<p>$nombre_part puedes ingresar a la montaña rusa, tu nro de ticket es $ticket</p>";
        } else {
            echo "<p>$nombre_part no puedes ingresar a la montaña rusa</p>";
        }
    }
    ?>

    <!-- Actividad 5.8: Formulario de Padres -->
    <h3>Actividad: Formulario de Padres</h3>
    <form method="post">
        <div>
            <label for="nombre_padre">Nombre Padre / Madre: </label>
            <input type="text" name="nombre_padre" id="">
        </div>
        <div>
            <label for="sexo">Sexo: </label>
            <select name="sexo">
                <option value="F">Femenino</option>
                <option value="M">Masculino</option>
            </select>
        </div>
        <div>
            <label for="hijos">Nro de hijos: </label>
            <input type="number" name="hijos" id="">
        </div>
        <input type="submit" value="Validar">
    </form>

    <?php
    $nombre_padre = isset($_REQUEST['nombre_padre']) ? $_REQUEST['nombre_padre'] : ''; 
    $sexo = isset($_REQUEST['sexo']) ? $_REQUEST['sexo'] : '';
    $hijos = isset($_REQUEST['hijos']) ? $_REQUEST['hijos'] : '';

    if (!empty($_REQUEST['nombre_padre']) && !empty($_REQUEST['sexo'])) {
        if ($sexo == 'F') {
            $inicio = 'La señora';
        } else {
            $inicio = 'El señor';
        }

        if ($hijos == 0) {
            $mensaje = "$inicio $nombre_padre no tiene hijos.";
        } else {
            if ($hijos == 1) {
                $final = 'hijo';
            } else {
                $final = 'hijos';
            }
            $mensaje = "$inicio $nombre_padre tiene $hijos $final.";
        } 
        echo "<p>$mensaje</p>";
    }
    ?>

</body>

</html>