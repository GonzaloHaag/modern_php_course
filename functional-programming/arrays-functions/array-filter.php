<?php 
require "modelsArray/people.php";
require "modelsArray/functions.php";
use ModelsArray\People; /** Por el namespace */

/** Filters sirve para filtrar valores o informacion 
 * de un array. Retorna un nuevo array filtrado
 */

$people = [
    new People("Juan",50),
    new People("Maria",30),
    new People("Jesus",20)
];

/** Primer parametro el array a filtrar y el segundo parametro
 * la condicion
 */
$geater25Years = array_filter($people, fn($people) => $people->getAge() >= 25);

show($geater25Years);


$withOutJuan = array_filter($people, fn($people) => $people->getName() != "Juan" );

show($withOutJuan);
