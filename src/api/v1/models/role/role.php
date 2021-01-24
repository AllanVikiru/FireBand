<?php
class Role
{
    // database connection and table name
    private $conn;
    private $table_name = "roles";

    // object properties
    public $role_id;
    public $role;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // fetch all roles
    function readAll()
    {
        try {
            $query = $this->conn->prepare('SELECT * FROM ' . $this->table_name . '');
            $query->execute();
        } catch (Exception $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $query;
    }

    // fetch one role
    public function readOne()
    {
        try {
            $query = $this->conn->prepare('SELECT * FROM ' . $this->table_name . ' WHERE role_id = ?');
            $query->bindParam(1, $this->role_id);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);

            // set value to row object
            $this->role = $row['role'];
        } catch (Exception $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $query;
    }
}
