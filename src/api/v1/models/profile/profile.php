<?php
class Profile
{
    // database connection and table name
    private $conn;
    private $table_name = "profiles";

    // object properties
    public $id;
    public $user_id;
    public $dob;
    public $sex_id;
    public $weight;
    public $height;
    public $profile;
    public $age;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //insert or create new profile
    public function createorUpdate()
    {
        // set and prepare query
        $query = 'INSERT INTO ' . $this->table_name . ' (user_id,dob,sex_id,weight,height) VALUES (?,?,?,?,?) 
        ON DUPLICATE KEY UPDATE dob=?, sex_id=?, weight=?,height=?';

        $stmt = $this->conn->prepare($query);

        //sanitise and bind values 
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $this->dob = htmlspecialchars(strip_tags($this->dob));
        $this->sex_id = htmlspecialchars(strip_tags($this->sex_id));
        $this->weight = htmlspecialchars(strip_tags($this->weight));
        $this->height = htmlspecialchars(strip_tags($this->height));

        $stmt->bindParam(1, $this->user_id);
        $stmt->bindParam(2, $this->dob);
        $stmt->bindParam(3, $this->sex_id);
        $stmt->bindParam(4, $this->weight);
        $stmt->bindParam(5, $this->height);
        $stmt->bindParam(6, $this->dob);
        $stmt->bindParam(7, $this->sex_id);
        $stmt->bindParam(8, $this->weight);
        $stmt->bindParam(9, $this->height);

        // execute query 
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function readOne()
    {
        try {
            // set, prepare and bind parameter to query
            $query = $this->conn->prepare('SELECT * FROM ' . $this->table_name . ' WHERE user_id = ?');
            $query->bindParam(1, $this->user_id);

            //execute query and fetch matching row
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);

            // set row values to object properties
            $this->user_id = $row['user_id'];
            $this->dob = $row['dob'];
            $this->sex_id = $row['sex_id'];
            $this->weight = $row['weight'];
            $this->height = $row['height'];

            //calculate age and set to age property
            $age = date_diff(date_create($this->dob), date_create('today'))->y;
            $this->age = $age;
            
        } catch (Exception $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $query;
    }
}