<?php 
# Funcion pura: Para el mismo conjunto de entradas, siempre debe tener la misma salida 
# Lo que pasa en la funcion queda en la funcion 

class Counter {
    public int $count = 0;
}

$counter = new Counter();

/** Funcion pura, los parametros no se modifican fuera de ella! */
function add(float $a, float $b):float {
    return $a + $b;
}

echo add(1,3);
echo add(1,3); /** Siempre imprime 4 */