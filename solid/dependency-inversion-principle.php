<?php 

# Los modulos de alto nivel, no deben depender de los modulos de bajo nivel
# Ambos deben depender de abstracciones 

/** Modulo de alto nivel: Son los elementos que contienen reglas de negocio,
 * las reglas de negocio son lo que define que es lo que hace mi SISTEMA.
 * Modulo de bajo nivel: Elementos que tienen funcionamiento basico ( conexion a base de datos, operaciones... )
  */

# Esto evita repetir codigo y depender de modulos de bajo nivel
interface ReportInterface {
    public function generate(string $content);
}

/** Pdf y html report son modulos de bajo nivel */
class PDFreport implements ReportInterface {
    public function generate(string $content) {
        echo "Se crea pdf con el contenido: $content";
    }
}

class HTMLReport implements ReportInterface {
    public function generate(string $content) {
        echo "Se crea html con el contenido: $content";
    }
}

class Estimate {
    private ReportInterface $report;
    /** Muy importante recibir la interface creada, no me interesa 
     * como se crea
     */
    public function __construct(ReportInterface $report)
    {
        $this->report = $report;
    }

    public function process() {
        echo "Se genera estimacion<br>";
        $this->report->generate("Contenido de la estimacion"); # Report es ReportInterface, por eso puede acceder a generate()
    }
}

$pdfReport = new PDFreport();
$htmlReport = new HTMLReport();
$estimate = new Estimate($pdfReport); # Pdf report implementa de ReportInterface, por eso lo acepta
# Si el dia de mañana me piden crear solo HTML
$estimateHtml = new Estimate($htmlReport); # Y listo!
$estimate->process();

