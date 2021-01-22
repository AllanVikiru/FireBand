<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../../config/database.php';
include_once 'vo2max.php';

// get database connection
$database = new Database();
$db = $database->connect();

// prepare user object
$vo2 = new VO2Max($db);

// set ID property of record to read
$vo2->user_id = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of user to be edited
$vo2->readOne();

if ($vo2->user_id != null) {
    // create array
    $vo2_array = array(
        "user_id" => $vo2->user_id,
        "value" => $vo2->value,
        "status" => $vo2->status,
        "test_date" =>  $vo2->test_date
    );
    // set response code - 200 OK and encode to JSON
    http_response_code(200);
    echo json_encode($vo2_array);
} else {
    // set service unavailable to show data not updated
    http_response_code(404);
    // make it json format
    echo json_encode(array("message:" => "This data has not been updated yet"));
}
