<?php
namespace Controller;
require_once __DIR__ . '/../autoload.php';
use Model\Database;

class loginDB
{
    private $conn;

    public function __construct(){
        $this->conn = Database::getInstance()->getConnection();
    }

    public function authorization($login, $password){
        if (empty($login) || empty($password)) {
            echo "Заполните все поля";
            return false;
        }else {        
            $sql = "SELECT * FROM users WHERE login = :login AND pass = :password";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
        
            if ($stmt->rowCount() > 0) {
                // while($row = $result->fetch_assoc()) {
                    header("Location: ../View/formChat.php"); 
                    exit();
                // }
            } else {
                echo "Not found users";
            }
        }
    }
}

$login = $_POST['login'];
$password = $_POST['password'];

$loginDB = new loginDB();
$loginDB->authorization($login, $password);