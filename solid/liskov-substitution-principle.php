<?php 

# Principio de sustitucion de Liskov

/** Si tengo una clase Hija, esta deberia ser sustituida por su clase Padre sin 
 * alterar el funcionamiento del programa 
 * 
 * Si tengo una clase A a la cual hereda una clase B, deberia poder tipar los objetos de B 
 * de tipo A sin romper el funcionamiento
 */

# Como no todos los proyectos tendran send, lo separamos en una interface
interface ISendProject {
    public function send();
}
class Project {
    public function create() {
        echo "Se creo el proyecto";
    }
}

# Come sales proyect si se envia, implementamos la interface
class SalesProject extends Project implements ISendProject {
    /** Composicion */
    private ISendEmail $sender;

    public function __construct(ISendEmail $sender)
    {
        $this->sender = $sender;
    }
    // mas funcionamiento
    public function send()
    {
       $this->sender->send(); # Creamos un puente
    }
}

# Internal project no se envia, por lo tanto no implemntamos la interfaz de ISendProject
class InternalProject extends Project {
    /** Esto esta mal */
    public function send() {
        throw new Exception("Los proyectos internos no se envian");
    }
}

function send(ISendProject $project){
    $project->send();
}




interface ISendEmail {
    public function send();
}
/** Se centraliza el envio del correo */
class SendEmail implements ISendEmail {
    public function send() {
        echo "Se envia un correo electronico";
    }
}
$sendEmail = new SendEmail();
send(new SalesProject($sendEmail)); # EJECUTA "se envia un correo electronico" centralizando la logica