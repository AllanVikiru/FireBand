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
include_once PROFILE_MODEL_URL;

// get database connection
$database = new Database();
$db = $database->connect();

// prepare profile object
$profile = new Profile($db);

// get id of user to be edited
$data = json_decode(file_get_contents("php://input"), true);

// set ID property of user to be edited
$profile->user_id = $data['user-profile-id'];

// set user property values 
// set date format from selected date
$timestamp = strtotime($data['example-datepicker2']);
$new_date = date("Y-m-d", $timestamp);

$profile->dob = $new_date;
$profile->weight = $data['weight'];
$profile->height = $data['height'];
$profile->sex_id = $data['example-inline-radios'];

if (!array_filter($data)) {
    // set 400 bad request and encode incomplete request
    http_response_code(400);
    json_encode(array("message" => "Unable to update profile. Data is incomplete."));
} else {
    // try profile update 
    if ($profile->createorUpdate()) {

        // set 200 ok and encode updated response
        http_response_code(200);
        echo json_encode(array("message" => "User was updated."));
    } else {
        // set 503 service unavailable and encode unable to update response
        http_response_code(503);
        echo json_encode(array("message" => "Unable to update user."));
    }
}
