<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object file
include_once '../../config/database.php';
include_once 'user.php';

  
// get database connection
$database = new Database();
$db = $database->connect();
  
// prepare user object
$tokens = new User($db);
  
// try delete the user
if($tokens->clearTokens()){
    // if able, set response code - 200 ok
    http_response_code(200);
    echo json_encode(array("message" => "Tokens cleared."));
}
  
// if unable, set response code - 503 service unavailable
else{
    http_response_code(503);
    echo json_encode(array("message" => "Unable to clear tokens."));
}
?>