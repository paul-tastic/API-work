<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
     
    include_once '../config/database.php';
    include_once '../objects/wine.php';
     
    $database = new Database();
    $db = $database->getConnection();
    $wine = new Wine($db);
    $stmt = $wine->read();
    $num = $stmt->fetchColumn();

    if($num > 0) {
     
        $wines_arr=array();
        $wines_arr["records"]=array();
     
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
     
            $wine_item=array(
                "id" => $id,
                "name" => $name,
                "vineyard" => $vineyard,
                "vintage" => $vintage,
                "varietal" => $varietal,
                "modified" => $modified
            );
     
            array_push($wines_arr["records"], $wine_item);
        }
     
        http_response_code(200);
        echo json_encode($wines_arr);
    } else {
        http_response_code(404);
        echo json_encode(
            array("message" => "No wines found.")
        );
}