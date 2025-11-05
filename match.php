<?php 
$food = 'cake';

# Match retorna con lo que coincida, es el reemplazo de switch
# Si no coincide con ninguna, lanzara un error. Se debe envolver dentro de un try catch
echo match($food) {
    'apple' => 'La comida es apple',
    'bar' => 'La comida es bar',
    'cake' => 'La comida es cake'
};


