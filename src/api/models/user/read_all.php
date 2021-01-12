<?php
// required headers
header("Access-Control-Allow-Origin: *"); //file can be read by everyone
header("Content-Type: application/json; charset=UTF-8"); //data returned in JSON format

// include database and object files
include_once '../config/database.php';
include_once '../models/user.php';


// instantiate database and product object
$database = new Database();
$db = $database->connect();

// initialize object
$user = new User($db);

// read products will be here
// query products
$stmt = $user->readAll();
$num = $stmt->rowCount();

//if result is found, extract details into an array and encode into JSON output
if ($num > 0) {
    $roles_arr = array();
    $roles_arr["records"] = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $role_item = array(
            "id" => $id,
            "name" => $name,
            "role" => $role
        );
        array_push($roles_arr["records"], $role_item);
    }
    http_response_code(200); //set response code - 200 OK
    echo json_encode($roles_arr);
}
// no products found will be here
else {
    $error_msg = array(
        "message" => "No student records found"
    );
    http_response_code(404); //set response code - 404 NOT FOUND
    echo json_encode($error_msg);
}
