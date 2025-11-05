<?php
# Las variables son sensibles a mayusculas 
$name = "Gonzalo";
echo $name;

$name = "Hector";
# Se sobreescribe la variable
echo $name;

# Las variables pueden cambiar de tipo 
$bool = true;
$float = 1.4;
$age = 30;
echo $float;

# Concatenacion simple
echo "Mi nombre es $name y tengo $age";

$message2 = "Message 2";

## Concatenacion compleja
echo "Este es mensaje 2, con concatenacion compleja". " ". $message2;

?>