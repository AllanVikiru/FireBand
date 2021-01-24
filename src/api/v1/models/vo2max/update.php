<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object files
while (!file_exists('config'))
    chdir('..');
require_once 'config/routes.php';
include_once DB_CONNECT_URL;
include_once VO2MAX_MODEL_URL;
  
// get database connection
$database = new Database();
$db = $database->connect();
  
// prepare vo2max object
$vo2max = new VO2Max($db);
  
// get id of vo2max to be edited
$data = json_decode(file_get_contents("php://input"), true);
  
// set ID property of vo2max to be edited
$vo2max->user_id = $data['user-vo2-id'];

//get current date and time and set vo2max property values
date_default_timezone_set('Africa/Nairobi');
$current_date = date('Y-m-d H:i:s', time());
$vo2max->value = $data['user-vo2'];
$vo2max->status = $data['user-status'];
$vo2max->test_date = $current_date;
  
// update the vo2max
if (!array_filter($data)) {
    // set 400 bad request and encode incomplete request
    http_response_code(400);
    json_encode(array("message" => "Unable to update value and status. Data is incomplete."));
} 
else{
    // try status update 
    if($vo2max->createorUpdate()){
  
    // set response code - 200 ok and encode updated response
    http_response_code(200);
    echo json_encode(array("message" => "vo2max value and status was updated."));
    }
    else{// set 503 service unavailable and encode unable to update response
        http_response_code(503);
        echo json_encode(array("message" => "Unable to update vo2max value."));
    }
}
