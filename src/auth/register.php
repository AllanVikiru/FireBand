<?php
require_once '../vendor/autoload.php';
use Delight\Auth;
use Delight\Db\PdoDsn;
//namespace Delight\Db;


//include_once '../api/config/database.php';
$db = new PdoDsn('mysql:dbname=test;host=localhost;charset=utf8mb4', 'root', '');

//$database = new Database();
//$db = $database->connect(); $_POST[$mail], $_POST[$pw], $_POST[$username]
$auth = new Auth\Auth($db);
$mail = 'vikiruallan12@gmail.com';
$username = "uname";
$pw = 'password';
try {
    $userId = $auth->register(
        $mail,
        $pw,
        $username = null,
        
    );

    echo 'We have signed up a new user with the ID ' . $userId;
} catch (Auth\InvalidEmailException $e) {
    die('Invalid email address');
} catch (Auth\InvalidPasswordException $e) {
    die('Invalid password');
} catch (Auth\UserAlreadyExistsException $e) {
    die('User already exists');
} catch (Auth\TooManyRequestsException $e) {
    die('Too many requests');
}
