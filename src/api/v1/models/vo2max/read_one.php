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
include_once VO2MAX_MODEL_URL;

// get database connection
$database = new Database();
$db = $database->connect();

// prepare user object
$vo2 = new VO2Max($db);

// set ID property of record to read
$vo2->user_id = isset($_GET['id']) ? $_GET['id'] : die();
$vo2->readOne();

//if record is found, create result array, set success response code - 200 OK and encode JSON array
if ($vo2->user_id != null) {
    $vo2_array = array(
        "user_id" => $vo2->user_id,
        "value" => $vo2->value,
        "status" => $vo2->status,
        "test_date" =>  $vo2->test_date
    );

    http_response_code(200); // set response code - 200 OK
    echo json_encode($vo2_array);
}
// set response code - 404 Not found
else {
    http_response_code(404);
    echo json_encode(array("message:" => "This data has not been updated yet"));
}
