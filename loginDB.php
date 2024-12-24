<?php
require_once 'db.php';

$login = $_POST['login'];
$password = $_POST['password'];

if (empty($login) || empty($password)) {
    echo "Заполните все поля";
}else {
    $login = mysqli_real_escape_string($connect, $login); 
    $password = mysqli_real_escape_string($connect, $password);

    $sql = "SELECT * FROM users WHERE login = '$login' AND pass = '$password'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        // while($row = $result->fetch_assoc()) {
            header("Location: formChat.php"); 
            exit();
        // }
    } else {
        echo "Not found users";
    }
}
