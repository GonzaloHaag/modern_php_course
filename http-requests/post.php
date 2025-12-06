<?php

header("Content-Type: application/json"); ## Definir header
/** metodo POST */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /** Leer lo que viene en el body */
    $json = file_get_contents("php://input");
    $data = json_decode($json); // Convierto a objeto
    ## echo $data;
    /* $name = $data->name; # Acceder solo a un dato
    $age =  $data->age; */

    # Extraer datos de la data 
    extract((array)$data); # Data es un objeto, convierto a array

    // echo $name." ".$age; # Ya tengo disponible el name y age

    http_response_code(201); # Porque se devolveria un dato creado
    echo json_encode([
        "message" => "Datos recibidos correctamente: $name"
    ]);
} else {
    http_response_code(404);
    echo json_encode(["error" => "La solicitud no es de tipo POST"]);
}
