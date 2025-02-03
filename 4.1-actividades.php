<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style type="text/css">
table,
th,
td {
    border: 1px solid #000;
}
</style>

<body>
    <!--Actividad 1-->
    <?php
        $arrPelis = ['Capitan America: El primer vengador', 'Capitana Marvel','Iron Man','Iron Man 2', 'El increible Hulk', 'Thor', 'Los Vengadores', 'Iron Man 3'];
        foreach($arrPelis as $posicion => $peli) {
    ?>
    <p><?php echo "Pelicula $posicion: $peli" ?></p>
    <?php } ?>

    <!--Actividad 2-->
    <table>
        <tr>
            <th style="color:rgb(<?php echo random_int(0, 255).','.random_int(0, 255).','.random_int(0, 255) ?>);">
                Posición</th>
            <th style="color:rgb(<?php echo random_int(0, 255).','.random_int(0, 255).','.random_int(0, 255) ?>);">
                Nombre Pelicula</th>
        </tr>
        <?php  foreach($arrPelis as $posicion => $peli) { ?>
        <tr>
            <td><?php echo $posicion ?></td>
            <td><?php echo $peli ?></td>
        </tr>
        <?php } ?>
    </table>

    <!--Actividad 3-->
    <?php 
    foreach(range(1, 10) as $num):
        echo "$num ";
    endforeach;

    foreach(range(60, 70) as $num):
        echo "$num ";
    endforeach;

    foreach(range(20, 1) as $num):
        echo "$num ";
    endforeach;?>

    <p>Tabla del 5:</p>
    <?php foreach(range(1, 10) as $num): ?>
    <p><?php echo "5 x $num: ".$num*5; ?></p>
    <?php endforeach; ?>

    <p>Suma del 1 al 100:</p>
    <?php foreach(range(1, 10) as $num): ?>
    <p><?php echo "5 x $num: ".$num*5; ?></p>
    <?php endforeach; ?>

    <!--Actividad 4
     * Teniendo en cuenta el ejm de recorrer arrays multidimensionales,
     * el 1er foreach recorre 3 iteraciones y el 2do foreach 9 iteraciones.
     * se han realizado 9 echo -->

    <!-- Actividad 5 -->
    <div style="display: flex; justify-content:center;">

        <div style="display: flex; flex-direction: column;">
            <label for="dia">Dia</label>
            <select name="dia" id="dia">
                <?php foreach(range(1, 31) as $num): ?>
                <option value="<?php echo $num ?>"> <?php echo $num ?> </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div style="display: flex; flex-direction: column;">
            <label for="mes">Mes</label>
            <select name="mes" id="mes">
                <?php for($i=1; $i<=12; $i++) { ?>
                <option value="<?php echo $i ?>"> <?php echo $i ?> </option>
                <?php } ?>
            </select>
        </div>

        <div style="display: flex; flex-direction: column;">
            <label for="año">Año</label>
            <select name="año" id="año">
                <?php 
                $j = 1900;
                while($j <= date('Y')) { ?>
                <option value="<?php echo $j; ?>"> <?php echo $j; ?> </option>
                <?php $j++; } ?>
            </select>
        </div>

    </div>

</body>

</html>