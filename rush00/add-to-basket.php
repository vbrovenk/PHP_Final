<?php
session_start();

if (!empty($_GET['id'])) {
    $temp = $_SESSION['items'];
    $temp[] = $_GET['id'];
    $_SESSION['items'] = $temp;

    header("Location: " . $_SERVER['HTTP_REFERER']);
}
?>