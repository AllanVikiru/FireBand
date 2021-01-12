<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../config/database.php';
include_once '../models/role.php';

// connect to db, prepare role object and get posted data
$database = new Database();
$db = $database->connect();
$role = new Role($db);
$data = json_decode(file_get_contents("php://input"));

// ensure data is not empty
if (!empty($data->role)) {
    // set role property values
    $role->role = $data->role;

    // create the user, if successful set response code - 201 created 
    if ($role->create()) {
        http_response_code(201);
        echo json_encode(array("message" => "Role Created."));
    }

    // else unsuccessful, set response code 503 - service unavailable
    else {
        http_response_code(503);
        echo json_encode(array("message" => "Unable to create role."));
    }
}

//else, if data is empty, set response code 400 - bad request
else {
    http_response_code(400);
    echo json_encode(array("message" => "Unable to create role. Data is incomplete."));
}
