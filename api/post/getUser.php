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

//Get Mobile Number
$post->bvn = isset($_GET['bvn']) ? $_GET['bvn'] : die();
//Get Visitor Logs
$post->single_visitor();

$post_arr = array(
        'BVN' => $post->bvn,
        'Name' => $post->Name,
        'ApprovedLoanAmount' => $post->amount,
        'LoanTenor' => $post->loanTenor,
        'LoanMoratorium' => $post->loanMoratorium,
        'Intrest' => $post->intrest,
        'upfront' => $post->upfront,
        'Totalintrest' => $post->tintrest,
        'TotalAmount' => $post->tAmount,
        'MonthlyAmount' => $post->month,
        
        
        );

//Make JSON
print_r(json_encode($post_arr));