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
include_once ROLE_MODEL_URL;

// get database connection 
$database = new Database();
$db = $database->connect();

//prepare role object, set ID property of record to read and read role details
$role = new Role($db);
$role->role_id = isset($_GET['id']) ? $_GET['id'] : die();
$role->readOne();

//if record is found, create role array, set success response code - 200 OK and encode JSON array
if ($role->role_id != null) {
    $role_array = array(
        "role_id" =>  $role->role_id,
        "role" => $role->role
    );
    http_response_code(200);
    echo json_encode($role_array);
}

//if not found, set error response code - 404 NOT FOUND and set error message
else {
    $error_msg = array(
        "message" => "No records found"
    );
    http_response_code(404);
    echo json_encode($error_msg);
}
