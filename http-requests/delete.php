<?php

header("Content-Type: application/json"); ## Definir header

$arr = [
    [
        "id" => 1,
        "name" => "Pablo",
    ],
    [
        "id" => 2,
        "name" => "Juan",
    ]
];

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    extract($_GET);
    /** Extraee todo lo que viene en la url */
    // http://localhost:8000?id=2
    echo $id; // SI viene un id en la url lo tengo aca
    /** Necesito que me manden un id a borrar */

    if (isset($id)) {
        $index = get($id, $arr);

        if ($index == -1) {
            http_response_code(404);
            echo json_encode(['error' => "Recurso no encontrado"]);
            return;
        }
        unset($arr[$index]); // Recibe una variable y la elimina

        $arr = array_values($arr); /** Ordenar array */
         echo json_encode(([
             "message" => "Datos actualizados correctamente",
             "data" => json_encode($arr)
        ]));
    } else {
        http_response_code(400);
        echo json_encode(['error' => "FALTA ID EN LA URL!"]);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => "La solicitud no es de tipo DELETE"]);
}

/** Funcion que retorna la posicion donde encuentra 
 * el elemento segun array
 */
function get(int $id, array $arr)
{
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i]["id"] === $id) {
            /** Si la clave en esa pos es igual, lo retorno */
            return $i;
        }
    }

    return -1;
}
