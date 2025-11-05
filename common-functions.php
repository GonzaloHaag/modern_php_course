<?php 
# Funciones comunes para arrays 
$beers = [
    "Carolus",
    "London porter",
    "Delirium Red"
];

$beers2 = [
    "Carolus 2 ",
    "London porter 2",
    "Delirium Red 2"
];

# Combinar 2 arrays 
$beerMixed = array_merge($beers, $beers2);

echo count($beers); # Saber cuantos elementos tiene mi array, 3

array_push($beers, "KARMELITEN"); # Agregar nuevo elemento al array

array_pop($beers); # Se elimina el ultimo elemento, devuelve el beer eliminado!

# Buscar si un elemento existe en un array
if(in_array("Corona", $beers)) {
    echo "Existe";
}

print_r($beers); # Contenido del array