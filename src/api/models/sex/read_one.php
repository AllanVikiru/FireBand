<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
  
// include database and object files
include_once '../../config/database.php';
include_once 'sex.php';

// get database connection
$database = new Database();
$db = $database->connect();
  
//prepare role object, set ID property of record to read and read role details
$sex = new Sex($db);
$sex->sex_id = isset($_GET['id']) ? $_GET['id'] : die();
$sex->readOne();

//if record is found, create result array, set success response code - 200 OK and encode JSON array
if($sex->sex_id!=null){
    $sex_array = array(
        "sex_id" =>  $sex->sex_id,
        "sex" => $sex->sex
    );
    http_response_code(200);
    echo json_encode($sex_array);
} 

//if not found, set error response code - 404 NOT FOUND and set error message
else {
    $error_msg = array(
        "message" => "No records found"
    );
    http_response_code(404); 
    echo json_encode($error_msg);
}