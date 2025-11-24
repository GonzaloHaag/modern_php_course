<?php 
# Patron de diseño estructural - Decorator 
# Imaginarse un objeto al cual se le puden poner envolturas
# Decorator es una bolsa de un objeto del tipo que implemente esa interfaz

/** Presupuesto: Pueden tener ciertas variantes dependiendo a quien 
 * va dirigido
 * Comportamientos dinamicos a objetos ya existentes sin necesidad 
 * de utilizar herencia!
 */
interface BudgetInterface
{
    public function cost(): float;
}

class BasicBudget implements BudgetInterface
{
    private int $hours;
    private float $hourlyRate;

    public function __construct(int $hours, float $hourlyRate)
    {
        $this->hours = $hours;
        $this->hourlyRate = $hourlyRate;
    }

    # Debe implementar el metodo cost 
    public function cost(): float
    {
        return $this->hours * $this->hourlyRate;
    }
}

/** Decorator */

class BudgetDecorator implements BudgetInterface
{
    protected BudgetInterface $budget;

    public function __construct(BudgetInterface $budget)
    {
        $this->budget = $budget;
    }
    /** Actua como puente */
    public function cost(): float
    {
        return $this->budget->cost();
    }
}

# AHora si quiero un presupuesto para clientes extranjeros
class ForeignBudgetDecorator extends BudgetDecorator {
    const EXCHANGE_RATE = 1.5;

    # Sobreescribir metodo del padre
    public function cost(): float
        {
            return parent::cost() * self::EXCHANGE_RATE; # Ejecuto metodo del padre multiplicando por el exchange rate
        }
}

class CustomerBudgetDecorator extends BudgetDecorator {
    const DISCOUNT = 0.9;

    public function cost(): float
        {
            return parent::cost() * self::DISCOUNT;
        }
}

$budget = new BasicBudget(10, 100);
echo "Presupuesto base: $".$budget->cost()."<br>";

$foreignBudget = new ForeignBudgetDecorator($budget); # Le paso ese objeto ( por eso se dice que el decorator es una bolsa )

echo "Presupuesto extranjero: $".$foreignBudget->cost()."<br>"; # Obtiene el cost correspondiente!