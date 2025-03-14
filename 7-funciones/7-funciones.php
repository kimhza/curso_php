<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- FUNCIONES:
Herramienta para encapsular y ejecutar un mismo codigo.
Nos ayuda a que los ficheros tengan un menor tamaño y
sean mas faciles de mantener. 
Util para reutilizar codigo.

// Declarar una fx
function nombre_fx(tipo_param $param): tipo_return
{
    ...
    return ...;
}

// Llamar la fx
nombre_fx($parametros);
-->
    <?php

/**
 * Funcion saludar_ahora(): Genera un mensaje de saludo
 * @return {string}
 */
function saludar_ahora(): string //fx clasica con sintaxis moderna
{
    return 'Hola, soy una función';
}

echo saludar_ahora();
?>

    <!-- Parametros:
Son valores que la fx espera recibir. De esta manera puede usar el mismo codigo pero con algunas variaciones.
-->
    <?php 

/**
 * Funcion Resumen: Corta un texto a 10 letras y añade puntos suspensivos al final
 * @param {string} $text - Texto a tratar
 * @return {string}
 */
function resumen(string $text): string
{
    return substr($text, 0, 10) . '...';
}

echo resumen('Cuanto te vi me enamoré y tu sonreíste porque lo sabías');
echo resumen('La vida es una historia contada por un idiota, una historia llena de estruendo y furia, que nada significa');
// Cuanto te ...
// La vida es...
?>

    <!-- Los parametros de entrada pueden tener un valor por defecto -->
    <?php  
    /**
     * Funcion saludar: Saluda a una persona
     * @param {string} - Nombre
     * @return {string}
     */
    function saludar(string $nombre = 'Anónimo'): string
    {
        return 'Hola, persona llamada ' . $nombre .'. Por lo que veo tu nombre mide ' . strlen($nombre) . ' carácteres.';
    }
    
    echo saludar();
    // Hola, persona llamada Anónimo. Por lo que veo tu nombre mide 8 carácteres.
    
    echo saludar('Picasso');
    // Hola, persona llamada Picasso. Por lo que veo tu nombre mide 7 carácteres.
?>

    <!-- Podemos añadir varios parametros -->
    <?php 
    /**
     * Funcion saludar_profesion: Saluda a una persona
     * @param {string} - Nombre
     * @param {string} - Profesión
     * @return {string}
     */
    function saludar_profesion(string $nombre = 'Anónimo', string $profesion = 'ninguna'): string
    {
        return 'Hola, persona llamada ' . $nombre .'. Por lo que veo tu nombre mide ' . strlen($nombre) . ' carácteres. De profesión ' . $profesion . '.';
    }

    echo saludar_profesion();
    // Hola, persona llamada Anónimo. Por lo que veo tu nombre mide 8 carácteres. De profesión ninguna.
    echo saludar_profesion('Espartaco');
    // Hola, persona llamada Espartaco. Por lo que veo tu nombre mide 9 carácteres. De profesión ninguna.
    echo saludar_profesion('Picasso', 'pintor');
    // Hola, persona llamada Picasso. Por lo que veo tu nombre mide 7 carácteres. De profesión pintor.
?>

    <!-- Tipos admitidos:
Estos son los tipos admitidos de acuerdo a la version minima:
* PHP 7.0.0: string, int, float, boot.
* PHP 5.4.0: callable.
* PHP 5.1.0: array.
* PHP 5.0.0: self, nombredeclase/interfaz 

Si no se sumplen los tipos:
* En PHP 5 produce un error y para la ejecucion.
* En PHP 7 se lanza excepcion TypeError pero continua.

** De forma automatica PHP arregla las incompatibilidades de tipo.
-->
    <?php 
function incrementar(int $num): int
{
    return $num + 1;
}

echo incrementar(4.5);
// 5
?>

    <!-- 
Siendo estricto se deberia desactivar esta ayuda.
De esta manera, si encuentra algun problema de tipos 
mostrara un error
-->
    <?php 
    //declare(strict_types=1);

    function sumar_nums(int $num): int
    {
        return $num + 1;
    }

    echo sumar_nums(4.5);
    // PHP Fatal error:  Uncaught TypeError: Argument 1 passed to incrementar() must be of the type int, float given
?>

    <!-- 
Desde PHP 7.1 podemos indicar si un return devuelve un tipo concreto o un null.
Esto se logra con un signo de interrogacion (?) al inicio del return.

function nombre(): ?string //Devuelve string o null
{
}
-->
    <?php
/**
 * Método que indica el tipo de metal que debe tener una medalla a partir del resultado
 * @param {int} $posicion - Posición
 * @return {string|null} - Tipo de metal
 */
function tipoDeMedalla(int $posicion): ?string
{
    switch ($posicion) {
        case 1:
            return 'Oro';
        case 2:
            return 'Plata';
        case 3:
            return 'Bronce';
        default:
            return null;
    }
}

echo tipoDeMedalla(2);
// Plata

echo tipoDeMedalla(34);
// null
?>

    <!-- 
Desde PHP8 se pueden indicar 2 tipos de datos en el return.
Para hacer esto se utiliza pipe (|) en medio de los tipos de datos.

function nombre(): int|string
{
}
-->

    <?php 
/**
 * Método que duplica un número en positivo
 * @param {int} $numero - Número a duplicar
 * @return {float|string} - Resultado o mensaje de ayuda
 */
