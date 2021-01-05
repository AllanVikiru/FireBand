<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../config/database.php"';
include_once '../models/biodata.php';

// connect to db, prepare role object and get posted data
$database = new Database();
$db = $database->connect();
$bio = new User($db);
$data = json_decode(file_get_contents("php://input"));
 
// ensure data is not empty
if (!empty($data->name)&&!empty($data->role)) 
{
    // set biodata property values
    $user->name = $data->name;
    $user->role = $data->role;
    
    // create the user, if successful set response code - 201 created
    if ($user->create()) {
        http_response_code(201);
        echo json_encode(array("message" => "User was created."));
    }

    // else unsuccessful, set response code 503 - service unavailable
    else {
        http_response_code(503);
        echo json_encode(array("message" => "Unable to create user."));
    }
}
// if empty, set response code - 400 bad request
else {
    http_response_code(400);
    json_encode(array("message" => "Unable to create product. Data is incomplete."));
}
