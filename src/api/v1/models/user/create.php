<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// instantiate user and database objects
while (!file_exists('config'))
    chdir('..');
require_once 'config/routes.php';
include_once DB_CONNECT_URL;
include_once USER_MODEL_URL;

//connect to db and prepare user object
$database = new Database();
$db = $database->connect();
$user = new User($db);

// get posted data
$data = json_decode(file_get_contents("php://input"), true);

// make sure data is not empty, else set 400- bad request
if (!array_filter($data)) {

    http_response_code(400);
    json_encode(array("message" => "Unable to create user. Data is incomplete."));
} else {
    // set user property values
    $user->username = $data['new-username'];
    $user->email = $data['new-email'];
    $user->role = $data['example-inline-radios'];
}
// try create the user, if successful set response code - 201 created
if ($user->create()) {
    http_response_code(201);
    echo json_encode(array("message" => "User was created."));
}
// else unsuccessful, set response code 503 - service unavailable
else {
    http_response_code(503);
    echo json_encode(array("message" => "Unable to create user. Service temporarily down"));
}