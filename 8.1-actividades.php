<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!-- Actividad 6-1 -->
    <h3>Calculadora de newsletter</h3>
    <form method="post">
        <div>
            <label for="cantidad_emails">Nro de emails a enviar: </label>
            <input type="number" name="cantidad_emails" id="cantidad_emails">
        </div>
        <div>
            <label for="seguro">Quieres un seguro por cada mensaje?</label>
            <input type="hidden" name="seguro" value="no">
            <input type="radio" name="seguro" id="seguro" value="si"> Si
        </div>
        <input type="submit" value="Calcular">
    </form>

    <?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    function validar_entero(string $cantidad_emails): bool
    {
        return filter_var($cantidad_emails, FILTER_VALIDATE_INT);
    }

    $cantidad_emails = !empty($_REQUEST['cantidad_emails']) ? $_REQUEST['cantidad_emails'] : 0;
    $seguro = !empty($_REQUEST['seguro']) ? $_REQUEST['seguro'] : 'no';
    $precio = 0;
    $seguro_adicional = 0.1;

    if (!validar_entero($cantidad_emails)) {
        $errores[] = 'El campo de cantidad emails debe ser un número.';
    }

    if ($cantidad_emails >= 0 && $cantidad_emails <= 2000):
        $precio = 0;
    elseif ($cantidad_emails > 2000 && $cantidad_emails <= 10000):
        $precio = 0.7;
    else:
        $precio = 0.2;
    endif;

    if ($seguro == 'si') {
        $total = ($cantidad_emails * $precio) + ($cantidad_emails * $seguro_adicional);
    } else {
        $total = $cantidad_emails * $precio;
    }

    if (!empty($cantidad_emails) && !empty($seguro)) {
        echo "<p>El precio total es $$total</p>";
    }
}    
?>

    <h3>Actividad 6.2: Reserva de partamentos</h3>
    <form method="post">
        <div>
            <label for="precio_noche">Precio/noche: </label>
            <input type="number" name="precio_noche" id="precio_noche">
        </div>
        <div>
            <label for="ciudad">Ciudad</label>
            <input type="text" name="ciudad" id="ciudad">
        </div>
        <div>
            <label for="wifi">Wifi:</label>
            <input type="checkbox" name="wifi" value="no"> No
            <input type="checkbox" name="wifi" value="si"> Si
        </div>
        <div>
            <label for="pagina_web">Página web: </label>
            <input type="url" name="pagina_web" id="pagina_web">
        </div>
        <input type="submit" value="Validar">
    </form>

    <?php 

$precio_noche = !empty($_REQUEST['precio_noche']) ? $_REQUEST['precio_noche'] : '';
$ciudad = !empty($_REQUEST['ciudad']) ? $_REQUEST['ciudad'] : '';
$wifi = !empty($_REQUEST['wifi']) ? $_REQUEST['wifi'] : false;
$pagina_web = !empty($_REQUEST['pagina_web']) ? $_REQUEST['pagina_web'] : '';

$apartamentos =[
	[
    	'precio noche' => 250000,
    	'ciudad' => 'Valencia',
		'wifi' => True,
		'pagina web' => 'https://hotel.co'
	],
	[
    	'precio noche' => 107000,
    	'ciudad' => 'Cordoba',
		'wifi' => False,
		'pagina web' => 'https://hotel.co'
	],
    [
    	'precio noche' => 85000,
    	'ciudad' => 'Madrid',
		'wifi' => True,
		'pagina web' => 'https://hotel.co'
	],
    [
    	'precio noche' => 301000,
    	'ciudad' => 'Sevilla',
		'wifi' => False,
		'pagina web' => 'https://hotel.co'
	],
    [
    	'precio noche' => 189000,
    	'ciudad' => 'Barcelona',
		'wifi' => True,
		'pagina web' => 'https://hotel.co'
	],
];

//Añadir elementos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $apartamentos[] = [
        'precio noche' => $precio_noche,
        'ciudad' => $ciudad,
        'wifi' => $wifi,
        'pagina web' => $pagina_web,
    ];
}
?>
    <p>A continuación se presentan los precios por Hotel:</p>
    <table>
        <tr>
            <th>Precio/Noche</th>
            <th>Ciudad</th>
            <th>Wifi</th>
            <th>Pagina Web</th>
        </tr>
        <?php array_walk($apartamentos, function($apto, $posicion) { ?>
        <tr>
            <td> <?php echo '$'. $apto['precio noche']; ?> </td>
            <td> <?php echo $apto['ciudad']; ?> </td>
            <td> <?php echo $apto['wifi'] == true ? "Si" : "No"; ?> </td>
            <td> <?php echo $apto['pagina web']; ?></td>
        </tr>
        <?php }); ?>
    </table>

    <?php
    $media = array_reduce($apartamentos, function($acumulador, $apto) {
        return $apto['precio noche'] + $acumulador;
    }, 0) / count($apartamentos);
    ?>
    <p>Precio medio de los resultados: $<?= $media; ?> </p>

</body>

<?php

?>

</html>