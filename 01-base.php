<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Repaso PHP</h1>
    <!-- Para añadir scripts de php debo usar las etiquetas correspondientes -->
    <?php echo "<i>echo sirve para imprimir por pantalla</i>"; ?>
    <!-- Una forma de agregar varias lineas es con varios echos y con la etiqueta html de parrafo -->
    <?php  
        echo "<p>Linea 1</p>";
        echo "<p>Linea 2</p>";
        echo "<p>Linea 3</p>";
    ?>
    <!-- Otra forma es añadiendo un salto de linea (PHP_EOL) -->
    <?php
    echo "<p>Esta es una linea</p>". PHP_EOL ."<p>Esta es otra linea</p>";
    ?>
    <!-- La otra forma es con END -->
    <?php 
    echo <<<END
    Esta es una nueva linea
    Esta es otra linea
    END;
    ?>
    <!-- Concatenar textos -->
    <?php
        echo "Hola,"." estoy concatenando "."textos";
    ?>
    <!-- Comentarios -->
    <?php
    //  echo "Para comentar una linea"; 
    
    /* echo <<<END
    Esta es una nueva linea
    Esta es otra linea
    END; */
    ?>


</body>

</html>