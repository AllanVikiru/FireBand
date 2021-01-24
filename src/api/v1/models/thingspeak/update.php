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
include_once THINGSPEAK_MODEL_URL;

//connect to db and prepare user object
$database = new Database();
$db = $database->connect();
$ts = new Thingspeak($db);

// fetch posted data
$data = json_decode(file_get_contents("php://input"), true);

// make sure data is not empty, if so, set 400 - bad request 
if (!array_filter($data)) {

    http_response_code(400);
    json_encode(array("message" => "Unable to create channel information. Data is incomplete."));
} else {
    // set channel record property values
    $ts->user_id = $data['example-select'];
    $ts->channel = $data['user-channel'];
    $ts->key = $data['user-key'];
    $ts->location = $data['user-location'];
}
// create the channel record, if successful set response code - 201 created
if ($ts->createorUpdate()) {
    http_response_code(201);
    echo json_encode(array("message" => "Channel information was set."));
}

// else unsuccessful, set response code 503 - service unavailable
else {
    http_response_code(503);
    echo json_encode(array("message" => "Unable to set information. Service temporarily down"));
}
