<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
  
// include database and object files
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
  
// set ID property of record to read
$user->id = isset($_GET['id']) ? $_GET['id'] : die();
$user->readOne();
  
//if record is found, create result array, set success response code - 200 OK and encode JSON array
if($user->id!=null){
    $user_array = array(
        "id" =>  $user->id,
        "username" => $user->username,
        "email" => $user->email,
    );
    http_response_code(200); // set response code - 200 OK
    echo json_encode($user_array);
} 
// set response code - 404 Not found
else{
    http_response_code(404);
    echo json_encode(array("message" => "User does not exist."));
}
