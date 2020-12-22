<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Post.php';

//Instatiate DB & Connect
$database = new Database();
$db = $database->connect();

//Instatiate VMS visitors

$post = new Post($db);
//Get Posted Data
$data = json_decode(file_get_contents("php://input"));
$post->name = $data->name;
$post->company = $data->company;
$post->email = $data->email;
$post->mobile = $data->mobile;
$post->laptop = $data->laptop;
$post->serial = $data->serial;
$post->host = $data->host;
$post->purpose = $data->purpose;
$post->appointment = $data->appointment;
$post->picture = $data->picture;
$post->timein = $data->timein;

//Create Post
if($post->Create()){
    echo json_encode(
    array('message' => 'Visitor Checked in')
    );
}else{
    echo json_encode(
    array('message' => 'Error Checkin Visitor in')
    ); 
}
