<?php
class VO2Max
{
    // database connection and table name
    private $conn;
    private $table_name = "vo2max";

    // object properties
    public $id;
    public $user_id;
    public $value;
    public $status;
    public $test_date;
   
    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // read all roles
    public function readAll()
    {  
        $query = $this->conn->prepare('SELECT * FROM ' . $this->table_name . '');
        $query->execute();
        return $query;
    }

    //insert new role
    public function createorUpdate()
    {
        // query to 
        $query = 'INSERT INTO ' . $this->table_name . ' (user_id,value,status,test_date) VALUES (?,?,?,?) 
        ON DUPLICATE KEY UPDATE value=?, status=?, test_date=?';

        // prepare query
        $stmt = $this->conn->prepare($query);

        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $this->value = htmlspecialchars(strip_tags($this->value));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->test_date = htmlspecialchars(strip_tags($this->test_date));

        // bind values
        $stmt->bindParam(1, $this->user_id);
        $stmt->bindParam(2, $this->value);
        $stmt->bindParam(3, $this->status);
        $stmt->bindParam(4, $this->test_date);
        $stmt->bindParam(5, $this->value);
        $stmt->bindParam(6, $this->status);
        $stmt->bindParam(7, $this->test_date);
        
        // execute query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

}
