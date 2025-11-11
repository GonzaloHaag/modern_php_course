<?php 
require "modelsArray/people.php";
require "modelsArray/functions.php";
use ModelsArray\People; /** Por el namespace */


/** array_map recibe un array y retorna un nuevo array transformado (o no) */

$people = [
    new People("Juan",20),
    new People("Maria",50),
    new People("Jesus",23)
];

/** De people solamente quiero un array con los nombres */
/** Array_map recibe una funcion que es lo que queremos devolver 
 * de manera singular, y el segundo parametro es el array a iterar
 */
$names = array_map(fn ($person) => $person->getName(), $people);
show($names);
// show($people); el array original NO se modifica

$namesWithFormat = array_map(fn($person) => "<b>".$person->getName()."</b>", $people);
show($namesWithFormat);