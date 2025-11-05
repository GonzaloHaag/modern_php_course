<?php 

# El namespace le da un nombre a la clase para que este agrupada junto a otras clases
# Sirve para evitar colisiones, puede haber varias clases que sea Operations
namespace Utils; # Siempre deben tener el nombre de la carpeta donde se encuentran!

class Operations {
    public function add(float $a, float $b) {
        return $a + $b;
    }
};
