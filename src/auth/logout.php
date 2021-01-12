<?php
require_once '../../../fireband/vendor/autoload.php';
include_once '../api/config/database.php';

use Delight\Auth;
use Delight\Cookie\Session;

Session::start('Lax');
$db = new Database();
$conn = $db->connect();
$auth = new Auth\Auth($conn);

try {  //echo Session::id();
    $auth->logOutEverywhere();
    header('location:../index.php');
} catch (Auth\NotLoggedInException $e) { //echo Session::id() //die('Not logged in');  
    header('location:../index.php');
    Session::regenerate(true);
}
