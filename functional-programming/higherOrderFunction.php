<?php 

/** Las funciones de orden superior pueden recibir una funcion como parametro 
 * o retornar una funcion
 */

$some = function(float $x, float $y):float {
    return $x + $y;
};

function mul(float $a, float $b):float {
    return $a * $b;
}
function show(callable $fn, float $x, float $y) {
    echo $fn($x, $y); # Imprime lo que hace la funcion
}

show($some, 3,5); # Podria mandarle otra funcion y seguira funcionando

show("mul", 5, 20); # Hace la multiplicacion, se debe enviar como string si no es funcion de primera clase