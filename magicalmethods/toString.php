<?php 

class Car {
    private string $model;
    private string $brand;
    private int $year;

    public function __construct(string $model, string $brand, int $year)
    {
        $this->model = $model;
        $this->brand = $brand;
        $this->year = $year;
    }

    # Metodo magico toString, para poder devolver un string del objeto que se crea
    # Es importante!
    public function __toString()
    {
        return "El auto es modelo $this->model de la marca $this->brand del año $this->year";
    }
}

$car = new Car("Ranger","Ford",2025);
echo $car; # Pasa por el metodo __toString()