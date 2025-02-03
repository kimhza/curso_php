<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php 
    //=============================================================
    //BUCLES: Codigo para repetir instrucciones (iteracion) x veces
    //En PHP existen 4 tipos de loops: foreach, for, while, do-while
    //Diferentes estrategias a la hora de decidir el numero de veces que se va a iterar
    //=============================================================

    //foreach: forma mas sencilla de iterar un array
    $arrAnimales = ['Delfin', 'Jirafa', 'Ballena', 'Gato', 'Perro'];
    foreach($arrAnimales as $animal) {
        echo $animal." ";
    }

    //si necesitamos la posicion ó clave
    foreach($arrAnimales as $posicion => $animal) {
        echo "El animal $animal esta en la posicion $posicion \n";
    }

    //range(inicio,fin,paso)
    var_dump(range(0, 20, 3));
?>
    <p>Listado foreach:</p>
    <?php foreach(range(1, 5, 2) as $num) { ?>
    <p><?php echo $num ?></p>
    <?php } ?>

    <p>Listado foreach 2:</p>
    <?php foreach(range(1, 5, 2) as $num): ?>
    <p><?php echo $num ?></p>
    <?php endforeach; ?>

    <?php 

    //Array multidimensional
    //Para recorrer un array multidimensional hay que realizar un bucle dentro de otro bucle
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

    foreach ($zara as $item):
        foreach($item as $elem):
            echo "$elem \n";
        endforeach;
    endforeach;
     ?>

    <!-- 
    for (inicio; condicional; incremento)
    -->
    <?php
    for($i=0; $i<10; $i++){
        echo "$i \n";
    }
    ?>

    <!--While-->
    <?php
    $i=6;
    while($i < 10){
        echo $i++;
    }
    ?>

    <!--do-while
    Se ejecuta al menos 1 vez, asi se cumpla o no se cumpla la condicion
    -->
    <?php
    $i = 3;
    do {
        echo $i++;
    } while($i < 10);

    $j = 13;
    do {
        echo $j--;
    } while($j >= 1);
    ?>
</body>

</html>