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

Session::regenerate(true); //regenerate session ID

//pass form values to login students function - remove whitespaces before saving in db
if (isset($_POST["login"])) {
    $email = trim($_POST["log-email"]);
    $password = trim($_POST["log-password"]);
    //try login 
    try {
        $auth->login($email, $password);

        //fetch credentials if login successful
        $id = $auth->getUserId();
        $mail = $auth->getEmail();
        $username = $auth->getUsername();

        //fetch user role by id
        $query = $conn->prepare('SELECT roles_mask FROM users WHERE id = ?');
        $query->bindParam(1, $id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        //set values to session
        Session::set('id', $id);
        Session::set('email', $mail);
        Session::set('username', $username);
        Session::set('role', $result['roles_mask']);

        //login to dashboard by role
        switch ($result['roles_mask']) {
            case '1':
                header('location: ../../../superadmin.php');
                exit;
                break;
            case '2':
                header('location: ../../../commander.php');
                exit;
                break;
            default:
                header('location: ../../../firefighter.php');
                exit;
        }
    } catch (Auth\InvalidEmailException $e) {
        echo '<script language="javascript">';
        echo 'alert("You entered the wrong email. Try again.");';
        echo "location.href='../../../login.php';";
        echo '</script>';
    } catch (Auth\InvalidPasswordException $e) {
        echo '<script language="javascript">';
        echo 'alert("You entered the wrong password. Try again.");';
        echo "location.href='../../../login.php';";
        echo '</script>';
    } catch (Auth\TooManyRequestsException $e) {
        echo '<script language="javascript">';
        echo 'alert("You have already sent enough requests. Try again later.");';
        echo "location.href='../../../login.php';";
        echo '</script>';
    } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("There was an error in logging in. Try again later.");';
        echo "location.href='../../../login.php';";
        echo '</script>';
    }
}
