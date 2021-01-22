<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// instantiate user and database objects
include_once '../../config/database.php';
include_once 'thingspeak.php';

//connect to db and prepare user object
$database = new Database();
$db = $database->connect();
$ts = new Thingspeak($db);

// get posted data
$data = json_decode(file_get_contents("php://input"), true);

// make sure data is not empty
if (!array_filter($data)) {

    http_response_code(400);
    json_encode(array("message" => "Unable to create user. Data is incomplete."));
} 
else {
    // set user property values
    $ts->user_id = $data['example-select'];
    $ts->channel = $data['user-channel'];
    $ts->key = $data['user-key'];
    $ts->location = $data['user-location'];
}
// create the user, if successful set response code - 201 created
if ($ts->createorUpdate()) {
    http_response_code(201);
    echo json_encode(array("message" => "Channel information was set."));
}

// else unsuccessful, set response code 503 - service unavailable
else {
    http_response_code(503);
    echo json_encode(array("message" => "Unable to set information. Service temporarily down"));
}



