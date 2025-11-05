<?php

// $array1 = [1,2,3];
// $array2 = $array1;

// $array2[] = 10;

// print_r($array1); # No se modifica
// print_r($array2); # Se modifica!

class Some {
    public string $name;

    # Metodo que se hace cuando se clona el objeto
    public function __clone()
    {
        $this->name = strtoupper($this->name);
    }
}

function change(Some $some) {
    $some->name = "Ya no tiene algo, se ha cambiado su valor";
}

$some = new Some();
$some->name = "Algo";
$some2 = $some; # Solo le estamos dando un nuevo nombre a esa direccion en memoria, pero sigue siendo la misma direccion
$some2->name = "Lo cambio"; # Por eso se cambia en $some y $some2 el name

# Se modifica el name en AMBOS objetos, no funciona como el array!
# Es porque los objetos trabajan por referencia
# Los objetos cuando los pasamos por parametros, tambien van POR REFERENCIA
# Se modifica el original, importante comprender esto. Comparten la misma direccion de memoria, es el mismo objeto!

# Metodo magico clone para clonar un objeto 

$newSome = clone $some; # Ya no apunta a la misma referencia, es una nueva direccion de memoria!
echo $some->name."<br>";
echo $newSome->name; # Sale en mayusculas!

# Objetos dentro de objetos NO se clonan --> IMPORTANTEEEE