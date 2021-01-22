<?php
require_once '../../../fireband/vendor/autoload.php';
include_once '../api/config/database.php';

use Delight\Auth;
use Delight\Cookie\Session;

Session::start('Lax');
$db = new Database();
$conn = $db->connect();
$auth = new Auth\Auth($conn);

try {  
    $auth->destroySession();
    $auth->logOutEverywhere();
    header('location:../index.php');
    exit;
} catch (Auth\NotLoggedInException $e) { 
    $auth->destroySession();
    Session::regenerate(true);
    header('location:../index.php');
    exit;
}
