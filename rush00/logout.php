<?php
session_start();
$_SESSION['login'] = "";

session_destroy();
header("Location: http://localhost:8200/index.php");
?>