<?php
namespace Model;

use PDO;
use PDOException;

class Database
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "root";
    private $database = "chatuser";
    private $port = 3307;
    private static $instance = null;
    public $conn = null;

    protected function __construct(){
        $this->connect();
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function connect(){
        try{
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->database . ";port=" . $this->port;
            $this->conn = new PDO($dsn, $this->user, $this->pass);
        }
        catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }      
    }

    public function getConnection(){
        return $this->conn;
    }

    private function __clone() {}
    public function __wakeup() {}
}