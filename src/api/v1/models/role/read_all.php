<?php
// required headers
header("Access-Control-Allow-Origin: *"); //file can be read by everyone
header("Content-Type: application/json; charset=UTF-8"); //data returned in JSON format

// include database and object files
while (!file_exists('config'))
    chdir('..');
require_once 'config/routes.php';
include_once DB_CONNECT_URL;
include_once ROLE_MODEL_URL;

// instantiate database and product object
$database = new Database();
$db = $database->connect();

// initialize role object
$role = new Role($db);

// query all roles
$stmt = $role->readAll();
$count = $stmt->rowCount();

//if result is found, extract details into an array and encode into JSON output
if ($count > 0) {
    $roles_array = array();
    $roles_array["records"] = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $item = array(
            "role_id" => $role_id,
            "role" => $role
        );
        array_push($roles_array["records"], $item);
    }
    http_response_code(200); //set response code - 200 OK
    echo json_encode($roles_array);
}
//if not found, set error response code 404 and encode error message
else {
    $error_msg = array(
        "message" => "No records found"
    );
    http_response_code(404);
    echo json_encode($error_msg);
}
