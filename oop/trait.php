<?php
declare(strict_types=1);
# Traits: Sirve para reutilizar codigo
# Se pueden crear funcionalidades las cuales se pueden compartir entre clases sin tener relacion alguna 

trait EmailSender {
    public function sendEmail() {
        echo "Se envia un email <br>";
    }
};


trait DB {
    public function save() {
        echo "Se guarda en la base de datos <br>";
    }
}

trait Log {
    # Private, solo lo pueden ver las clases que usan el trait
    private function log(string $message, string $fileName) {
        # Si el archivo que me mandan NO existe:
        if(!file_exists($fileName)) {
            file_put_contents($fileName, ""); # Se crea el archivo en mi carpeta (.txt)
        }

        $current = file_get_contents($fileName); # Obtener contenido del archivo
        
        $current = $current.date("Y-m-d H:i:s")." - ".$message."\n"; # Año, mes, dia, hora...y el mensaje del log

        # Poner el contenido en el archivo 
        file_put_contents($fileName, $current);
    }
}

class Invoice {
    use EmailSender, DB, Log; # Todas las funcionalidades y propiedades que tenga EmailSender, DB y Log!

    public function create() {
        echo "Se crea la factura<br>";
        $this->log("Se creo la factura","log.txt");
    }
}

$invoice = new Invoice();

$invoice->sendEmail(); # Funcionalidad de EmailSender

$invoice->save(); # Funcionalidad de DB

$invoice->create();