<?php 
for($i = 0; $i < 10; $i++) {
    #0,1,2,3...9
    echo $i;
    if($i % 2 == 0) {
        // break; para cortar ejecucion
        continue; // continua el bucle del inicio, ignora lo que sigue
    }
}