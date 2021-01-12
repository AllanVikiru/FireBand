<?php
require_once '../../../../vendor/autoload.php';
include_once '../api/config/database.php';

use Delight\Auth;
use Delight\Cookie\Session;
use Delight\Auth\Administration;

Session::start('Lax');
$db = new Database();
$conn = $db->connect();
$auth = new Auth\Auth($conn);
$role = new Administration($conn);

if (isset($_POST["register-user"])) {
    $email = trim($_POST["user-email"]);
    $password = trim($_POST["user-password-confirm"]);

    try {
        $userId = $auth->register(
            $email,
            $pw,
            $username = null,
        );
        $role->addRoleForUserById($userId, $role_mask);

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
