<?php 

class Beer  {
    public string $name;
    public string $brand;
    public float $alcohol;

    public function __construct(string $name, string $brand, float $alcohol)
    {
        $this->name = $name;
        $this->brand = $brand;
        $this->alcohol = $alcohol;
    }
}

$beer = new Beer("Delirium Red", "Delirium",8.5);

# Transformar a json 
$json = json_encode($beer);

echo $json;

$jsonBeer = '{"name":"Delirium Red","brand":"Delirium","alcohol":8.5}';
# Transformar desde json
$objBeer = json_decode($jsonBeer);
print_r($objBeer); # Objeto dinamico (stdClass)
echo $objBeer->name;

# Transformar a array asociativo (clave => valor)
$newArray = json_decode($jsonBeer, true);
