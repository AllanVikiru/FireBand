<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../../config/database.php';
include_once 'thingspeak.php';

// get database connection
$database = new Database();
$db = $database->connect();

// prepare user object
$ts = new Thingspeak($db);

// set ID property of record to read
$ts->user_id = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of user to be edited
$ts->readOne();

if ($ts->key!= null) {
    // create array
    $ts_array = array(
        "user_id" =>  $ts->user_id,
        "channel" => $ts->channel,
        "key" => $ts->key,
        "location" => $ts->location
    );
    // set response code - 200 OK and encode to JSON
    http_response_code(200);
    echo json_encode($ts_array);
} else {
    // set not found to show data not updated
    http_response_code(404);
    // make it json format
    echo json_encode(array("message" => "This data has not been updated yet"));
}
