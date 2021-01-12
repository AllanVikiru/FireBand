<?php
// required headers
header("Access-Control-Allow-Origin: *"); //file can be read by everyone
header("Content-Type: application/json; charset=UTF-8"); //data returned in JSON format

// include database and object files
include_once '../config/database.php';
include_once '../models/role.php';

// instantiate database and product object
$database = new Database();
$db = $database->connect();

// initialize object
$role = new Role($db);

// read products will be here
// query products
$stmt = $role->readAll();
$num = $stmt->rowCount();

//if result is found, extract details into an array and encode into JSON output
if ($num > 0) {
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
// no products found will be here
else {
    $error_msg = array(
        "message" => "No student records found"
    );
    http_response_code(404); //set response code - 404 NOT FOUND
    echo json_encode($error_msg);
}
