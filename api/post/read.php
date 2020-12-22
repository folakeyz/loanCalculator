<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Post.php';

//Instatiate DB & Connect
$database = new Database();
$db = $database->connect();

//Instatiate VMS visitors

$post = new Post($db);

//VMS visitor  query
$result = $post->read();
//row count
$num = $result->rowCount();

//Check for Visitors

if($num > 0){
    //Visitors array
    $posts_arr = array();
    $posts_arr['data'] = array();
    
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        
        $post_item = array(
        'BVN' => $bvn,
        'Approved Loan Amount' => $amount,
        );
        //Push to data
        array_push($posts_arr['data'], $post_item);
    }
    
    //turn to JSON
    echo json_encode($posts_arr);
    
}else{
    // No Visitor
    echo json_encode(
    array('message' => 'No Records Found')
    );
    
}