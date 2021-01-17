<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object files
include_once '../../config/database.php';
include_once 'profile.php';
  
// get database connection
$database = new Database();
$db = $database->connect();
  
// prepare user object
$profile = new Profile($db);
  
// get id of user to be edited
$data = json_decode(file_get_contents("php://input"), true);
  
// set ID property of user to be edited
$profile->user_id = $data['user-id'];
$timestamp = strtotime($data['example-datepicker2'] );
// Creating new date format from that timestamp
$new_date = date("Y-m-d", $timestamp);

// set user property values 
$profile->dob = $new_date;
$profile->weight = $data['weight'];
$profile->height = $data['height'];
$profile->sex_id = $data['example-inline-radios'];
  
// update the user
if($profile->createorUpdate()){
  
    // set response code - 200 ok
    http_response_code(200);
  
    // tell the user
    echo json_encode(array("message" => "User was updated."));
}
  
// if unable to update the user, tell the user
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to update user."));
}
?>