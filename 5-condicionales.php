<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php 
    //=========================================================
    //CONDICIONALES:
    //Estructura de control que sirve para ejecutar 
    //instrucciones dependiendo de unas condiciones especificas.
    //La expresion es if(condicion) {}
    //=========================================================
    echo "Inicio \n";
    $i = 8;
    if ($i <= 5) {
        echo $i.' no es menor o igual que 5';
    } elseif ($i == 6) {
        echo $i.' es igual a 6';
    } else {
        echo $i.' es mayor que 6';
    }

    //------------------------------------------------
    //Tipos de condicionales
    //Mayor(>), Menor(<), y(&&), o(||), no(!(cond)), 
    //igual valor(==), igual valor y tipo(===), 
    //no es igual(!=), no es igual valor y tipo(!==),
    //mayor o igual que(>=), menor o igual(<=),
    //menor(-1),igual(0),mayor(1):(<=>), if(true), if(false)
    //------------------------------------------------
    if (10 > 2 && True && 'HBO' != 'Netflix') {
        echo 'Holaaa!!';
    }

    /* Sintaxis alternativa de condicionales:
    
    <?php if (condición): ?>
    // Código que sea cierto
    <?php elseif (condición): ?>
    // Código que se ejecutará si no es cierto.
    <?php else: ?>
    // Código que se ejecutará si no es cierto.
    <?php endif; ?>
    */
    if ('Michael Jackson' == 'Moonwalker'):
    echo 'Gran baile';
    elseif ('Michael Jackson' == 'Billie Jean'):
    echo 'Gran canción';
    else:
    echo 'Rey del Pop';
    endif;

    /* Operador Ternario
    (condicional) ? 'Valor si se cumple' : 'Valor si no se cumple';
    */
    echo (4 == 3) ? '4 es igual a 3' : '4 es diferente de 3';

    //-----------------------------------------------------------
    //SWITCH:
    //Tiene la misma funcionalidad del if, sin embargo, solo admite
    //condicional de igualacion
    //-----------------------------------------------------------

    /* El formato del switch es:
    switch() {
    case 0:
    ...
    break;
    default:
    ...
    break;
    }*/
    $num = 2;

    switch ($num) {
    case 0:
    echo "num es igual a 0";
    break;
    case 1:
    echo "num es igual a 1";
    break;
    case 2:
    echo "num es igual a 2";
    break;
    default:
    echo "No se a que es igual";
    break;
    }

    //---------------------------------------------
    // Funciones con STRINGS:
    //str_contains('texto', 'palabra ó subtxt') -> Contiene este texto, este subtexto
    //str_starts_with('texto', 'palabra ó subtxt') -> Empieza el texto con este subtexto
    //str_end_with('texto', 'palabra ó subtxt') -> Termina el texto con este subtexto
    //---------------------------------------------
    if (str_contains('Este es un texto de prueba', 'un')) {
    echo "Si contiene el texto";
    } else {
    echo "No contiene el texto";
    }

    if (str_starts_with('Este es un texto de prueba', 'de')) {
    echo "Si empieza por la palabra";
    } else {
    echo "No empieza por la palabra";
    }

    if (str_ends_with('Este es un texto de prueba', 'prueba')) {
    echo "Si termina por la palabra";
    } else {
    echo "No termina por la palabra";
    }

    ?>
</body>

</html>