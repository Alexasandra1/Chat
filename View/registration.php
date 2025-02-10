<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-store">
    <title>Document</title>
    <link rel="stylesheet" href="style.css?v=1.0">
</head>
<body>
    <form action="../Controller/registrationDB.php" method="POST">
        <input type="text" placeholder="login" name ="login" required>
        <input type="text" placeholder ="password" name="password" required>
        <input type="text" placeholder="repeat password" name="repeat_password" required>
        <button type="submit">Registration</button>
        <p>Уже зарегистрированы? <a href="auth.php">Авторизуйтесь</a></p>
    </form>
</body>
</html>