<?php
# Single Responsibility Principle

/** Establece que una clase debe tener una responsabilidad UNICA.
 * Si se modifica, debe modificarse solamente por una razon, 
 * una clase que guarda en la base de datos no deberia hacer envios de correos electronicos 
 */

# EJEMPLO DE CLASE QUE NO CUMPLE ESTE PRINCIPIO

class Order
{
    private $items = [];
    private $total;

    /** Si el dia de mañana llega un requerimiento de que se tiene que enviar 
     * un SMS, habria que cambiar esta funcion en todas las clases. POR eso
     * no cumple con la responsabilidad unica. Esta funcion esta mal **/
    // private function sendEmail()
    // {
        // echo "Se envia el correo";
    // }


    public function addItem($description, $price)
    {
        $this->items[] = [
            'description' => $description,
            'precio' => $price
        ];

        $this->total = $this->total + $price;
    }
    public function createOrder()
    {
        echo "Se procesa el pedido"."<br>";
    }

    public function getTotal() {

        return $this->total;
    }
}

/** Correcion para cumplir con el principio de responsabilidad unica 
 * Si hay que cambiar algo de logistica, solamente venimos a esta clase y lo cambiamos
 * Esta es la clave del principio SRP
*/
class EmailNotifier {
    public function send(Order $order) {
        echo "Mensaje del pedido, total: ".$order->getTotal(). "<br>";
    }
}


$order = new Order();
$order->addItem("Producto 1",100);
$order->addItem("Producto 2",200);

$order->createOrder();

$emailNotifier = new EmailNotifier();

$emailNotifier->send($order); # Le mandamos la orden!