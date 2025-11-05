<?php 
declare(strict_types = 1);
# Es un contrato, solo tiene METODOS a implementar. No tiene variables ni propiedades
# Comienzan con mayusculas
interface SendInterface {
    public function send(string $message);
}

interface SaveInterface {
    public function save();
}

# Esta es una diferencia de la clase abstracta, se puede implementar de mas de una interface
class Document implements SendInterface, SaveInterface {
    # Los metodos send y save son obligatorios!

    public function send(string $message) {
        echo "Se envia la venta ".$message;
    }

    public function save()
    {
        echo "Se guarda la venta en la nube";
    }
}

class BeerRepository implements SaveInterface {
    public function save()
    {
        echo "Se guarda en una bd!";
    }
}

class SaveProcess {
    private SaveInterface $saveManager;

    public function __construct(SaveInterface $saveManager)
    {
        $this->saveManager = $saveManager;
    }

    # Yo se que los SaveInterface tienen un metodo llamado save()
    # Hacemos un metodo para ejecutar ese save
    public function keep() {
        echo "Hacemos algo antes <br>";
        $this->saveManager->save();
    }
}

# Estos dos son clases diferentes, pero implemntan la misma interfaz: SaveInterface
$beerRepository = new BeerRepository();
$document = new Document();
# Esto me da mucha flexibilidad ya que le puedo pasar el tipo $document y seguira funcionando igual 

$saveProcess = new SaveProcess($beerRepository); # Me pide algo de SaveInterface, $beerRepository lo cumple
$saveProcess->keep();