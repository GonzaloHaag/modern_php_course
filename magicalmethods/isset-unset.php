<?php 

$a = 1;
# El metodo isset comprueba si existe una variable MUY UTIL para verificar session y eso
if(isset($a)) {
    echo "EXISTE";
} else {
    echo "No existe";
}

# Unset elimina la variable o elemento (util para liberar memoria)
unset($a);