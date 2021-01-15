<?php
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

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }
    // read all users - superadmin
    function readAll()
    {
        // select all query 
        $query = 'SELECT u.id, p.first_name, p.last_name, u.email, r.role 
        FROM ((' . $this->table_name . ' u INNER JOIN profiles p ON u.id=p.user_id)
        INNER JOIN roles r ON u.roles_mask=r.role_id)';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    function create()
    {
        // query to insert record
        $query = 'INSERT INTO ' . $this->table_name . ' (name,role) VALUES (?,?)';

        // prepare query
        $stmt = $this->conn->prepare($query);
        // bind values
        $stmt->bindParam(1, $this->name);
        $stmt->bindParam(2, $this->role);

        // execute query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function readOne()
    {
        try {
            $query = $this->conn->prepare('SELECT u.id, p.first_name, p.last_name, u.email, p.phone 
            FROM ' . $this->table_name . ' u INNER JOIN profiles p ON u.id=p.user_id');
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
        $query = 'UPDATE ' . $this->table_name . ' SET name = ?, role = ? WHERE id = ?';
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // sanitize
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->role = htmlspecialchars(strip_tags($this->role));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind new values
        $stmt->bindParam(1, $this->name);
        $stmt->bindParam(2, $this->role);
        $stmt->bindParam(3, $this->id);

        // execute the query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
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
