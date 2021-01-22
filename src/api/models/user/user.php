<?php
require_once '../../../../vendor/autoload.php';
include_once '../../../mail/mailer.php';

use Delight\Auth;
use Delight\Auth\Administration;

class User
{
    // database connection and table name
    private $conn;
    private $table_name = "users";

    // object properties
    public $id;
    public $email;
    public $phone;
    public $role;
    public $password;
    public $username;
    public $old_password;
    public $new_password;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }
    // read all users - superadmin
    public function readAll()
    {
        // select all query 
        $query = 'SELECT u.id, u.username, u.email, r.role FROM ' . $this->table_name . ' u JOIN roles r ON u.roles_mask=r.role_id';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create()
    {
        $auth = new Auth\Auth($this->conn);
        $role_val = new Administration($this->conn);
        $mail = new Mailer();

        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->role = htmlspecialchars(strip_tags($this->role));
        $this->password = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 16);

        try {
            $userId = $auth->register(
                $this->email,
                $this->password,
                $this->username
            );
            $role_val->addRoleForUserById($userId, $this->role);

            $subject = "New Account Registered";
            $body = '
            <h1 align=center> Welcome to FireBand!</h1><br>
            <h3>Use these credentials to login:<h3><br>
            <h2 align=center>Email:<span style="color:#e74c3c;">' . $this->email . '</span></h2><br>
            <h2 align=center>Password:<span style="color:#e74c3c;">' . $this->password . '</span></h2><br/>
            <h3><i>Do not share this information with anyone</i><h3>';
            $altBody = 'Use these credentials to login: Email:' . $this->email . ', Password:' . $this->password . '. Do not share this information with anyone';
            $mail->sendMail($this->email, $subject, $body, $altBody);

            return true;
        } catch (Auth\InvalidEmailException $e) {
            echo json_encode(array("error" => "You entered the wrong email. Try again"));
            return false;
        } catch (Auth\InvalidPasswordException $e) {
            echo json_encode(array("error" => "The password could not be generated. Try again"));
            return false;
        } catch (Auth\UserAlreadyExistsException $e) {
            echo json_encode(array("error" => "A user already exists with this email. Try again"));
            return false;
        } catch (Auth\TooManyRequestsException $e) {
            echo json_encode(array("error" => "You have sent enough requests. Try again later"));
            return false;
        } catch (Exception $e) {
            echo json_encode(array("error" => "There was an error in registration. Try again later"));
            return false;
        }
    }
    public function readOne()
    {
        try {
            $query = $this->conn->prepare('SELECT u.id, u.username, u.email
            FROM ' . $this->table_name . ' u WHERE id = ?');
            $query->bindParam(1, $this->id);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);

            // set values to object properties
            $this->username = $row['username'];
            $this->email = $row['email'];
        } catch (Exception $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $query;
    }
    public function update()
    {
        $query = 'UPDATE ' . $this->table_name . ' u  
        SET u.username = ?,  u.email = ? WHERE id = ?';
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // sanitize
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));

        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind new values
        $stmt->bindParam(1, $this->username);
        $stmt->bindParam(2, $this->email);
        $stmt->bindParam(3, $this->id);


        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function updatePassword()
    {
        $auth = new Auth\Auth($this->conn);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->old_password = htmlspecialchars(strip_tags($this->old_password));
        $this->new_password = htmlspecialchars(strip_tags($this->new_password));

        try {
            $auth->admin()->changePasswordForUserById($this->id, $this->new_password);
            return true;
        } catch (Auth\UnknownIdException $e) {
            echo json_encode(array("error" => "Unknown ID"));
            return false;
        } catch (Auth\InvalidPasswordException $e) {
            echo json_encode(array("error" => "Invalid password"));
            return false;
        }
    }

    public function delete()
    {
        $query = 'DELETE u FROM ' . $this->table_name . ' u WHERE u.id = ?';
        $stmt = $this->conn->prepare($query); 
        // sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(1, $this->id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function clearTokens()
    {
        $query = 'DELETE FROM  users_throttling';
        $stmt = $this->conn->prepare($query); 
        // execute query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
