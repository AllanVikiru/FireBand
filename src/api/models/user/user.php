<?php
class User
{
    // database connection and table name
    private $conn;
    private $table_name = "test";

    // object properties
    public $id;
    public $name;
    public $role;
    public $email;
    public $phone;
    public $password;
    public $created;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }
    // read products
    function readAll()
    {
        // select all query 
        $query = 'SELECT t.id, t.name, r.role FROM ' . $this->table_name . ' t INNER JOIN roles r ON t.role=r.role_id';

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
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
            $query = $this->conn->prepare('SELECT t.id, t.name, r.role FROM ' . $this->table_name . ' t INNER JOIN roles r ON t.role=r.role_id WHERE id = ?');
            $query->bindParam(1, $this->id);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);

            // set values to object properties
            $this->name = $row['name'];
            $this->role = $row['role'];
            
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
