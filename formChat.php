<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Чат</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <h1>Welcome to the chat!</h1>

    <form id="messageForm" action="messageDB.php" method="post" enctype="multipart/form-data">
        <input type="text" name="username" placeholder="User Name" pattern="[A-Za-z0-9]+" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <textarea name="text" placeholder="Message Text" required></textarea>
        <input type="file" name="file" accept=".jpg,.gif,.png,.txt">
        <button type="submit">Add Message</button>
        <p>Go to the <a href="displayMessages.php">message</a></p>
    </form>
</body>
</html>

