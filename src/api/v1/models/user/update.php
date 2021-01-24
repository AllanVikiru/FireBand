<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
while (!file_exists('config'))
    chdir('..');
require_once 'config/routes.php';
include_once DB_CONNECT_URL;
include_once USER_MODEL_URL;

// get database connection
$database = new Database();
$db = $database->connect();

// prepare user object
$user = new User($db);
$personal = new User($db);
$reset = new User($db);

// get id of user to be edited
$data = json_decode(file_get_contents("php://input"), true);

//check if update is from logged in user
if (array_key_exists('my-id', $data)) {
    if ($data['my-id'] != null) {
        $personal->id = $data['my-id']; // set ID property of user to be edited
        // set user property values 
        $personal->username = $data['my-name'];
        $personal->email = $data['my-email'];
        // update the user
        $personal->update();
        http_response_code(200);  // set response code - 200 ok
        echo json_encode(array("message" => "User was updated."));
    } else {
        // if unable to update the user, set response code - 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Unable to update user."));
    }
}
// update is from selected user 
if (array_key_exists('user-id', $data)) {
    if ($data['user-id'] != null) {
        $user->id = $data['user-id'];  // set ID property of user to be edited
        // set user property values 
        $user->username = $data['user-name'];
        $user->email = $data['user-email'];
        // update the user
        $user->update();
        http_response_code(200); // set response code - 200 ok
        echo json_encode(array("message" => "User was updated."));
    } else {
        // if unable to update the user, set response code - 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Unable to update user."));
    }
}
// password reset is from logged in user 
if (array_key_exists('reset-id', $data)) {
    if ($data['reset-id'] != null) {
        $reset->id = $data['reset-id']; // set ID property of user to be edited
        // set user property values 
        $reset->old_password = $data['old-password'];
        $reset->new_password = $data['new-password-confirm'];
        // update the user
        $reset->updatePassword();
        http_response_code(200); // set response code - 200 ok
        echo json_encode(array("message" => "Password was updated."));
    } else {
        // if unable to update the user, set response code - 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Unable to update password."));
    }
}
