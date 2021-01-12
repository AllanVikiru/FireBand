<?php
class Role
{
    // database connection and table name
    private $conn;
    private $table_name = "vo2max";

    // object properties
    public $role_id;
    public $role;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // read all roles
    function readAll()
    {  
        $query = $this->conn->prepare('SELECT * FROM ' . $this->table_name . '');
        $query->execute();
        return $query;
    }

    //insert new role
    function create()
    {
        // query to 
        $query = 'INSERT INTO ' . $this->table_name . ' (role) VALUES (?)';

        // prepare query
        $stmt = $this->conn->prepare($query);
        // bind values
        $stmt->bindParam(1, $this->role);

        // execute query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function readOne()
    {
        try {
            $query = $this->conn->prepare('SELECT * FROM ' . $this->table_name . ' WHERE role_id = ?');
            $query->bindParam(1, $this->role_id);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);

            // set values to object properties
            $this->role = $row['role'];
        } catch (Exception $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $query;
    }
    
    public function update()
    {
        $query = 'UPDATE ' . $this->table_name . ' SET role = ? WHERE role_id = ?';
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->role = htmlspecialchars(strip_tags($this->role));
        $this->role_id = htmlspecialchars(strip_tags($this->role_id));

        // bind new values
        $stmt->bindParam(1, $this->role);
        $stmt->bindParam(2, $this->role_id);

        // execute the query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE role_id = ?";
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->role_id = htmlspecialchars(strip_tags($this->role_id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->role_id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

}
