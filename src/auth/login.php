<?php

require_once '../../../fireband/vendor/autoload.php';

use Delight\Auth;
use Delight\Db\PdoDsn;
use Delight\Cookie\Session;

//include_once '../api/config/database.php';
Session::start('Lax');
$db = new PdoDsn('mysql:dbname=test;host=localhost;charset=utf8mb4', 'root', '');
$auth = new Auth\Auth($db);

//pass form values to register students function - remove whitespaces before saving in db
if (isset($_POST["login"])) {
    $email = trim($_POST["log-email"]);
    $password = trim($_POST["log-password"]);
    try {
        $auth->login($email, $password);
        echo '<script language="javascript">';
        echo 'alert("You are now logged in. Welcome!");';
        echo "location.href='../firefighter.php';";
        echo '</script>';
    } catch (Auth\InvalidEmailException $e) {
        echo '<script language="javascript">';
        echo 'alert("You entered the wrong email. Try again.");';
        echo "location.href='../login.php';";
        echo '</script>';
    } catch (Auth\InvalidPasswordException $e) {
        echo '<script language="javascript">';
        echo 'alert("You entered the wrong password. Try again. ");';
        echo "location.href='../login.php';";
        echo '</script>';
    } catch (Auth\TooManyRequestsException $e) {
        echo '<script language="javascript">';
        echo 'alert("You have already sent enough requests. Try again later.");';
        echo "location.href='../login.php';";
        echo '</script>';
    }
}
