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
        //ACTIVIDADES REPASO
        //=======================================

        //---------------------------------------
        //Actividad 1.1: Calculando
        //---------------------------------------
        $num1 = 23;
        $num2 = 34;
        $resultado1 = $num1 + $num2; //suma
        print("El resultado de la suma es $resultado1 ");
        
        // Ejercicio adicional
        $resultado2 = ($num1 + 34) * ($num1 % $num2) ** 2;
        echo "El resultado de la operacion es $resultado2";

        //---------------------------------------
        //Actividad 1.2: Meeting
        //---------------------------------------
        $chica = "Cami";
        $chico = "Jose";
        echo "A $chica le gusta $chico";

        // Ejercicio adicional
        $nombre = "Frank";
        $año = 1999;
        $edad = date("Y") - $año;
        echo "Me llamo $nombre y tengo $edad años.";
        
        //---------------------------------------
        //Actividad 1.3: Impuestos
        //---------------------------------------
        $num3 = 5000;
        $iva = $num3 * 0.19;
        $total = $num3 + $iva;
        echo "El iva de $$num3 es $$iva, el total es $$total";
    ?>
</body>

</html>