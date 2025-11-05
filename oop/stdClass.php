<?php 
# Crear objetos dinamicos. Permite crear propiedades sin que existan

$beer = new stdClass();

$beer->name = "Erdinger";
$beer->alcohol = 8.5;

print_r($beer);

echo $beer->name;


# Transformar objeto a array 
$arr = (array) $beer;

echo gettype($arr);

echo $arr["name"];

$arrLocation = [
    "address" => "Mexico",
    "country" => "Alemania"
];

# Transformar array a objeto
$arrObj = (object) $arrLocation;
$arrObj->address;