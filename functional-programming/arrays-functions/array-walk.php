<?php
require "modelsArray/functions.php";


$numbers = [1, 2, 3, 4, 5];

/* Array_walk no se modifica si no 
le paso el array por referencia
Esa es la diferencia con el map, pero despues hacen lo mismo

 */

array_walk($numbers, fn(&$num) => $num *= 2);

show($numbers); # Modificado porque lo estoy pasando por referencia!

/** Tambien sirve para recorrer un array sin modificarlo */
array_walk($numbers, function ($num) {
    echo $num . "<br>";
});
