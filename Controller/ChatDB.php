<?php
namespace Controller;
require_once __DIR__ . '/../autoload.php';
use Model\Database;

class ChatDB{
    private $conn;

    public function __construct(){
        $this->conn = Database::getInstance()->getConnection();
    }

    public function getMessages($sortField, $sortOrder, $limit, $offset) {
        $sql = "SELECT * FROM messages ORDER BY $sortField $sortOrder LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':limit', $limit, \PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function bbcodeToHtml($text) {
        $text = preg_replace('/\*\*(.*?)\*\*/is', '<b>$1</b>', $text);
        $text = preg_replace('/\*(.*?)\*/is', '<i>$1</i>', $text);
        return $text;
    }

    public function totalMessages(){
       return $this->conn->query("SELECT COUNT(*) AS count FROM messages")->fetch(\PDO::FETCH_ASSOC)['count'];
    }
}



