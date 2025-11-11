<?php
require "modelsArray/people.php";
require "modelsArray/functions.php";

use ModelsArray\People;

/** Por el namespace */

/** El metodo usort devuelve un array ordenado
 * MODIFICA EL ARRAY ORIGINAL!
 */

$people = [
    new People("Juan", 50),
    new People("Maria", 30),
    new People("Jesus", 20)
];

/** 
 * 1 <=> 2 --> Devuelve -1 porque 1 es menor a 2
 * 1 <=> 1 --> Devuelve 0 
 * 2 <=> 1 Dvuelve 1
 */

/** Si person1 es menor --> -1 
 * Si person 1 es igual --> 0 
 * si person 1 es mayor --> 1
 */
usort($people, fn($person1, $person2) => $person1->getAge() <=> $person2->getAge());

show($people); ## Modifica el array original
