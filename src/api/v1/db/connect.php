<?php
//connect to database
while (!file_exists('config'))
    chdir('..');
require_once 'config/routes.php';
include_once CRED_URL;

//database connection class
class Database
{
    public $conn;
    //test connection
    public function connect()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . SERVER_NAME . ";port=" . SERVER_PORT . ";dbname=" . DB_NAME, SERVER_UNAME, SERVER_PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // turn on error mode for debugging errors
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);  // get maximum sql injection protection
        } catch (Exception $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $this->conn;
    }
}
