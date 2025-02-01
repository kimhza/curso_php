<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php 
    //===================================================
    //ACTIVIDADES
    //===================================================

    //Actividad 1:
    $amigos = ['Jhon', 'Felipe', 'Diego', 'Alex'];
    echo "$amigos[0] se va de viaje";

    $ciudades = ['Bogotá', 'Cali', 'Barranquilla'];
    echo "$amigos[1] se va de viaje a $ciudades[0]";

    //Ejercicio adicional: Imprimir aleatoria/ un amigo y una ciudad
    //Shuffle->cambia el orden aleatoriamente de los elem del array
    shuffle($ciudades);
    shuffle($amigos); 

    echo "$amigos[1] se va a $ciudades[1]";
    ?>
    <ul>
        <?php
            //Actividad 2
            $agenda = ["Desayuno a las 8am", "Almuerzo a las 12m"];
            var_dump($agenda);

            $agenda[0] = 'Desayuno a las 9am';
            var_dump($agenda);

            //Borrar cita en posicion 0
            //unset($agenda[0]);
            //var_dump($agenda);

            foreach($agenda as $posicion => $elem) {
                echo "<li>$elem</li>";
            }
        ?>
    </ul>
    <?php 

    //Concurso de microrelatos
    $letra_cancion = 'Quiéreme mientras se pueda que la vida es una rueda que da mil vueltas';
    $arr_letra = preg_split('/[\s,]+/', $letra_cancion);
    echo "La letra tiene ".count($arr_letra)." palabras";
    
    //Actividad: Censo de poblacion
    $salario = [
        'Sofia' => 56787,
        'Carlos' => 23656,
        'Tomas' => 78456,
        'Federico' => 12345,
        'Susana' => 98765
    ];
    var_dump($salario);

    arsort($salario, SORT_DESC);
    var_dump($salario);

    ?>
</body>

</html>