<?php 

# Array indexados 
$names = ["GONZALO", "JUAN", "PEDRO"]; # Indices 0,1,2..
echo $names[1]. "<br>"; # JUAN
$names[] = "ANA"; # Agrega el nombre al final del array
echo $names[3]. "<br>"; # Ya esta ana agregado!

# Array asociativos: clave => valor

$beer = [
    "name" => "Erdinger",
    "alchol" => 8.5,
    "country" => "Alemania"
];
echo $beer["alchol"]; # Accedo al value de alchol, alchol es la key
echo $beer["country"];

$beer["name"] = "GONZALO";  # Modificar el value de esa key
echo $beer["name"];


# Arrays multidimensionales 

$beers = [
    [
        "name" => "Carlos",
        "alcohol" => 10.5,
        "country" => "España"
    ],
    [
        "name" => "Carlos 2",
        "alcohol" => 20.2,
        "country" => "Alemania"
    ],
];

echo $beers[0]["name"]; # Name del primer beer, Carlos