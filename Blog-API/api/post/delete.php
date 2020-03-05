<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow_Methods: DELETE");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization, Access-Control-Allow_Methods, X-Requested-With");

include_once("../../config/Database.php");
include_once("../../models/Post.php");

$database = new Database();
$db = $database->connect();

$post = new Post($db);

$data = json_decode(file_get_contents("php://input"));

$post->id = $data->id;

if ($post->delete()) {
    echo json_encode(
        array("message" => "post deleted")
    );
} else {
    echo json_encode(
        array("message" => "Could not delete post.")
    );
}