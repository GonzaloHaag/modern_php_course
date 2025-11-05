<?php 
declare(strict_types=1);
interface GetInfo {
    public function getInfo():string; # Es buena practica que NO indique como se hace
}

class Address implements GetInfo {
    protected $address;

    public function __construct($address)
    {
        $this->address = $address;
    }

    # Sobreescribe al metodo de GetInfo()
    public function getInfo(): string
    {
        return $this->address;
    }
}

class Website implements GetInfo {
    protected $url;

    public function __construct( string $url)
    {
        $this->url = $url;
    }
    
    # Sobreescribir el metodo, es obligatorio igualmente para la clase 
    public function getInfo(): string
    {
        return file_get_contents($this->url);
    }
}

function printInfo(GetInfo $site) {
    # No importa que le llegue, mientras sea un GetInfo!
    echo $site->getInfo(); # Accede al metodo getInfo segun la clase que le pasemos, eso es lo bueno, es dinamico!
}

$address = new Address("Calle 123");
printInfo($address); # EJECUTA EL METODO GETINFO DE ADDRESS

$website = new Website("https://hdeleon.net");
printInfo($website); # Imprimira todo el sitio, literalmente. EJECUTA EL METODO GET INFO DE WEBSITE! TODO CON LA MISMA FUNCION