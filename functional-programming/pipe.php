<?php 

/** */

function showNames(...$names) {
    # La desestructuracion sirve para transformar todos los parametros en un array 

    foreach($names as $name) {
        echo $name. "<br>";
    }
}

showNames("Ana","Juan","Pedro");


function pipe (...$funcs) {
    return function ($value) use ($funcs) {

        foreach($funcs as $fn) {
            $value = $fn($value);
        }
    };

    return $value;
}