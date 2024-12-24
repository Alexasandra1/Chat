<?php
$host = "localhost";;
$user = "root";
$pass = "root";
$database = "chatuser";
$port = 3307;

$connect = mysqli_connect($host, $user, $pass, $database, $port);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
} else{
    // echo "Connected successfully";
}

// CREATE TABLE `chatuser`.`users` (
//   `id` INT NOT NULL AUTO_INCREMENT,
//   `login` VARCHAR(45) NOT NULL,
//   `pass` VARCHAR(45) NOT NULL,
//   `ip_address` VARCHAR(45) NOT NULL,
//   `browser_info` VARCHAR(45) NOT NULL,
//   PRIMARY KEY (`id`));