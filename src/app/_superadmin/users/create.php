<?php
require_once '../../../../vendor/autoload.php';
include_once '../../../api/config/database.php';
include_once '../../../mail/mailer.php';

use Delight\Auth;
use Delight\Cookie\Session;
use Delight\Auth\Administration;

Session::start('Lax');
$db = new Database();
$conn = $db->connect();
$auth = new Auth\Auth($conn);
$role = new Administration($conn);
$mail = new Mailer();

if (isset($_POST["register"])) {
    $first_name = trim($_POST["new-firstname"]);
    $last_name = trim($_POST["new-lastname"]);
    $email = trim($_POST["new-email"]);
    $phone = trim($_POST["new-phone"]);
    $role_val = trim($_POST["example-inline-radios"]);
    $password = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 16);
    
    try {
        $userId = $auth->register(
            $email,
            $password,
            $username = null,
        );
        $role->addRoleForUserById($userId, $role_val);
        //<img style="display: block;margin-left: auto;margin-right: auto;width: 50%; max-width: 300px;" src="cid:logo"></img><br/>
        $subject = "New Account Registered";
        $body = '
        <h1 align=center> Welcome to FireBand!</h1><br>
        <h3>Use these credentials to login:<h3><br>
        <h2 align=center>Email:<span style="color:#e74c3c;">' . $email . '</span></h2><br>
        <h2 align=center>Password:<span style="color:#e74c3c;">' . $password . '</span></h2><br/>
        <h3><i>Do not share this information with anyone</i><h3>';
        $altBody = 'Use these credentials to login: Email:' . $email . ', Password:' . $password . '. Do not share this information with anyone';
        $mail->sendMail($email, $subject, $body, $altBody);

        $query = 'INSERT INTO profiles (user_id, first_name, last_name, phone) VALUES (?,?,?,?)';
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $userId);
        $stmt->bindParam(2, $first_name);
        $stmt->bindParam(3, $last_name);
        $stmt->bindParam(4, $phone);
        $stmt->execute();

        echo '<script language="javascript">';
        echo 'alert("User successfully registered.");';
        echo '</script>';
        die();
    } catch (Auth\InvalidEmailException $e) {
        echo '<script language="javascript">';
        echo 'alert("You entered the wrong email. Try again.");';
        echo '</script>';
        die();
    } catch (Auth\InvalidPasswordException $e) {
        echo '<script language="javascript">';
        echo 'alert("You entered the wrong password. Try again.");';
        echo '</script>';
        die();
    } catch (Auth\UserAlreadyExistsException $e) {
        echo '<script language="javascript">';
        echo 'alert("This user already exists. Try again.");';
        echo '</script>';
        die();
    } catch (Auth\TooManyRequestsException $e) {
        echo '<script language="javascript">';
        echo 'alert("You have already sent enough requests. Try again later.");';
        echo '</script>';
        die();
    } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("There was an error in registration. Try again later.");';
        echo '</script>';
        die();
    }
}