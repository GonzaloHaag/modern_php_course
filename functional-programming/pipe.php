<?php 

/** */

function showNames(...$names) {
    # La desestructuracion sirve para transformar todos los parametros en un array 

    foreach($names as $name) {
        echo $name. "<br>";
    }
}

showNames("Ana","Juan","Pedro"); /** Se transformar en array */


/** Un pipe es un encadenador de funciones */
function pipe (...$funcs) {
    /** Toma todos los parametros como un array */
    return function ($value) use ($funcs) {
        foreach($funcs as $fn) {
            $value = $fn($value);
        }
    };

    return $value;
}

$toUpper = fn ($s) => strtoupper($s);
$replaceSpace = fn($s) => str_replace(" ","",$s);
$replaceNumbers = fn($s) => preg_replace('/\d+/u','', $s);

$myPipe = pipe($toUpper, $replaceSpace, $replaceNumbers);
/** El pipe ejecuta el topUpper, el resultado se lo manda a 
 * $replaceSpace y el resultado a $replaceNumbers
 */

$result = $myPipe("abdc ef9029 gh");

echo $result;

