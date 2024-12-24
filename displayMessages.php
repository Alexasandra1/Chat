<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
require_once 'db.php';

$sortField = isset($_GET['sort']) ? $_GET['sort'] : 'created_at';
$sortOrder = isset($_GET['order']) && strtolower($_GET['order']) === 'asc' ? 'ASC' : 'DESC';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 25;
$offset = ($page - 1) * $limit;

 $sql = "SELECT * FROM messages ORDER BY $sortField $sortOrder LIMIT $limit OFFSET $offset";

$result = $connect->query($sql);

echo "<table>";
echo "<tr>
        <th><a href='?sort=username&order=" . ($sortOrder === 'ASC' ? 'desc' : 'asc') . "'>User Name</a></th>
        <th><a href='?sort=email&order=" . ($sortOrder === 'ASC' ? 'desc' : 'asc') . "'>E-mail</a></th>
        <th><a href='?sort=created_at&order=" . ($sortOrder === 'ASC' ? 'desc' : 'asc') . "'>Date</a></th>
        <th>Message</th>
        <th>File</th>
      </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['username']}</td>
            <td>{$row['email']}</td>
            <td>{$row['created_at']}</td>
            <td>{$row['text']}</td>
            <td>";
    if ($row['file_path']) {
        echo "<a href='{$row['file_path']}'>Open file</a>";
    }
    echo "</td></tr>";
}
echo "</table>";

$totalMessages = $connect->query("SELECT COUNT(*) AS count FROM messages")->fetch_assoc()['count'];
$totalPages = ceil($totalMessages / $limit);

echo "<div class='pages'>";
for ($i = 1; $i <= $totalPages; $i++) {
    echo "<a href='?page=$i&sort=$sortField&order=$sortOrder'>$i</a> ";
}
echo "</div>";

echo "<p>Return to the <a href='formChat.php'>chat</a></p>";
?>
</body>
</html>

