<?php
// required headers
header("Access-Control-Allow-Origin: *"); //file can be read by everyone
header("Content-Type: application/json; charset=UTF-8"); //data returned in JSON format

// include database and object files
while (!file_exists('config'))
    chdir('..');
require_once 'config/routes.php';
include_once DB_CONNECT_URL;
include_once THINGSPEAK_MODEL_URL;

// instantiate database and product object
$database = new Database();
$db = $database->connect();

// initialize object
$ts = new Thingspeak($db);

// query all users 
$stmt = $ts->readAllUsers();
$num = $stmt->rowCount();

//if result is found, extract details into an array and encode into JSON output
if ($num > 0) {
    $users_arr = array();
    $users_arr["records"] = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $user_item = array(
            "id" => $id,
            "username" => $username,
        );
        array_push($users_arr["records"], $user_item);
    }
    http_response_code(200); //set response code - 200 OK
    echo json_encode($users_arr);
}
//if not found, set error response code 404 and encode error message
else {
    $error_msg = array(
        "message" => "No user records found"
    );
    http_response_code(404); //set response code - 404 NOT FOUND
    echo json_encode($error_msg);
}
