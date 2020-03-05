<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include_once("../../config/Database.php");
include_once("../../models/Post.php");

$database = new Database();
$db = $database->connect();

$post = new Post($db);

$result = $post->read();
$num = $result->rowCount();

if ($num > 0) {
    $postAry = array();
    $postAry = $result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($postAry);
} else {
    echo json_encode (array ("message" => "no entries found."));
}