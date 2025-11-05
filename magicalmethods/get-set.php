<?php 

# Metodos magicos. OOP. Comienzan con __
# Get y set son INTERCEPTORES!
class Person {
    public int $id;
    public string $name;

    # Metodo magico __get
    public function __get($name) {
        # Recibe la propiedad a la cual quiero acceder
        # Se ejecuta cuando pido una propiedad que NO existe!
        echo "No existe $name en el objeto";
    }

    # Metodo magico __set

    public function __set($name, $value) {
        # Recibe el nombre de la propiedad a agregar y su valor
        # Se ejecuta solo si la propiedad no existe
        echo "No puedes agregar $value a $name";
    }
}

$person = new Person();
$person->name = "Juan";
echo $person->name; # Get no se ejecuta porque name si existe 
echo $person->country; # Get se ejecuta porque country NO existe

$person->address = "Calle tal";

