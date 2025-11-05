<?php 

class Add {
    # Metodo magico invoke. Permite ejecutar el objeto como una funcion
    public function __invoke($a,$b) {
        return $a + $b;
    }
}

class Validator {
    private $min;
    private $max;

    public function __construct(int $min, int $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public function __invoke($text)
    {
        $long = strlen($text);
        if($long < $this->min || $long > $this->max) {
            return false;
        }

        return false;
    }
}

$add = new Add();
# echo $add(2,4); # Busca el metodo __invoke!
$validator = new Validator(1,20); # Minimo y maximo 
echo $validator("dasdasdassdadasdas"); # Retorna false porque es mas de 20 caracteres