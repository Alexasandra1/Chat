<?php
namespace Controller;
require_once __DIR__ . '/../autoload.php';
use Model\Database;

class messageDB
{
    private $conn;

    public function __construct(){
        $this->conn = Database::getInstance()->getConnection();
    }

    public function sendMessage($username, $email, $text, $filePath){
        if (empty($username) || empty($email) || empty($text)) {
            echo "Заполните все поля";
        } else {
            if (!empty($_FILES['file']['name'])) {
                $file = $_FILES['file'];
                $fileName = $file['name'];
                $fileTmpName = $file['tmp_name'];
                $fileSize = $file['size'];
                $fileError = $file['error'];
        
                $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                $allowedExts = ['jpg', 'png', 'gif', 'txt'];
        
                if (in_array($fileExt, $allowedExts)) {
                    if ($fileError === 0) {
                        if ($fileExt === 'txt' && $fileSize <= 102400) {
                            $filePath = "../uploads/" . uniqid('', true) . "." . $fileExt;
                            move_uploaded_file($fileTmpName, $filePath);
                        } elseif (in_array($fileExt, ['jpg', 'png', 'gif'])) {
                            $imageSize = getimagesize($fileTmpName);
        
                            if ($imageSize[0] <= 320 && $imageSize[1] <= 240) {
                                $filePath = "../uploads/" . uniqid('', true) . "." . $fileExt;
                                move_uploaded_file($fileTmpName, $filePath);
                            } else {
                                echo "Image resolution exceeds 320x240.";
                                exit();
                            }
                        } else {
                            echo "File size exceeds limit.";
                            exit();
                        }
                    } else {
                        echo "File upload error.";
                        exit();
                    }
                } else {
                    echo "Invalid file type.";
                    exit();
                }
            }
        
            $sql = "INSERT INTO messages 
            (username, email, text, file_path) 
            VALUES (:username, :email, :text, :file_path)";

            $stmt  = $this->conn->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':text', $text);
            $stmt->bindParam(':file_path', $filePath);
            $executeQuery = $stmt->execute();

            if ($executeQuery === TRUE) {
                header("Location: ../View/formChat.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $connect->error;
            }
        }
    }
}

$username = $_POST['username'];
$email = $_POST['email'];
$text = strip_tags($_POST['text']);
$filePath = '';

$messageDB = new messageDB();
$messageDB->sendMessage($username, $email, $text, $filePath);

?>
