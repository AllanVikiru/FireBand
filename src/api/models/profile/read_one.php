<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
  
// include database and object files
include_once '../../config/database.php';
include_once 'profile.php';
  
// get database connection
$database = new Database();
$db = $database->connect();
  
// prepare user object
$profile = new Profile($db);
  
// set ID property of record to read
$profile->user_id = isset($_GET['id']) ? $_GET['id'] : die();
  
// read the details of user to be edited
$profile->readOne();
  
if($profile->user_id!=null){
    // create array
    $profile_array = array(
        "user_id" =>  $profile->user_id,
        "dob" =>  $profile->dob,
        "sex_id" =>  $profile->sex_id,
        "weight" => $profile->weight,
        "height" => $profile->height,
        "age" => $profile->age
    );
  
    // set response code - 200 OK
    http_response_code(200);
  
    // make it json format
    echo json_encode($profile_array);
} 
else{
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user user does not exist
    echo json_encode(array("message" => "No records found."));
}
?>