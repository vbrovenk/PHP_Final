<?php
session_start();
$_SESSION['login'] = "";

header("Location: http://localhost:8200/index.php");
?>