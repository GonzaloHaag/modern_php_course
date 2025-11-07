<?php 

# Funciones flechas, solo se puede devolver UNA expresion
# No llevan {}

$sum = fn (float $a, float $b) => $a + $b;

$sum(2,4);

$const = 5;

$some = function(float $x, float $y) use($const):float {
    # Puedo usar use para tener esa variable disponible, sirve para tener disponible variables externas
    return $x + $y + $const;
};
