<?php
session_start();
$link = mysqli_connect("localhost", "root", "111111", "table");

if($link)
    echo 'Соединение установлено.';
else
    die('Ошибка подключения к серверу баз данных.');

?>