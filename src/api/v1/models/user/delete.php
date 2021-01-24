<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object file
while (!file_exists('config'))
    chdir('..');
require_once 'config/routes.php';
include_once DB_CONNECT_URL;
include_once USER_MODEL_URL;

// get database connection
$database = new Database();
$db = $database->connect();
  
// prepare user object
$user = new User($db);

// get and set user id to be deleted
$data = json_decode(file_get_contents("php://input"));
$user->id = $data->id;
  
// try delete the user
if($user->delete()){
    // if able, set response code - 200 ok
    http_response_code(200);
    echo json_encode(array("message" => "User was deleted."));
}
  
// if unable, set response code - 503 service unavailable
else{
    http_response_code(503);
    echo json_encode(array("message" => "Unable to delete user."));
}