function duplicarPositivo(float $numero): float|string
{
    if ($numero > 0) {
        return $numero * 2;
    } else {
        return 'No puedes usar número en negativo o cero';
    }
}

echo duplicarPositivo(12.1);
// 24.2

echo duplicarPositivo(-45);
// 'No puedes usar número en negativo o cero'
?>

    <!-- Funciones anonimas
Son fx cerradas y pueden ser declaradas sin ningun nombre.
Las fx anonimas son obligatorias cuando tenemos que pasar
una fx como un parametro de otra.

function () {
    return 'Soy anónima';
}
-->


    <!-- En el ste ejm incrementamos en 1 cada nro del array. -->
    <?php 
$numeros = [10, 20, 30, 40];
$numerosIncrementados = array_map(
    function ($numero) {
    return $numero + 1;
}, $numeros);

var_dump($numerosIncrementados);
?>

    <!-- Usar variables externas con fx anonimas 
se debe poner la keyword use antes de los parametros
-->
    <?php 
$tienda = 'pescadería';

function () use ($tienda) {
    return "Estoy en la $tienda";
}
?>

    <!-- Paradigma Funcional
Las fx esenciales para iterar y gestionar un array son:
* array_walk(iterar un array como un foreach) -> array_walk({array}, {función});
* array_filter(filtrar un arr de acuerdo a una condicion en otro arr mas pequeño) -> array_filter({array}, {función});
* array_map(modificar el contenido de un arr, manteniendo el mismo nro de elementos) -> array_map({función}, {array});
* array_reduce(obtener un rtado a partir de un arr) -> array_reduce({array}, {función}, {inicial});
-->

    <h3>arra_walk</h3>
    <?php

// Diccionario
$apartamentos = [
    [
        'precio/noche' => 40,
        'ciudad' => 'Valencia',
        'wifi' => True,
        'pagina web' => 'https://hotel.com'
    ],
    [
        'precio/noche' => 87,
        'ciudad' => 'Calpe',
        'wifi' => True,
        'pagina web' => 'https://calpe.com'
    ],
    [
        'precio/noche' => 67,
        'ciudad' => 'Valencia',
        'wifi' => False,
        'pagina web' => 'https://denia.com'
    ],
    [
        'precio/noche' => 105,
        'ciudad' => 'Benidorm',
        'wifi' => False,
        'pagina web' => 'https://benidorm.com'
    ]
];

array_walk($apartamentos, function ($apartamento, $posicion) {
    echo $apartamento['ciudad'] . PHP_EOL;
});
?>

    <h3>Array filter</h3>
    <?php 

// Diccionario
$apartamentos = [
    [
        'precio/noche' => 40,
        'ciudad' => 'Valencia',
        'wifi' => True,
        'pagina web' => 'https://hotel.com'
    ],
    [
        'precio/noche' => 87,
        'ciudad' => 'Calpe',
        'wifi' => True,
        'pagina web' => 'https://calpe.com'
    ],
    [
        'precio/noche' => 67,
        'ciudad' => 'Valencia',
        'wifi' => False,
        'pagina web' => 'https://denia.com'
    ],
    [
        'precio/noche' => 105,
        'ciudad' => 'Benidorm',
        'wifi' => False,
        'pagina web' => 'https://benidorm.com'
    ]
];


$todosLosApartamentosValencia = array_filter($apartamentos, function ($apartamento) {
    return $apartamento['ciudad'] === 'Valencia';
});

var_dump($todosLosApartamentosValencia);
?>

    <h3>Array map</h3>

    <?php

// Diccionario
$apartamentos = [
    [
        'precio/noche' => 40,
        'ciudad' => 'Valencia',
        'wifi' => True,
        'pagina web' => 'https://hotel.com'
    ],
    [
        'precio/noche' => 87,
        'ciudad' => 'Calpe',
        'wifi' => True,
        'pagina web' => 'https://calpe.com'
    ],
    [
        'precio/noche' => 67,
        'ciudad' => 'Valencia',
        'wifi' => False,
        'pagina web' => 'https://denia.com'
    ],
    [
        'precio/noche' => 105,
        'ciudad' => 'Benidorm',
        'wifi' => False,
        'pagina web' => 'https://benidorm.com'
    ]
];

$apartamentosMasBaratos = array_map(function ($apartamento) {
    return array_merge($apartamento, ['precio/noche' => $apartamento['precio/noche'] - 1]);
}, $apartamentos);

var_dump($apartamentosMasBaratos);
?>

    <h3>Array reduce</h3>

    <?php

// Diccionario
$apartamentos = [
    [
        'precio/noche' => 40,
        'ciudad' => 'Valencia',
        'wifi' => True,
        'pagina web' => 'https://hotel.com'
    ],
    [
        'precio/noche' => 87,
        'ciudad' => 'Calpe',
        'wifi' => True,
        'pagina web' => 'https://calpe.com'
    ],
    [
        'precio/noche' => 67,
        'ciudad' => 'Valencia',
        'wifi' => False,
        'pagina web' => 'https://denia.com'
    ],
    [
        'precio/noche' => 105,
        'ciudad' => 'Benidorm',
        'wifi' => False,
        'pagina web' => 'https://benidorm.com'
    ]
];

$media = array_reduce($apartamentos, function ($acumulador, $apartamento) {
    return $apartamento['precio/noche'] + $acumulador;
}, 0) / count($apartamentos);

echo $media;
?>

</body>

</html>