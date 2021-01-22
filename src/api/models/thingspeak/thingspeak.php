<?php
class Thingspeak
{
    // database connection and table name
    private $conn;
    private $table_name = "thingspeak";

    // object properties
    public $user_id;
    public $channel;
    public $key;
    public $location;
    public $id;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // read all roles
    public function readAllUsers()
    {  
        $query = $this->conn->prepare('SELECT * FROM users WHERE roles_mask = 3');
        $query->execute();
        return $query;
    }

    public function readOne()
    {
        try {
            $query = $this->conn->prepare('SELECT * FROM ' . $this->table_name . ' WHERE user_id = ?');
            $query->bindParam(1, $this->user_id);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);

            // set values to object properties
            $this->channel = $row['channel'];
            $this->key = $row['read_key'];
            $this->location = $row['location'];
        } catch (Exception $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $query;
    }

     //insert new role
     public function createorUpdate()
     {
         // query to 
         $query = 'INSERT INTO ' . $this->table_name . ' (user_id,channel,read_key,location) VALUES (?,?,?,?) 
         ON DUPLICATE KEY UPDATE channel=?, read_key=?, location=?';
 
         // prepare query
         $stmt = $this->conn->prepare($query);
 
         $this->user_id = htmlspecialchars(strip_tags($this->user_id));
         $this->channel = htmlspecialchars(strip_tags($this->channel));
         $this->key = htmlspecialchars(strip_tags($this->key));
         $this->location = htmlspecialchars(strip_tags($this->location));

         // bind values
         $stmt->bindParam(1, $this->user_id);
         $stmt->bindParam(2, $this->channel);
         $stmt->bindParam(3, $this->key);
         $stmt->bindParam(4, $this->location);
         $stmt->bindParam(5, $this->channel);
         $stmt->bindParam(6, $this->key);
         $stmt->bindParam(7, $this->location);

         // execute query
         if ($stmt->execute()) {
             return true;
         }
         return false;
     }



}
