<?php 

/** Sirve para guardar calculos repetitivos, costosos y que demoran mucho tiempo */

function add(float $a, $b) {
    /** Si me mandan un 1 y un 2, retorna 3. Pero si me vuelven a mandar un 1 y un 2, va 
     * a retornar 3 de nuevo. La idea es memorizar ese 3, para que la proxima vez ya este 
     * memorizado y pueda devolver ese 3 enseguida, sin esperar que se haga la operacion
     */
    return $a + $b;
}

function addMemo() {
    $cache = [];

    return function($a, $b) use(&$cache) {
        /** Se debe pasar el array por referencia, el use */
        $index = $a."-".$b; ## Se crea con los parametros
        if(isset($cache[$index])) {
            /** Si existe, es porque la operacion ya se hizo
             * Podemos retornar ese valor que ya antes se retorno
             */
            echo "Ya existia la operacion <br>";
            return $cache[$index];
        }
        echo "No existia operacion <br>";
        $cache[$index] = $a + $b;

        return $cache[$index]; # Retorno lo que habia
    };
}


$mySum = addMemo();

echo $mySum(4,5)."<br>"; # Ejecuta que no existia la operacion


echo $mySum(4,5)."<br>"; # Devuelve que ya existia la operacion