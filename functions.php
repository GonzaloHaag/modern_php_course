<?php 
function hi(string $name) {
    # No tiene return!
    echo "Hola $name". "<br>";
};

function add(int $a, int $b): int {
    # Indico que los argumentos deben ser de tipo int y que retornare un entero
    $result = $a + $b;
    return $result;
}
hi("Hector");
hi("Oscar");
hi("Lalo");

$miResult = add(20,5); # La funcion devuelve el resultado de la operacion
echo ($miResult); # 25