<?php 
require "modelsArray/people.php";
require "modelsArray/functions.php";
use ModelsArray\People; /** Por el namespace */

$people = [
    new People("Juan",20),
    new People("Maria",50),
    new People("Jesus",23)
];

$people2 = [
    new People("Mario",20),
    new People("Roman",50),
    new People("Jesus",23)
];

/** array_udiff para obtener diferencias entre arrays 
 * Obtiene los dos arrays a comparar y el callback
*/

$differences = array_udiff($people1, $people2, fn ($person1, $person2) => $person1->getName() <=> $person2->getName());
show($differences);