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
include_once PROFILE_MODEL_URL;

// get database connection
$database = new Database();
$db = $database->connect();

// prepare user object
$profile = new Profile($db);

// set ID property of record to read
$profile->user_id = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of user to be edited
$profile->readOne();

if ($profile->user_id != null) {
    // create array of profile details
    $profile_array = array(
        "user_id" =>  $profile->user_id,
        "dob" =>  $profile->dob,
        "sex_id" =>  $profile->sex_id,
        "weight" => $profile->weight,
        "height" => $profile->height,
        "age" => $profile->age
    );
    // set response code - 200 OK and encode response
    http_response_code(200);
    echo json_encode($profile_array);
} else {
    // set 404 not found to encode data not available 
    http_response_code(404);
    echo json_encode(array("message:" => "This data has not been updated yet"));
}
