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

    // read all firefighters and vo2max values and statuses
    public function readAll()
    {
        try {
            $query = $this->conn->prepare('SELECT * FROM  users u  LEFT JOIN ' . $this->table_name . ' v on u.id = v.user_id WHERE u.roles_mask = 3');
            $query->execute();
        } catch (Exception $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $query;
    }

    //insert or create new vo2max status
    public function createorUpdate()
    {
        // set and prepare query
        $query = 'INSERT INTO ' . $this->table_name . ' (user_id,value,status,test_date) VALUES (?,?,?,?) 
        ON DUPLICATE KEY UPDATE value=?, status=?, test_date=?';

        $stmt = $this->conn->prepare($query);

        //sanitise and bind values 
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $this->value = htmlspecialchars(strip_tags($this->value));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->test_date = htmlspecialchars(strip_tags($this->test_date));

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

    //read one status
    public function readOne()
    {
        try {
            $query = $this->conn->prepare('SELECT * FROM ' . $this->table_name . ' WHERE user_id = ?');
            $query->bindParam(1, $this->user_id);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);

            // set values to object properties
            $this->user_id = $row['user_id'];
            $this->value = $row['value'];
            $this->status = $row['status'];
            $this->test_date = $row['test_date'];
        } catch (Exception $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $query;
    }
}
