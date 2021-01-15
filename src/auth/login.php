<?php
require_once '../../vendor/autoload.php';
include_once '../api/config/database.php';

use Delight\Auth;
use Delight\Cookie\Session;

Session::start('Lax');
$db = new Database();
$conn = $db->connect();
$auth = new Auth\Auth($conn);
Session::regenerate(true);
//pass form values to register students function - remove whitespaces before saving in db
if (isset($_POST["login"])) {
    $email = trim($_POST["log-email"]);
    $password = trim($_POST["log-password"]);

    try {
        $auth->login($email, $password);
        $id = $auth->getUserId();

        $query = $conn->prepare('SELECT roles_mask FROM users WHERE id = ?');
        $query->bindParam(1, $id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        switch ($result['roles_mask']) {
            case '1':
                header('location:../superadmin.php');
                die();
                break;
            case '2':
                header('location:../commander.php');
                die();
                break;
            default:
                header('location:../firefighter.php');
                die();
        }
    } catch (Auth\InvalidEmailException $e) {
        echo '<script language="javascript">';
        echo 'alert("You entered the wrong email. Try again.");';
        echo "location.href='../login.php';";
        echo '</script>';
    } catch (Auth\InvalidPasswordException $e) {
        echo '<script language="javascript">';
        echo 'alert("You entered the wrong password. Try again.");';
        echo "location.href='../login.php';";
        echo '</script>';
    } catch (Auth\TooManyRequestsException $e) {
        echo '<script language="javascript">';
        echo 'alert("You have already sent enough requests. Try again later.");';
        echo "location.href='../login.php';";
        echo '</script>';
    } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("There was an error in logging in. Try again later.");';
        echo "location.href='../login.php';";
        echo '</script>';
    }
}
