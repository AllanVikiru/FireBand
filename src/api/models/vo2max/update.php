<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object files
include_once '../../config/database.php';
include_once 'vo2max.php';
  
// get database connection
$database = new Database();
$db = $database->connect();
  
// prepare vo2max object
$vo2max = new VO2Max($db);
  
// get id of vo2max to be edited
$data = json_decode(file_get_contents("php://input"), true);
  
// set ID property of vo2max to be edited
$vo2max->user_id = $data['user-vo2-id'];

//get current date and time
date_default_timezone_set('Africa/Nairobi');
$current_date = date('Y-m-d H:i:s', time());

// set vo2max property values
$vo2max->value = $data['user-vo2'];
$vo2max->status = $data['user-status'];
$vo2max->test_date = $current_date;
  
// update the vo2max
if($vo2max->createorUpdate()){
  
    // set response code - 200 ok
    http_response_code(200);
  
    // tell the vo2max
    echo json_encode(array("message" => "vo2max value was updated."));
}
  
// if unable to update the vo2max, tell the vo2max
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the vo2max
    echo json_encode(array("message" => "Unable to update vo2max value."));
}
?>