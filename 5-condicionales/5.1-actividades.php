<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php 
        //Actividad 1
        echo (True && True); //true
        echo (False && True); //False
        echo (1 == 1 && 2 == 1); //False
        echo ("test" == "test"); //True
        echo (1 == 1 || 2 != 1); //True
        echo (True && 1 == 1); //True
        echo (False && 0 != 0); //False
        echo (True || 1 == 1); //True
        echo ("test" == "testing"); //False
        echo (1 != 0 && 2 == 1); //False
        echo ("test" != "testing"); //True
        echo ("test" == 1); //False
        echo (!(True && False)); //True
        echo (!(1 == 1 && 0 != 1)); //False
        echo (!(10 == 1 || 1000 == 1000)); //False
        echo (!(1 != 10 || 3 == 4)); //True
        echo (!("testing" == "testing" && "Zed" == "Cool Guy")); //True
        echo (1 == 1 && (!("testing" == 1 || 1 == 0))); //True
        echo ("chunky" == "bacon" && (!(3 == 4 || 3 == 3))); //False
        echo (3 == 3 && (!("testing" == "testing" || "PHP" == "Fun"))); //False

        //Actividad 2
        $año_nacimiento = 1969;
        $edad_actual = (date('Y')-$año_nacimiento);

        if ($edad_actual >= 65):
            echo 'Demasiado mayor para entrar';
        elseif ($edad_actual >= 18):
            echo 'Puedes entrar a discotecas';
        else:
            echo 'No debes entrar a discotecas.';
        endif;

        //Ejercicio adicional
        $fecha_nac = date_create_from_format('d/m/Y', '03/12/2024');
        $fecha_act = date_create(date('d/m/Y'));
        $dif_fechas = date_diff($fecha_nac, $fecha_act);
        echo "Si naciste en ". $fecha_nac->format('d/m/Y')." tu edad es: " . $dif_fechas->y . " años, " . $dif_fechas->m . " meses y " . $dif_fechas->d . " días.";
    ?>
</body>

</html>