<?php
while (!file_exists('config'))
    chdir('..');
require_once 'config/routes.php';
require_once AUTOLOAD_URL;
include_once DB_CONNECT_URL;

use Delight\Auth;
use Delight\Cookie\Session;

Session::start('Lax'); // start session with Lax restrictions

//initiate db, connection and auth objects
$db = new Database();
$conn = $db->connect();
$auth = new Auth\Auth($conn);

try {
    $auth->destroySession(); //destroy session data, logout and redirect to login
    $auth->logOutEverywhere();
    header('Location: ../../../login.php');
    exit;
} catch (Auth\NotLoggedInException $e) {
    $auth->destroySession(); //destroy session data, regenerate session id and redirect to login
    Session::regenerate(true);
    header('Location: ../../../login.php');
    exit;
}
