<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php 
    //=======================================
    //ARRAYS:
    //Mapa ordenado donde los datos tienen una clave y varios valores.
    //=======================================

    $semana = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];
    //Para acceder a los valores basta con llamar a la variable[indice]
    echo $semana[0]; //Lunes

    //Si quiero ver todo el contenido del array, uso var_dump
    //var_dump me dice longitud del arr, posicion, tipo de dato, long y valor de cada elemento
    //array(7 elem) {[0]->string(long 5) "Lunes", ...}
    var_dump($semana);

    //Los arrays pueden contener cualquier tipo de dato
    $usuario = ['Maria', 23, True, 3.4];
    var_dump($usuario); 
    
    //-------------------------------------------------
    //Crear un array:
    //-------------------------------------------------
    
    //Opc 1: A una variable le asignamos corchetes vacios
    $nombres = [];

    //Opc 2: Usando la fx array()
    $apellidos = array();

    //-------------------------------------------------
    //Añadir elementos en array
    //-------------------------------------------------
    
    //Opc. 1: Se pueden añadir elementos 
    $nombres[] = 'Jhon';
    var_dump($nombres);

    //Opc. 2: Se puede crear un nuevo array mediante programacion funcional
    $nuevos_nombres = array_merge($nombres, ['Alex']);
    var_dump($nuevos_nombres);

    //Para conocer la longitud del array se puede usar la fx count o var_dump
    echo count($nuevos_nombres); //2

    //-------------------------------------------------
    //Modificar un array
    //-------------------------------------------------
    
    //Se llama el array y la posicion que quiero cambiar
    $semana[2] = 'Sabado';

    //-------------------------------------------------
    //Eliminar un elemento de un array
    //-------------------------------------------------
    unset($nuevos_nombres);

    $nuevos_nombres[] = "Jhonny";
    var_dump($nuevos_nombres);

    unset($semana[3]);
    var_dump($semana); //Elimina toda la posicion 3 y comienza desde la posicion 0,1,2,4,5,6 :S
    
    //Para ordenar los indices tendria que crear un arr y agregarle los elem
    $nueva_semana = [];
    $nuevas_posiciones = [];
    foreach($semana as $posicion => $dia) {
        $nueva_semana[] = $dia;
        echo $posicion; //0 1 2 4 5 6
    }
    var_dump($nueva_semana);

    //-------------------------------------------------
    //Strings: Conjuntos de caracteres, que pueden ser manipulados como arrays
    //-------------------------------------------------
    $palabra = 'familia';
    $palabra[3] = 'A';
    echo $palabra;

    //Convertir un string en un array
    $frase = 'Erase una vez un pueblito';
    $arr_frase = preg_split('/[\s,]+/', $frase);
    var_dump($arr_frase);

    //-------------------------------------------------
    //Diccionario: Estructura de datos que permite almacenar pares de clave-valor
    //-------------------------------------------------
    $empleados = [
        'Jhonny' => 56,
        'Camilo' => 34,
        'Andres' => 78
    ];

    //Para leer un valor, accedemos por la clave
    echo 'La edad de Camilo es '.$empleados['Camilo'].' años';
    
    //Para añadir un nuevo par hay que llamar la clave y asignar el valor
    $empleados['Frank'] = 45;
    var_dump($empleados);

    //Para modificar se debe llamar la clave
    $empleados['Andres'] = 33;
    var_dump($empleados);

    //Para borrar un elemento se usa unset
    unset($empleados['Camilo']);
    var_dump($empleados);

    //-------------------------------------------------
    //Array 3D: Cuando un arr tiene dentro otro arr
    //-------------------------------------------------
    $zara = [
        123 => [
          'nombre' => 'Camisa a cuadros',
          'precio' => 29.95,
          'sexo' => 'Hombre'
        ],
        234 => [
          'nombre' => 'Falda manga',
          'precio' => 19.95,
          'sexo' => 'Mujer'
        ],
        345 => [
          'nombre' => 'Bolso minúsculo',
          'precio' => 50,
          'sexo' => 'Mujer'
        ]
    ];
    var_dump($zara);

    echo $zara[234]['nombre'];
    ?>
</body>

</html>