<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Cal.php';

//Instatiate DB & Connect



$loan = $_GET['loan'];
$year = $_GET['year'];
 $i = $loan * 0.09 * $year;
  $ii = $loan * 0.04 ;
        $iii = $i - $ii;
   $ta= $loan + $iii;
$month = $ta / 24;



$post_arr = array(
        'ApprovedLoanAmount' => $loan,
        'Intrest' => $i,
        'upfront' => $ii,
        'Totalintrest' => $iii,
        'TotalAmount' => $ta,
        'MonthlyAmount' => $month,
        );

//Make JSON
print_r(json_encode($post_arr));
