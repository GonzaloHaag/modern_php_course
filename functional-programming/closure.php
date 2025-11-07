<?php 
/** Funcion que tiene un estado, y puede mantener ese estado
 * Funcion que retorna otra funcion pero puede mantener un ambito 
 * de variables internas
 */

function add(float $number) {
    /** Retorna otra funcion */
    return function(float $number2) use($number) {
            return $number + $number2;
    };
}

$s1 = add(10); /** MANTENDRA ESTE ESTADO */

echo $s1(20)."<br>"; /** 30 PORQUE MANTIENE EL 10 DEL PRINCIPIO */
echo $s1(40); /** 50, PORQUE MANTIENE EL 10 DEL PRINCIPIP */