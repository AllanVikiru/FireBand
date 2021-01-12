<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object files
include_once '../config/database.php';
include_once '../models/role.php';

// prepare database connection and role objects
$database = new Database();
$db = $database->connect();
$role = new Role($db);
  
// get and set id of role to be edited 
$data = json_decode(file_get_contents("php://input"));
$role->role_id = $data->role_id;
  
// set role property values
$role->role = $data->role;
  
// update the role set response code - 200 OK
if($role->update()){
    http_response_code(200);
    echo json_encode(array("message" => "Role was updated."));
}
// if unable to update the user, set response code - 503 Service Unavailable
else{
    http_response_code(503);
    echo json_encode(array("message" => "Unable to update role."));
}
?>