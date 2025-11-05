<?php 
# Tipo de variables: Entero, flotante, string, bool
$number = 1;
$decimal = 2.12;
$name = "Esto es una cadena";
$isFalse = false;
$empty = null; # No hay nada

# Php es dinamico con las variables, se puede asignar un string a un entero

$number = (int)"1"; # Se permite, pero lo puedo castear como un entero, lo obligo a que sea un integer

## Saber el tipo de una variable 
echo gettype($number);

