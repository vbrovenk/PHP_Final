<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "111111";
    $db_name = "rush0";

    $db = mysqli_connect($db_host, $db_user, $db_password);

    mysqli_query($db, "CREATE DATABASE IF NOT EXISTS ". $db_name);

    $db = mysqli_connect($db_host, $db_user, $db_password, $db_name);

    echo getcwd().'/rush0.sql';
    $sql_conent = file_get_contents(getcwd().'/rush0.sql');
    mysqli_multi_query($db, $sql_conent);
    
    echo 'Install done. <a href="index.php">Go to site</a>';
        exit();
?>