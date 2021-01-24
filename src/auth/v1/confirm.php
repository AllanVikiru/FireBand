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

//fetch activation code, selector and token
$code = Session::get('code');
$selector = Session::get('selector');
$token = Session::get('token');

//fetch form values and trim
if (isset($_POST["confirm"])) {
    $act_code = trim($_POST["act-code"]);
    $new_password = trim($_POST["new-password-confirm"]);

    //check if activation code matches
    if ($act_code !== $code) {
        echo '<script language="javascript">';
        echo 'alert("The code you entered is incorrect. Try again ");';
        echo "location.href='../../../confirm.php';";
        echo '</script>';
        echo $code;
        die;
    } 
    else {
        //try password reset
        if ($auth->canResetPassword($selector, $token)) {
            try {
                $auth->resetPassword($selector, $token, $new_password);
                Session::delete('code');
                echo '<script language="javascript">';
                echo 'alert("Your password has been changed. Login with your new password.");';
                echo "location.href='../../../login.php';";
                echo '</script>';
            } catch (Auth\InvalidSelectorTokenPairException $e) {
                echo '<script language="javascript">';
                echo 'alert("We have encountered a problem with validating. Try again later.");';
                echo "location.href='../../../login.php';";
                echo '</script>';
            } catch (Auth\TokenExpiredException $e) {
                echo '<script language="javascript">';
                echo 'alert("Your validation code has expired. Try again later.");';
                echo "location.href='../../../login.php';";
                echo '</script>';
            } catch (Auth\ResetDisabledException $e) {
                echo '<script language="javascript">';
                echo 'alert("Password reset has been disabled. Contact your system administrator.");';
                echo "location.href='../../../login.php';";
                echo '</script>';
            } catch (Auth\InvalidPasswordException $e) {
                echo '<script language="javascript">';
                echo 'alert("Your password is invalid. Enter a new one.");';
                echo "location.href='../../../confirm.php';";
                echo '</script>';
            } catch (Auth\TooManyRequestsException $e) {
                echo '<script language="javascript">';
                echo 'alert("You have already requested for a password reset. Try again later.");';
                echo "location.href='../../../login.php';";
                echo '</script>';
            } catch (Exception $e) {
                echo '<script language="javascript">';
                echo 'alert("There was an error in confirmation. Try again later.");';
                echo "location.href='../../../login.php';";
                echo '</script>';
            }
        }
    }
}
