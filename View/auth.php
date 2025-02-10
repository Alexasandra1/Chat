<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="../Controller/loginDB.php" method="POST">
    <input type="text" placeholder="login" name ="login" required>
        <input type="text" placeholder ="password" name="password" required>
    <!-- <input type="text" placeholder="login" name ="login" >
        <input type="text" placeholder ="password" name="password" > -->
        <button type="submit">Authorization</button>
        <p>Еще нет аккаунта? <a href="registration.php">Зарегистрируйтесь</a>
    </form>
</body>
</html>