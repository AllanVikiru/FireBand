<?php
// required headers
header("Access-Control-Allow-Origin: *"); //file can be read by everyone
header("Content-Type: application/json; charset=UTF-8"); //data returned in JSON format

// include database and object files
include_once '../../config/database.php';
include_once 'vo2max.php';


// instantiate database and product object
$database = new Database();
$db = $database->connect();

// initialize object
$vo2max = new VO2Max($db);

// read products will be here
// query products
$stmt = $vo2max->readAll();
$num = $stmt->rowCount();

//if result is found, extract details into an array and encode into JSON output
if ($num > 0) {
    $users_array = array();
    $users_array["records"] = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $user_item = array(
            "id" => $user_id,
            "username" => $username,
            "status" => $status,
            "test_date" => $test_date  
        );
        array_push($users_array["records"], $user_item);
    }
    http_response_code(200); //set response code - 200 OK
    echo json_encode($users_array);
}
// no products found will be here
else {
    $error_msg = array(
        "message" => "No user records found"
    );
    http_response_code(404); //set response code - 404 NOT FOUND
    echo json_encode($error_msg);
}
