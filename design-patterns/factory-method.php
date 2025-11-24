<?php
# Patron de diseño creacional
# Sirve para cuando no conocemos el tipo de objeto que vamos a utilizar 
# Sera una fabrica que cree objetos 

interface BeerInterface
{
    public function getPrice(): float;
}

class Lager implements BeerInterface
{
    private float $tax;
    private float $price;

    public function __construct(float $tax, float $price)
    {
        $this->tax = $tax;
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price + $this->tax;
    }
}

class IPA implements BeerInterface
{
    private float $price;
    private float $discount;

    public function __construct(float $price, float $discount)
    {
        $this->price = $price;
        $this->discount = $discount;
    }

    public function getPrice(): float
    {
        return $this->price - $this->discount;
    }
}

# Factory 

abstract class BeerFactory
{
    # Podemos meter cosas dinamicas
    abstract public function create(array $params): BeerInterface;
}

class LagerFactory extends BeerFactory
{
    # Fabrica de cervezas lager
    # Va a crear un objeto del tipo lager
    public function create(array $params): BeerInterface
    {
        return new Lager($params["price"], $params["tax"]);
    }
}

class IPAFactory extends BeerFactory
{
    # Fabrica de cervezas IPA
    # Va a crear un objeto del tipo IPA
    public function create(array $params): BeerInterface
    {
        return new IPA($params["price"], $params["discount"]); # Y asi construyo con lo que yo quiera
    }
}


$ipaFactory = new IPAFactory();

/** Creo una nueva ipa */
$ipa = $ipaFactory->create(["price" => 10, "discount" => 10]);