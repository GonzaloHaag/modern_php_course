<?php

# Principio de abierto/cerrado 
# Los modulos, funciones y clases deben estar abiertas para extension pero cerradas para modificacion.
# Si ya tengo funcionamiento, y hay nuevo funcionamiento que agregar, no tendria que mover lo que ya estaba funcionando

/** Clase que no cumple este principio.
 * Ya que si me piden que ponga division, tendria que ir a modificar 
 * la funcion calculate, no deberia tener que cambiar lo que ya funcionaba antes.
 * Lo mismo si me piden sacar una operacion
 */
// class Calculator {
//     public function calculate($a, $b, $op) {
//         if($op == "sum") {
//             return $a + $b;
//         } else if($op == "mul") {
//             return $a * $b;
//         }
//     }
// }

/** Solucion para si cumplir con este principio, las interfaces ayudan mucho con esto */

interface OpInterface {
    public function calculate(float $a, float $b):float; # Obliga a las clases que implementen la interfaz, que este metodo este si o si
}

# Solo se encargara de sumar
class Sum implements OpInterface {
    public function calculate(float $a, float $b):float
    {
        return $a + $b;
    }
}

/** Ahora si se me pide agregar una multiplicacion, solamente 
 * debo crear una nueva clase, y NO se modifica lo que ya estaba funcionando!
 */

class Mult implements OpInterface {
    public function calculate(float $a, float $b): float
    {
        return $a * $b;
    }
}

class Calculator {
    /** Creamos un puente */
    private OpInterface $op;
    public function __construct(OpInterface $op)
    {
        $this->op = $op;
    }

    public function calculate(float $a, float $b):float {
        return $this->op->calculate($a,$b); # Se lo mandamos al metodo que tenga la interfaz
    }
}

$sum = new Sum();
$mult = new Mult();

$calculator = new Calculator($sum); # En su constructor, requiere algo que implemente de OpInterface

# Si le mando mult ejecutara el metodo calculate de mult, si le mando sum ejecutara el metodo de sum

echo $calculator->calculate(4,5);