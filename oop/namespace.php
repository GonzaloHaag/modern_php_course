<?php

# Si quiero hacer uso de la clase Operations dentro de Utils
require "Utils/Operations.php";
use Utils\Operations; ## Uso del namespace


$op = new Operations(); # Ya tengo disponible la clase que esta dentro de Utils

echo $op->add(15.0,20.0);