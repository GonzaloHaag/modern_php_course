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

if($_SERVER["REQUEST_METHOD"] == "PUT") {
    /** Solo si la solicitud es PUT */
    $json = file_get_contents("php://input");
    $data = json_decode($json);
    extract((array)$data); // Aca tengo ya para acceder a los datos directamente

    /** Necesito que data no sea null, que venga el id y el name dentro de data
     * Se accede directamente a los campos dentro de data gracias al extract
     */
    if($data != null && isset($id) && isset($name)) {
        $index = get($id, $arr);
        if($index == -1) {
            http_response_code(404);
            echo json_encode(["error" => 'Elemento no encontrado']);
            return;
        }
        $arr[$index]["name"] = $name; // edito el nombre en la pos
        http_response_code(200);
        echo json_encode(([
             "message" => "Datos actualizados correctamente",
             "data" => json_encode($arr)
        ]));
    } else {
        http_response_code(400);
        echo json_encode(["error" => 'Faltan campos']);
    }
} else {
    http_response_code(405);
    echo json_encode(["error" => 'La solicitud no es de tipo PUT']);
}


function get(int $id, array $arr) {
    for($i = 0; $i<count($arr); $i++) {
        if($arr[$i]["id"] === $id) {
            /** Si la clave en esa pos es igual, lo retorno */
            return $i;
        }
    }

    return -1;
}