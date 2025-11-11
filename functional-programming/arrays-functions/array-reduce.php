<?php 
require "modelsArray/people.php";
use ModelsArray\People; /** Por el namespace */
/** array_reduce retorna un valor entero o string o lo que sea
 * pero devuelve un VALOR, no un array nuevo. 
 * Sirve para acumular cosas
 */

$people = [
    new People("Juan",50),
    new People("Maria",30),
    new People("Jesus",20)
];

/** Primer parametro el array, el segundo la funcion con dos parametros, indicando 
 * que quiero sumar o hacer, y el tercero, el valor inicial al iniciar la suma ( current inicial )
  */
$sum = array_reduce($people, fn ($current, $people) => $current + $people->getAge(), 0);

echo $sum; # Obtengo 100, 50 + 30 + 20

