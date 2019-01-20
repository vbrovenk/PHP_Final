<?php
require_once ('database.php');

$dbc = mysqli_connect($db_host, $db_user, $db_password, "mysql");
$query = "CREATE DATABASE IF NOT EXISTS $db_name";
if (mysqli_query($dbc, $query)) {
    echo "CREATED DB";
}
$query = "USE $db_name";
if (mysqli_query($dbc,   $query)) {
    echo "USE";
}

$query = "CREATE TABLE `users`(
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `login` VARCHAR(20) NOT NULL,
            `password` VARCHAR(30) NOT NULL
            )";

// $query = "INSERT INTO `users`(`login`, `password`) VALUES('admin', 'admin')";
mysqli_query($link, $query);
if (mysqli_query($link, $query)) {
    echo "CREATED";
}

?>