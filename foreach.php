<?php 
# Estructura de control importante para arrays
$names = ["FRANCISCO","CARLOS","PEREZ","RAMON"];
foreach($names as $name) {
    # Primer valor el array as nombrar cada coleccion del array
    echo $name. "--"; # Imprime todos los nombres del array!
}

$beer = [
    "nombre" => "LA MAMBA",
    "alcohol" => 9.0,
    "country" => "Argentina"
];

foreach($beer as $v) {
    # Recorre todos los VALORES de sus claves
    echo "<br>".$v.";";
};

# Si queremos la key y el value
foreach($beer as $k => $v) {
    echo "<br>".$k. ": ".$v.";";
};

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

foreach($beers as $beer){
    foreach($beer as $value) {
        echo $value."<br>";
    }
}