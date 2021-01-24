<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object file
while (!file_exists('config'))
    chdir('..');
require_once 'config/routes.php';
include_once DB_CONNECT_URL;
include_once USER_MODEL_URL;

// get database connection
$database = new Database();
$db = $database->connect();

// prepare user object
$tokens = new User($db);

// try and delete tokens/throttling
if ($tokens->clearTokens()) {
    // if able, set 200 ok
    http_response_code(200);
    echo json_encode(array("message" => "Tokens cleared."));
}
// if unable, set 503 service unavailable
else {
    http_response_code(503);
    echo json_encode(array("message" => "Unable to clear tokens."));
}
