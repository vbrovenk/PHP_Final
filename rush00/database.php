<?php
session_start();

$db_host = "localhost";
$db_user = "root";
$db_password = "111111";
$db_name = "rush0";

$link = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if($link)
    echo 'Соединение установлено.';
else
    die('Ошибка подключения к серверу баз данных.');

?>