<?php
class Sex
{
    // database connection and table name
    private $conn;
    private $table_name = "sex";

    // object properties
    public $sex_id;
    public $sex;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // read all sexes
    public function readAll()
    {  
        $query = $this->conn->prepare('SELECT * FROM ' . $this->table_name . '');
        $query->execute();
        return $query;
    }


    public function readOne()
    {
        try {
            $query = $this->conn->prepare('SELECT * FROM ' . $this->table_name . ' WHERE sex_id = ?');
            $query->bindParam(1, $this->sex_id);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);

            // set values to object properties
            $this->sex = $row['sex'];
        } catch (Exception $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $query;
    }

}
