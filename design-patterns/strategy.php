<?php

# Patron de diseño de comportamiento -  Estrategia 

interface IStrategy
{
    public function get(): array; # Metodo que retorna un array
}

class ArrayStrategy implements IStrategy
{
    private array $data = ["Titulo 1", "Titulo 2", "Titulo 3"];
    public function get(): array
    {
        return $this->data;
    }
}

class InfoPrinter
{
    # Clase que tendra una estrategia 
    private IStrategy $strategy;

    public function __construct(IStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function print()
    {
        /** Como es de tipo estrategia, tengo acceso a ese get
         * Yo no conozco que tiene Array Strategy, ni quien lo implemente,
         * esa es la idea
         * No me importa que haga internamente el get de las otras clases
         */
        $content = $this->strategy->get();

        foreach ($content as $item) {
            echo $item . "<br>";
        }
    }
}
/** Esto permite escalar, que pasa si ahora me piden que la informacion sea de una url, no de un array
 * Principios solid, agregar algo sin modificar lo ya realizado
 */

class UrlStrategy implements IStrategy
{
    private string $url;

    public function __construct(string $url)
    {

        $this->url = $url;
    }
    # Ahora el metodo puede ser distinto al de InfoPrinter!!!!!!!
    public function get(): array {
        $data = file_get_contents($this->url); # Retorna la informacion de una url (get)
        $arr = json_decode($data, true); # Data devuelve un json, hay que decodificarlo
        # Array sera un array asociativo, por el segundo parametro que es true 
        return array_map(fn ($item) => $item["title"], $arr); # Hago un map porque solo me interesa el campo title
    }
}

$arrayStrategy = new ArrayStrategy();
$infoPrinter = new InfoPrinter($arrayStrategy); # Como implementa de IStrategy, es aceptado!

$infoPrinter->print();

/** No modifico nada de lo que ya hice, escalabilidad y principios SOLID */
$urlStrategy = new UrlStrategy("https://jsonplaceholder.typicode.com/posts");
$infoPrinter2 = new InfoPrinter($urlStrategy);
$infoPrinter2->print(); # Ejecuta el metodo get de mi urlStrategy! -> Esto es muy importante
