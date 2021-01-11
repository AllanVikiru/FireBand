<?php

use Delight\Auth;
use Delight\Cookie\Session;
use Delight\Db\PdoDsn;

require_once '../../vendor/autoload.php';
Session::start('Lax');
Session::id();

$code = Session::get('code');
$selector = Session::get('selector');
$token = Session::get('token');

$db = new PdoDsn('mysql:dbname=test;host=localhost;charset=utf8mb4', 'root', '');

//$database = new Database();
//$db = $database->connect(); $_POST[$mail], $_POST[$pw], $_POST[$username]
$auth = new Auth\Auth($db);

//$ver_code=$_POST['ver_code']; $password=trim($_POST['password']); 
if (isset($_POST["confirm"])) {
    $act_code = trim($_POST["act-code"]);
    $new_password = trim($_POST["new-password-confirm"]);

    if ($act_code !== $code) {
        echo '<script language="javascript">';
        echo 'alert("The code you entered is incorrect. Try again ");';
        echo "location.href='../confirm.php';";
        echo '</script>';
        echo $code;
        die;
    } else {
        if ($auth->canResetPassword($selector, $token)) {
            try {
                $auth->resetPassword($selector, $token, $new_password);
                Session::delete('code');
                echo '<script language="javascript">';
                echo 'alert("Your password has been changed. Login with your new password.");';
                echo "location.href='../login.php';";
                echo '</script>';
            } catch (Auth\InvalidSelectorTokenPairException $e) {
                echo '<script language="javascript">';
                echo 'alert("We have encountered a problem with validating. Try again later.");';
                echo "location.href='../login.php';";
                echo '</script>';
            } catch (Auth\TokenExpiredException $e) {
                echo '<script language="javascript">';
                echo 'alert("Your validation code has expired. Try again later.");';
                echo "location.href='../login.php';";
                echo '</script>';
            } catch (Auth\ResetDisabledException $e) {
                echo '<script language="javascript">';
                echo 'alert("Password reset has been disabled. Contact your system administrator.");';
                echo "location.href='../login.php';";
                echo '</script>';
            } catch (Auth\InvalidPasswordException $e) {
                echo '<script language="javascript">';
                echo 'alert("Your password is invalid. Enter a new one.");';
                echo "location.href='../confirm.php';";
                echo '</script>';
            } catch (Auth\TooManyRequestsException $e) {
                echo '<script language="javascript">';
                echo 'alert("You have already requested for a password reset. Try again later.");';
                echo "location.href='../login.php';";
                echo '</script>';
            }
        }
    }
}
