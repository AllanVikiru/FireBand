<?php

//database connection class
class Database{ 

    // database connection credentials
    private $servername = "localhost";
    private $port = "3306"; //e.g 3306 for MySQL
    private $username = "root";
    private $password = "";
    private $db = "tester";
    public $conn;

    //test connection
    public function connect(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=". $this->servername .";port=". $this->port . ";dbname=" . $this->db , $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // turn on error mode for debugging errors
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);  // get maximum sql injection protection
        } 
        catch(Exception $e){
            echo "Connection failed: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>