<?php 

/* Paginacion
Es un proceso que permite dividir un conjunto grande de datos 
en partes mas pequeñas (paginas). 

Puntos claves:
1- Cuantos elementos se van a mostrar por pg?
2- Fuente donde voy a obtener los datos
3- Calcular el inicio (offset) de los datos que voy a mostrar por pg.
4. Hacer una consulta que devuelva solo esos datos
5. Mostrar los datos
6. Construir enlaces para cambiar de pg.

Explicacion:
<?php

$personajes = [
  'Abelar Hightower',
  'Addam Frey',
  'Addam',
  'Addam Osgrey',
  'Addam Marbrand',
  'Addison Hill',
  'Aegon Blackfyre',
  'Addam Velaryon',
  'Aegon Frey (son of Aenys)',
  'Aegon Frey (son of Stevron)'
];

// Constante con el número de resultados por página: 3
define('LIMITE_RESULTADOS', 3);

// Página donde nos encontramos. Si existe un GET con el nombre 'página' se guarda sino será 1.
$paginaActual = isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1; 

// Crea un nuevo array con los personajes a mostrar en la página
$personajesPagina = array_splice($personajes, ($paginaActual - 1) * LIMITE_RESULTADOS, LIMITE_RESULTADOS);

// Guardo un True o False si nos encontramos en la primera página: ¿La página actual es la primera?
$esPrimera = $paginaActual == 1;

// Guardo un True o False si nos encontramos en la última página: ¿La página actual es la última?
$esUltima = ceil(count($personajes) / LIMITE_RESULTADOS) == $paginaActual;

//======================================================================
// HTML
//======================================================================
<html>
    <body>
        <!-- Bucle que dibuja todos los personajes -->
        <?php foreach ( $personajesPagina as $personaje): ?>
<div>
    <h1><?= $personaje ?></h1>
    <hr>
</div>
<?php endforeach; ?>
<!-- Botón para retroceder -->
<?php if (!$esPrimera): ?>
<a href="paginador.php?pagina=<?= $paginaActual - 1 ?>">Anterior</a>
<?php endif; ?>
<!-- Botón para avanzar -->
<?php if (!$esUltima): ?>
<a href="paginador.php?pagina=<?= $paginaActual + 1 ?>">Siguiente</a>
<?php endif; ?>
</body>

</html>


********
TIPS:
********

En las consultas se usa Limit y Offset:
SELECT * FROM series LIMIT 10 OFFSET 20;
* LIMIT = cuántos registros quieres ver: 10
* OFFSET = desde qué registro empezar: 21
O sea que traeria los datos: 21,22,23,24,25,26,27,28,29,30

O tambien se puede usar una consulta mas simple como:
SELECT * FROM series LIMIT 20, 10;
Aqui la sintaxis cambia: LIMIT offset, cantidad.






*/