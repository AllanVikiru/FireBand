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
$ts = new Profile($db);

// get id of user to be edited
$data = json_decode(file_get_contents("php://input"), true);

// set ID property of user to be edited
$ts->user_id = $data['user-id'];

// set thingspeak property values 
$ts->channel = $data['ff-channel'];
$ts->key = $data['ff-key'];


if (!array_filter($data)) {

    http_response_code(400);
    json_encode(array("message" => "Unable to update information. Data is incomplete."));
} else {
    // update the user
    if ($ts->createorUpdate()) {
        // set response code - 200 ok
        http_response_code(200);
        // tell the user
        echo json_encode(array("message" => "Info was updated."));
    }
    // if unable to update the user, tell the user
    else {
        // set response code - 503 service unavailable
        http_response_code(503);
        // tell the user
        echo json_encode(array("message" => "Unable to update information. Service is down"));
    }
}
