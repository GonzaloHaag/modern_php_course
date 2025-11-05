<?php
declare(strict_types=1); # Poner el modo estricto y activar tipado mas fuerte
# Una clase es moddle, siempre comienzan con mayuscula
class Sale
{
    # Lo privado no es accesible desde afuera. Generalmente las variables son privadas. Solo puede ser visto por la misma clase
    private float $total;
    private string $date;
    private array $concepts; # Array de conceptos
    public static int $count = 0; # Se comparte para todas las instancias del objeto, para eso sirve. Son utiles para tener cosas globales o compartidas 
    # Constructor. Obliga a que cuando se instancie la clase, se pasen estos parametros obligatorios
    # Solo se puede tener uno
    public function __construct(float $total, string $date)
    {
        # Obligo a que cuando se crea el objeto, me pasen el total y la fecha de la venta
        # Con this, asigno a mis variables privadas, estos valores que llegan al instanciarse el objeto!
        # this me permite acceder a las variables de mi clase
        $this->total = $total;
        $this->date = $date;
        $this->concepts = []; # Inicializo en un array vacio
        self::$count++; # Se ejecuta cada vez que se invoca el objeto, se incrementa la propiedad. 
    }

    # Destructor. Se ejecuta al momento que el objeto se deja de utilizar. No recibe parametros
    public function __destruct()
    {
        echo "Objeto destruido!";
    }

    # Metodos, son verbos, comportamientos. Funciones 
    public function createInvoice(): string
    {
        return "Venta creada!!!!"."<br>";
    }

    public function getTotalInvoice()
    {
        echo "El total es: ". $this->total . "<br>";
    }
    # Metodos estaticos
    public static function reset() {
        self::$count = 0;
    }

    public function addConcept(Concept $concept) {
        # Añadio al array el concepto que llega, sera de tipo Concept!
        $this->concepts[] = $concept;
        # Incrementar total cuando se añade un concepto
        $this->total = $this->total + $concept->amount;
    }

    ## Getters, getCampoAObtener
    public function getTotal() {
        return $this->total;
    }

    public function getConcepts() {
        return $this->concepts;
    }

    ## Setters, para settear mis propiedades!


    public function setDate(string $date) {
        if(strlen($date) > 10) {
            echo "La fecha es incorrecta";
        }
        $this->date = $date;
    }
};

# Herencia: Permite reutilizar codigo que ya tengo en una clase padre en una clase hija
class OnlineSale extends Sale {

    public $paymentMethod;
    # Cuando el padre tiene un constructor, aca tambien debe tenerlo 
    public function __construct(float $total, string $date, string $paymentMethod)
    {
        parent::__construct($total,$date); # De esta manera se le mandan los valores al constructor padre! Que es la clase Sale
        $this->paymentMethod = $paymentMethod;
    }

    public function showInfo():string {
        return "La venta tiene un monto de: ". $this->getTotal();
    }
}

class Concept {
    public string $description;
    public float|int $amount;
    # Si quiero que amount sea float o entero, se hace mediante union types int | float | ...
    public function __construct(string $description, float|int $amount)
    {
        $this->description = $description;
        $this->amount = $amount;
    }
}

$sale = new Sale(25.500,date("Y-m-d")); # Objeto tipo Sale, por el constructor, es requerido enviar el total y la fecha!
$onlineSale = new OnlineSale(32.500,date("Y-m-d"),"ONLINE"); ## Tiene todo lo de Sale, es clase hija

# Para acceder a las propiedades es objeto -> nombre_propiedad. Debe ser public para que se pueda acceder
# $sale->total = 10.5;
# $sale->date = date("Y-m-d");

echo $sale->createInvoice(); # Llamamos al metodo!

$sale->getTotalInvoice();

echo Sale::$count."<br>"; # Acceder a un static, si tengo una instancia de Sale sera 1, si tengo 2 seran 2 y asi..

Sale::reset(); // Llamar a un metodo estatico

# Añadir un concepto a la venta
$concept = new Concept("Esta es la descripcion del concepto", 83000);
$sale->addConcept($concept);

echo $onlineSale->showInfo();

print_r($sale->getConcepts());
print_r($sale); # Imprimir objeto
