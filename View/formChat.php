<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Чат</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php 
require_once __DIR__ . '/../autoload.php';
use Controller\ChatDB;

?>
    <h1>Welcome to the chat!</h1>
    <form id="messageForm" action="../Controller/messageDB.php" method="post" enctype="multipart/form-data">
        <input type="text" name="username" placeholder="User Name" pattern="[A-Za-z0-9]+" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <textarea name="text" placeholder="Message Text" required></textarea>
        <input type="file" name="file" accept=".jpg,.gif,.png,.txt">
        <button type="submit">Add Message</button>
    </form>
    
<?php 
    $chat = new ChatDB();
    
    $sortField = isset($_GET['sort']) ? $_GET['sort'] : 'created_at';
    $sortOrder = isset($_GET['order']) && strtolower($_GET['order']) === 'asc' ? 'ASC' : 'DESC';
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $limit = 25;
    $offset = ($page - 1) * $limit;

    $result = $chat->getMessages($sortField, $sortOrder, $limit, $offset);
?>

    <table>
        <tr>
        <th><a href='<?=" ?sort=username&order=" . ($sortOrder === 'ASC' ? 'desc' : 'asc') . ""?>'>User Name</a></th>
            <th><a href='<?=" ?sort=email&order=" . ($sortOrder === 'ASC' ? 'desc' : 'asc') . ""?>'>E-mail</a></th>
            <th><a href='<?=" ?sort=created_at&order=" . ($sortOrder === 'ASC' ? 'desc' : 'asc') . ""?>'>Date</a></th>
            <th>Message</th>
            <th>File</th>
        </tr>
      
    <?php 
    foreach ($result as $row) {
        $messageText = $chat->bbcodeToHtml($row['text']);
    ?>
        <tr>
            <td><?="{$row['username']}"?></td>
            <td><?="{$row['email']}"?></td>
            <td><?="{$row['created_at']}"?></td>
            <td><?="{$messageText}"?></td>
            <td>
                <?php if ($row['file_path']) { ?>
                    <a href='<?="{$row['file_path']}"?>'>Open file</a>
                <? } ?>
            </td>
        </tr>
    <?php } ?>
    </table>

<?php
    $totalMessages = $chat->totalMessages();
    $totalPages = ceil($totalMessages / $limit);
?>
    <div class='pages'>
        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
            <a href='<?="?page=$i&sort=$sortField&order=$sortOrder"?>'><?="$i"?></a> 
        <?php } ?>  
    </div>
</body>
</html>

