<!DOCTYPE html>
<?php
require_once 'database.php';
if(isset($_POST['submit']))
{

    $mas = []; 
    $log = htmlspecialchars($_POST['login']);
    $pass = htmlspecialchars($_POST['passwd']);
    if ($log == '' || $pass == '' || $_POST['passwd2'] == '')
        $mas[] = 'Одно из полей является пустым';
    else if ($pass !== $_POST['passwd2'])
        $mas[] = 'Введенные пароли не совпадают';
    if (empty($mas))
    {
        $query = "SELECT * FROM `users` WHERE `name` = $log";
        $query = mysqli_query($link, $query);
        if (mysqli_num_rows($query) > 0)
            echo "Такой уже есть";
        else
        {
            $_SESSION['login'] = $log;
            $query = "INSERT INTO `users` (name, password) VALUES($log, $pass)";
            $query = mysqli_query($link, $query);
        }

    }
    else
        print_r($mas);
}
?>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
	<div>
		<form method="POST">
			Username: <input type="text" name="login">
			<br>
			<br>
			Password:  <input type="text" name="passwd">
			<br>
            <br>			
            Repeat Password:  <input type="text" name="passwd2">
            <br>
            <button name="submit">OK</button>
		</form>
	</div>
</body>
</html>

