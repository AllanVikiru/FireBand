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
include_once THINGSPEAK_MODEL_URL;

// get database connection
$database = new Database();
$db = $database->connect();

// prepare user object, set ID property of record to read & read the details of user to be edited
$ts = new Thingspeak($db);
$ts->user_id = isset($_GET['id']) ? $_GET['id'] : die();
$ts->readOne();

//if record is found, create result array, set success response code - 200 OK and encode JSON array
if ($ts->key != null) {
    // create array
    $ts_array = array(
        "user_id" =>  $ts->user_id,
        "channel" => $ts->channel,
        "key" => $ts->key,
        "location" => $ts->location
    );
    http_response_code(200);
    echo json_encode($ts_array);
}

//if not found, set error response code - 404 NOT FOUND and set error message
else {
    http_response_code(404);
    echo json_encode(array("message" => "This data has not been updated yet"));
}
