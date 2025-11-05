<?php 
# POLIMORFISMO: Sobreescritura de metodos
class Discount {
    protected float $discount = 0;

    public function __construct(float $discount)
    {
        $this->discount = $discount;
    }

    public function getDiscount(float $price):float {
        echo "Se aplica descuento<br>";
        return $price * $this->discount;
    }
}

class SpecialDiscount extends Discount {
    const SPECIAL_DISCOUNT = 2;

    public function __construct(float $discount)
    {
        parent::__construct($discount); # Se lo mandamos al padre
    }

    # Sobreescritura de metodos. Si este metodo no existe, usara el del padr
    public function getDiscount(float $price): float
    {
        echo "Se aplica descuento especial<br>";
        return $price * $this->discount * self::SPECIAL_DISCOUNT;
    }
}

$discount = new SpecialDiscount(0.1);

$discountAmount = $discount->getDiscount(100); # Se aplica el metodo de la clase, porque sobreescribe al metodo del padre
# Si la clase no tendria ese metodo, usaria el del padre!

echo $discountAmount; # Descuento especial!