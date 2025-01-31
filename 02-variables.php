<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //============================================
    // VARIABLES
    //============================================
    
    /*Declarar una variable
    En este ejemplo el valor de la derecha (10) es almacenado
    en un espacio en memoria con el nombre de la izquierda ($edad)*/
    $edad = 10;

    //Tipos de datos
    $nombre = "Cane"; //String
    $edad = 80; //Integer
    $peso = 41.2; //Float
    $soltero = True; //Boolean

    //imprimir los valores con echo
    echo $nombre . " tiene " . $edad . " años.";

    //Ambito de variables: Local
    /* Las variables tienen un alcance (scope) local, por lo que no 
    se pueden usar en otro script.
    *** Para acceder a ellas desde otro archivo, se debe usar
    la palabra reservada: global.*/
    $ubicacion = "Bogotá";
    global $ubicacion;

    //--------------------------------------------
    // Constantes
    //--------------------------------------------
    
    //Valores que son inmutables, no cambian.
    // Opc 1: Crearla con define()
    define("PI", 3.14159);
    echo PI;

    //Otra forma de definir constantes es usando la palabra const
    const GRAVEDAD = 9.8;

    //Para concatenar constantes, es mejor usar punto
    echo "El valor de gravedad es: ".GRAVEDAD. " y PI: ". PI;

    //Concatenacion
    /* No es lo mismo usar comillas dobles ("") que simples('').
     * Dentro de las comillas dobles podemos llamar variables */
    $desayuno = "granola";
    echo "Me encanta desayunar $desayuno";
    // En cambio si la frase anterior la encierro en comillas simples, imprime todo como texto (incluso la variable)
    echo 'Quiero un $desayuno';
    /* Regla general PHP: Usar siempre comillas simples, 
    salvo que quiera concatenar variables */

    //============================================
    // OPERACIONES ARITMETICAS
    //============================================

    //Se usan los mismos operadores matematicos
    $a = 12;
    $b = 4;

    //operaciones disponibles: +, -, /, *, %, **
    $resultado = $a + $b; //suma
    $resultado = $a - $b; //resta
    $resultado = $a / $b; //division
    $resultado = $a * $b; //producto
    $resultado = $a % $b; //modulo
    $resultado = $a ** $b; //potenciacion
    echo $resultado;

    //En operaciones complejas se recomienda usar parentesis
    $resultado = ($a % $b) * 4 + (4 * 5);

    //Tipado dinamico o debil, PHP al realizar operaciones ignora el tipo string y permite hacer el calculo
    $c = '3';
    $d = 56;
    $total = $c + $d;
    echo $total;
    
    ?>
</body>

</html>