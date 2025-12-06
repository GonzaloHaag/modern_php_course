<?php 

# Metodo GET

/** Para obtener el metodo que me estan consultando */
// echo $_SERVER["REQUEST_METHOD"];

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    /** Hacer cosas solo si es GET */
    echo "RECIBIDO EL GET!";

    /** Recibir los parametros de la url ss?params */
    echo json_encode($_GET);
    /**GET http://localhost:8000?name=Pedro --> arroja {name:Pedro} */

    /**
     * GET http://localhost:8000?name=Pedro&age=15
     * Arroja: {"name":"Pedro","age":"15"}
     */

    /** Acceder solo a un parametro */
    echo json_encode($_GET["name"]); // devuelve "Pedro"
} else {
    /** Devolver http response code */
    http_response_code(404); /** Not found */
    /** Devolver respuesta en formato json */
    echo json_encode(['error' => "La solicitud no es de tipo GET"]);
}
