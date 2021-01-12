<?php
require_once '../../vendor/autoload.php';
include_once '../api/config/database.php';
include_once '../mail/mailer.php';

use Delight\Auth;
use Delight\Cookie\Session;

Session::start('Lax');
$db = new Database();
$conn = $db->connect();
$auth = new Auth\Auth($conn);
$mailer = new Mailer();

$code = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 12);
Session::set('code', $code); //Session::id();

if (isset($_POST["reset"])) {
    $email = trim($_POST["reset-email"]);
    try {
        $auth->forgotPassword($email, function ($selector, $token) {
            global $mailer, $code, $email;

            Session::set('selector', $selector);
            Session::set('token', $token);

            $subject = 'Account Password Reset';
            $body = '<img style="display: block;margin-left: auto;margin-right: auto;width: 50%; max-width: 300px;" src="cid:logo"></img><br/><h1 align=center> Your Verification Code is:</h1><br><h2 style="color:#e74c3c;" align=center>' . $code . '</h2>';
            $altBody = 'Your Activation Code is :' . $code . '';
            $mailer->sendMail($email, $subject, $body, $altBody);

            echo '<script language="javascript">';
            echo 'alert("An activation code has been sent to your email.");';
            echo "location.href='../confirm.php';";
            echo '</script>';
        });
    } catch (Auth\InvalidEmailException $e) {
        echo '<script language="javascript">';
        echo 'alert("You entered the wrong email. Try again.");';
        echo "location.href='../reset.php';";
        echo '</script>';
    } catch (Auth\ResetDisabledException $e) {
        echo '<script language="javascript">';
        echo 'alert("Password reset has been disabled. Contact the system administrator.");';
        echo "location.href='../login.php';";
        echo '</script>';
    } catch (Auth\TooManyRequestsException $e) {
        echo '<script language="javascript">';
        echo 'alert("You have already requested for an activation code. Check your email.");';
        echo "location.href='../reset.php';";
        echo '</script>';
    } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("There was an error in resetting. Try again later.");';
        echo "location.href='../login.php';";
        echo '</script>';
    }
}
