<?php

# Clases abstractas
# Son moldes de clases, no se pueden crear objetos a partir de estas clases
# Sirve para la arquitectura del software

abstract class Product {
    # Que propiedades necesita un producto que NO van a cambiar?
    # Protected permite que solo las clases que lo heredan puedan ver estas variables o modificarlas!
    protected float $price;
    protected string $name;
    
    # Puede tener metodos para quien herede de ella, tenga que utilizarlos si o si 
    abstract public function calculatePrice():float; # Metodo sin funcionamiento
    public function getName():string {
        return $this->name;
    }
}

class Beer extends Product {

    const TAX = 1.1; # constante, no se va a modificar
    public function __construct(string $name, float $price) 
    {
        $this->name = $name;
        $this->price = $price;
    }
    # NECESITA SI O SI USAR LOS METODOS calculatePrice y getName, porque asi se declaro en la clase abstracta
    public function calculatePrice(): float
    {
        return $this->price * self::TAX; # Se utilizar self porque es una constante, pertence solo a esta clase misma
    }
}

$beer = new Beer("Delirium",15);

echo $beer->getName()."<br>"; # Como extendio de la clase product, tengo este metodo disponible!

# Yo se que un tipo product va a tener el calculatePrice, porque sino da error! Porque es requerida en la clase abstracta
function showInfo(Product $product):void {
    echo "$ ".$product->calculatePrice();
}

echo showInfo($beer); # Beer es tipo beer pero hereda de Product, por lo tanto es tipo Product tambien. Por eso puede recibirlo show info