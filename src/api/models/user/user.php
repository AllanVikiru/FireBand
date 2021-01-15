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
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $role;
    public $password;
    public $username;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }
    // read all users - superadmin
    public function readAll()
    {
        // select all query 
        $query = 'SELECT u.id, p.first_name, p.last_name, u.email, r.role 
        FROM ((' . $this->table_name . ' u INNER JOIN profiles p ON u.id=p.user_id)
        INNER JOIN roles r ON u.roles_mask=r.role_id)';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function create()
    {

        $auth = new Auth\Auth($this->conn);
        $role_val = new Administration($this->conn);
        $mail = new Mailer();
        
        $this->first_name = htmlspecialchars(strip_tags($this->first_name));
        $this->last_name = htmlspecialchars(strip_tags($this->last_name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->role = htmlspecialchars(strip_tags($this->role));
        $this->password = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 16);

        try {
            $userId = $auth->register(
                $this->email,
                $this->password,
                $this->username = null,
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

            // query to insert record
            $query = 'INSERT INTO profiles (user_id, first_name, last_name, phone) VALUES (?,?,?,?)';
            $stmt = $this->conn->prepare($query); // prepare query
            // bind values
            $stmt->bindParam(1, $userId);
            $stmt->bindParam(2, $this->first_name);
            $stmt->bindParam(3, $this->last_name);
            $stmt->bindParam(4, $this->phone);
            // execute query
            if ($stmt->execute()) {
                return true;
            } else{
                return false;
            }
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
            $query = $this->conn->prepare('SELECT u.id, p.first_name, p.last_name, u.email, p.phone 
            FROM ' . $this->table_name . ' u INNER JOIN profiles p ON u.id=p.user_id WHERE id = ?');
            $query->bindParam(1, $this->id);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);

            // set values to object properties
            $this->first_name = $row['first_name'];
            $this->last_name = $row['last_name'];
            $this->email = $row['email'];
            $this->phone = $row['phone'];
        } catch (Exception $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $query;
    }
    public function update()
    {
        $query = 'UPDATE ' . $this->table_name . ' u INNER JOIN profiles p on u.id=p.user_id 
        SET p.first_name = ?, p.last_name = ?, u.email = ?, p.phone = ?, u.password = ? WHERE id = ?';
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // sanitize
        $this->first_name = htmlspecialchars(strip_tags($this->first_name));
        $this->last_name = htmlspecialchars(strip_tags($this->last_name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->password = password_hash(($this->password), PASSWORD_DEFAULT);
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind new values
        $stmt->bindParam(1, $this->first_name);
        $stmt->bindParam(2, $this->last_name);
        $stmt->bindParam(3, $this->email);
        $stmt->bindParam(4, $this->phone);
        $stmt->bindParam(5, $this->password);
        $stmt->bindParam(6, $this->id);

        // execute the query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function delete()
    {
        $query = 'DELETE u, p FROM ' . $this->table_name . ' u JOIN profiles p ON p.user_id = u.id WHERE id = ?';
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
