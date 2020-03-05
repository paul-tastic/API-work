<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include_once("../../config/Database.php");
include_once("../../models/Post.php");

$database = new Database();
$db = $database->connect();

$post = new Post($db);

// get the requested id from the url
$post->id = isset($_GET['id']) ? $_GET['id'] : die();

$post->read_one();

echo json_encode($post);