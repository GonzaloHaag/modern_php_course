<?php 

/** Capacidad para evitar que algo NO se modifique para evitar efectos secundarios */

class Location {
    private float $x;
    private float $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX():float {
        return $this->x;
    }

    public function getY():float {
        return $this->y;
    }

    /** Funcion para modificar los valores pero que sigan 
     * siendo objetos inmutables
     */
    public function move(float $x, float $y):Location {
        $location = new Location($this->x + $x, $this->y + $y);
        return $location; # Modifica otro objeto, no el otro. Queda inmutable
    }
}

$location = new Location(1,2);
$newLocation = $location->move(10,22);

echo $location->getX()." ".$location->getY()."<br>";
echo $newLocation->getX()." ".$newLocation->getY()."<br>"; /** No modifica ni x ni y del objeto location */