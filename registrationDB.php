<?php
require_once 'db.php';

$login = $_POST['login'];
$password = $_POST['password'];
$repeat_password = $_POST['repeat_password'];
$ip_address = $_SERVER['REMOTE_ADDR']; 
$browser_info = $_SERVER['HTTP_USER_AGENT'];

if (empty($login) || empty($password) || empty($repeat_password)) {
    echo "Заполните все поля";
}else {
    if ($password != $repeat_password) {
        echo "Пароли не совпадают";
    } else {
        $login = mysqli_real_escape_string($connect, $login); 
        $password = mysqli_real_escape_string($connect, $password); 
        $ip_address = mysqli_real_escape_string($connect, $ip_address); 
        $browser_info = mysqli_real_escape_string($connect, $browser_info); 

        $sql = "INSERT INTO users (login, pass, ip_address, browser_info) VALUES ('$login', '$password', '$ip_address', '$browser_info')";
       
        if ($connect->query($sql) === TRUE) {
            header("Location: formChat.php"); 
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }

    }
}


