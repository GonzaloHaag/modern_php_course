<?php 

/** Funcion de primera clase que se pasa a una de orden superior */
$numbers = [1,2,3,4,5,6];

function process(array $arr, callable $fn):array {
    $newArray = [];

    foreach($arr as $element) {
        $newElement = $fn($element); ## Llama a la funcion que me pasen
        $newArray[] = $newElement;
    }

    return $newArray;
}

$result1 = process($numbers, fn ($e) => $e * 2); # Se agrega cada number * 2

print_r($result1);