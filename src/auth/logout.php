<?php

use Delight\Auth;
use Delight\Db\PdoDsn;
use Delight\Cookie\Session;

require_once '../../vendor/autoload.php';
//include_once '../api/config/database.php';
Session::start('Lax');
$db = new PdoDsn('mysql:dbname=test;host=localhost;charset=utf8mb4', 'root', '');

$auth = new Auth\Auth($db);

try {
    $auth->logOutEverywhere();
    //echo Session::id();
    
} catch (Auth\NotLoggedInException $e) {
    //echo Session::id();
    die('Not logged in');
    
}
